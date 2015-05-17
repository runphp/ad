<?php  namespace App\Providers;

use Laravel\Socialite\SocialiteServiceProvider as LaravelSocialiteServiceProvider;
use App\Socialite\SocialiteManager;

class SocialiteServiceProvider extends LaravelSocialiteServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new SocialiteManager($app);
        });
    }
}