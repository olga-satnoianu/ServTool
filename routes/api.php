<?php

use App\Http\Controllers\Api\V1\DomainCheckController;
use App\Http\Controllers\Api\V1\DomainController;
use App\Http\Controllers\Api\V1\DomainOperationController;
use App\Http\Controllers\Api\V1\GuideController;
use App\Http\Controllers\Api\V1\MajorEventController;
use App\Http\Controllers\Api\V1\NotificationController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/redirect', [LoginController::class, 'redirectToPassport']);
    Route::get('/callback', [LoginController::class, 'handlePassportCallback']);

    Route::get('/redirectGoogle', [LoginController::class, 'redirectToGoogle']);
    Route::get('/callbackGoogle', [LoginController::class, 'handleGoogleCallback']);
});

JsonApiRoute::server('v1')->prefix('v1')->resources(function ($server) {
    $server->resource('users', UserController::class)->only('store');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', [LoginController::class, 'getUser']);
    Route::get('/logout', [LoginController::class, 'logout']);

    JsonApiRoute::server('v1')->prefix('v1')->resources(function ($server) {
        $server->resource('users', JsonApiController::class)->except('store');
        $server->resource('notifications', NotificationController::class)
            ->relationships(function ($relationship) {
                $relationship->hasOne('domain');
                $relationship->hasOne('task');
                $relationship->hasOne('majorEvent');
            });
        $server->resource('guides', GuideController::class)
        ->relationships(function ($relationship) {
            $relationship->hasOne('majorEvent');
        });
        $server->resource('major-events', MajorEventController::class)
        ->relationships(function ($relationship) {
            $relationship->hasOne('guide');
        });
        $server->resource('tasks', TaskController::class);
        $server->resource('domains', DomainController::class)
            ->relationships(function ($relationship) {
                $relationship->hasMany('notifications');
            });
        $server->resource('domain-checks', DomainCheckController::class);
        $server->resource('domain-operations', DomainOperationController::class);
        $server->resource('domain-check-results', \App\Http\Controllers\Api\V1\DomainCheckResultController::class);
        $server->resource('servers', \App\Http\Controllers\Api\V1\ServerController::class);
        $server->resource('server-checks', \App\Http\Controllers\Api\V1\ServerCheckController::class);
        $server->resource('operation-servers', \App\Http\Controllers\Api\V1\OperationServerController::class);
        $server->resource('server-check-results', \App\Http\Controllers\Api\V1\ServerCheckResultController::class);
    });

});


//Route::group(['middleware' => ['cors', 'json.response']], function () {
//
//    // public routes
//    Route::post('login', [ApiAuthController::class, 'login'])->name('login.api');
//    Route::post('register', [ApiAuthController::class, 'register'])->name('register.api');
//});


//Route::group(['middleware' => ['web']], function () {
//    Route::get('redirect', [GoogleController::class, 'redirectToGoogle']);
//    Route::get('callback', [GoogleController::class, 'handleGoogleCallback']);
//});

//Route::middleware('auth:api')->group(function () {
//    Route::get('/user', [GoogleController::class, 'getUser']);
//
//    Route::post('/user/logout', [ApiAuthController::class, 'logout'])->name('logout.api');

//    Route::get('/user', function (Request $request) {
//        $response = Http::withHeaders([
//            'Accept' => 'application/json',
//            'Authorization' => 'Bearer ' . $request->bearerToken(),
//        ])->get(env('LARAVELPASSPORT_HOST') . '/api/user');
//
//        return response($response-json(), $response->status());
//    });

//    Route::get('/user/logout', function (Request $request) {
//        $response = Http::withHeaders([
//            'Accept' => 'application/json',
//            'Authorization' => 'Bearer ' . $request->bearerToken(),
//        ])->get(env('LARAVELPASSPORT_HOST') . '/api/user/logout');
//
//        return response($response->json(), $response->status());
//    });
//});
