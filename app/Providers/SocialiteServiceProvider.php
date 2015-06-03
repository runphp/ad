<?php

namespace app\Providers;

use Laravel\Socialite\SocialiteServiceProvider as LaravelSocialiteServiceProvider;
use App\Socialite\SocialiteManager;

class SocialiteServiceProvider extends LaravelSocialiteServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bindShared('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new SocialiteManager($app);
        });
    }
}
