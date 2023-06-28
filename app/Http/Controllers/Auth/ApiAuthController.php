<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;


class ApiAuthController extends Controller
{
    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
//        $user = User::create($request->toArray());
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }

    public function login(LoginRequest $request) {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        {
            throw ValidationException::withMessages([
                'login_error' => "Incorect email or password",
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(RouteServiceProvider::HOME);
    }


//    public function login (Request $request) {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|string|email|max:255',
//            'password' => 'required|string|min:6',
//        ]);
//        if ($validator->fails())
//        {
//            return response(['errors'=>$validator->errors()->all()], 422);
//        }
//        $user = User::where('email', $request->email)->first();
//        if ($user) {
//            if (Hash::check($request->password, $user->password)) {
//                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
//                $response = ['token' => $token];
//                return response($response, 200);
//            } else {
//                $response = ["message" => "Password mismatch"];
//                return response($response, 422);
//            }
//        } else {
//            $response = ["message" =>'User does not exist'];
//            return response($response, 422);
//        }
//    }

//    public function logout (Request $request) {
//        $token = $request->user()->token();
//        $token->revoke();
//        $response = ['message' => 'You have been successfully logged out!'];
//        return response($response, 200);
//    }
}
