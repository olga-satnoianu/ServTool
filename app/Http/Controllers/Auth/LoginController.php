<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Neomerx\JsonApi\Exceptions\LogicException;

class LoginController extends Controller
{
    public function redirectToPassport(){
        return Socialite::driver('laravelpassport')->stateless()->redirect();
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->with(['prompt' => 'select_account'])->stateless()->redirect();
    }

    public function handlePassportCallback(){
        $user = Socialite::driver('laravelpassport')->stateless()->user();
        $my_user = User::where('email', $user->email)->first();
        if($my_user === null)
        {
            $response=[
                "message" => 'User does not exist',
                "err_code" => 100,
            ];
            return response($response, 422);
        }

        if($my_user->oauth_id === null)
        {
            $my_user->oauth_id = $user->id;
            $my_user->save();
        }

        return response() ->json($user);
    }

    public function handleGoogleCallback(){
        $google_user = Socialite::driver('google')->stateless()->user();
        $access_token = $google_user->token;

        $googleUser = Socialite::driver('google')->userFromToken($access_token);

        Log::debug('google user: ' . var_export($googleUser, true));

        $user = User::where('email', $googleUser->email)
            ->orWhere('email', $googleUser->user['email'])
            ->orWhere('google_user_id', $googleUser->id)
            ->first();
//        if($user === null)
//        {
//            $response=[
//                "message" => 'User does not exist',
//                "err_code" => 100,
//            ];
//            return response($response, 422);
//        }

        if($user === null)
        {
            $user = new User();
            $user->email = $googleUser->email;
            $user->first_name = $googleUser->user['given_name'];
            $user->last_name = $googleUser->user['family_name'];
            $user->google_user_id = $googleUser->id;
            $user->save();
        }

        $response = Http::asForm()->post(config('services.laravelpassport.host').'/oauth/token', [
            'grant_type' => 'social',
            'client_id' => config('services.laravelpassport.client_id'),
            'client_secret' => config('services.laravelpassport.client_secret'),
            'provider' => 'google',
            'access_token' => $access_token,
            'scope' => '*',
        ]);

        $array_response = $response->json();

        $authUser = Socialite::driver('laravelpassport')->userFromToken($array_response['access_token']);

        if($user->oauth_id === null)
        {
            $user->oauth_id = $authUser->user['id'];
            $user->google_user_id = $googleUser->user['id'];
            $user->save();
        }

        return $array_response;
    }

    public function getUser() {
        return auth()->user();
    }

    public function logout() {
        return auth()->user();
    }
}

