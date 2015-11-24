<?php

namespace app\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite as Socialize;

class AuthController extends Controller
{
    /*
     * |--------------------------------------------------------------------------
     * | Registration & Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles the registration of new users, as well as the
     * | authentication of existing users. By default, this controller uses
     * | a simple trait to add these behaviors. Why don't you explore it?
     * |
     */

    private $redirectPath = '/';

    use AuthenticatesAndRegistersUsers {
        getLogin as traitGetLogin;
    }

    /**
     * Create a new authentication controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard     $auth
     * @param \Illuminate\Contracts\Auth\Registrar $registrar
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', [
                'except' => 'getLogout',
        ]);
    }

    public function getLogin($socialite = null)
    {
        if ($socialite) {
            return Socialize::with($socialite)->redirect();
        } else {
            return $this->traitGetLogin();
        }
    }

    public function socialite($socialite = null)
    {
        $user = Socialize::with($socialite)->user();

        dd($user);
        // OAuth Two Providers
        $token = $user->token;

        // OAuth One Providers
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
    }
}
