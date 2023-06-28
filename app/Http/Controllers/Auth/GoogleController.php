<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use function PHPUnit\Framework\throwException;

class  GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            throw new AuthorizationException('Nu aveți permisiunea de a vizualiza acest utilizator');
        }
        $accessToken = $user->token;
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->first_name = $user->user['given_name'];
            $newUser->last_name = $user->user['family_name'];
            $newUser->email = $user->email;
            $newUser->save();

            Auth::login($newUser);
//            throw new AuthorizationException('Nu aveți permisiunea de a va autentifica');
        }
        return $accessToken;
    }

    public function getUser() {
        return auth()->user();
    }
}
