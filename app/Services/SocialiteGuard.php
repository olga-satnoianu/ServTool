<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteGuard implements Guard
{
    /**
     * The user instance.
     *
     * @var \App\Models\User|null
     */
    private ?Authenticatable $user;

    /**
     * User fetched status.
     *
     * @var bool
     */
    private bool $fetched_user;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new authentication guard.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = null;
        $this->fetched_user = false;
    }

    /**
     * Get user from oauth server if not already fetched.
     *
     * @return void
     */
    private function checkUser()//ia user-ul si verifica daca e logat sau nu
    {
        if($this->fetched_user === false)
        {
            $oauthUser = Socialite::driver('laravelpassport')->userFromToken($this->request->bearerToken());
            if($oauthUser === null || $oauthUser->id === null)
            {
                $this->fetched_user = true;
                return;
            }

            $my_user = User::where('oauth_id', $oauthUser->id)->first();//verifica dupa id daca user-ul se afla in baza de date
            if($my_user !== null)
            {
                $this->user = $my_user;
            }
            else
            {
                $newUser = new User;
                $newUser->name = $oauthUser->name;
                $newUser->email = $oauthUser->email;
                $newUser->save();
            }

            $this->fetched_user = true;//seteaza fetch_id true indiferent de actiunea pe care o execta pt a nu verifica user-ul la infinit
        }
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        $this->checkUser();

        return $this->user !== null;
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return !$this->check();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        $this->checkUser();

        return $this->user;
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|string|null
     */
    public function id()
    {
        $this->checkUser();

        if($this->user === null)
        {
            return null;
        }

        return $this->user->id;
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return false;
    }

    /**
     * Determine if the guard has a user instance.
     *
     * @return bool
     */
    public function hasUser()
    {
        return $this->user !== null;
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
    }
}
