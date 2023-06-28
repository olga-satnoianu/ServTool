<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/viewRegister', function () {
    return view('auth.register');
});
Route::get('/viewLogin', function () {
    return view('auth.login');
});
Route::get('/dashboard', function() {
    return view('auth.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route::get('/auth/redirect', function () {
//    return Socialite::driver('google')->stateless()->redirect();
//});
//
//Route::get('/auth/callback', function (Request $request) {
//    $user = Socialite::driver('google')->stateless()->user();
//
//    return response()->json($user);
//});

//Route::get('/auth/redirect', function () {
//    return Socialite::driver('laravelpassport')->stateless()->redirect();
//});
//
//Route::get('/auth/callback', function (Request $request) {
//    $user = Socialite::driver('laravelpassport')->stateless()->user();
//
//    return response()->json($user);
//});

Route::get('/auth/token', function (Request $request)
{
    $response = Http::asForm()->post(env('LARAVELPASSPORT_HOST') . '/oauth/token', [
        'grant_type' => 'refresh_token',
        'refresh_token' => $request->refreshToken,
        'client_id' => env('LARAVELPASSPORT_CLIENT_ID'),
        'client_secret' => env('LARAVELPASSPORT_CLIENT_SECRET'),
        'scope' => '',
    ]);

    return response($response->json(), $response->status());
});

