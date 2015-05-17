<?php namespace App\Socialite;

use Laravel\Socialite\SocialiteManager as LaravelSocialiteManager;

class SocialiteManager extends LaravelSocialiteManager
{

	/**
	 * Create an instance of the specified driver.
	 *
	 * @return \Laravel\Socialite\Two\AbstractProvider
	 */
	protected function createQqDriver()
	{
		$config = $this->app['config']['services.qq'];

		return $this->buildProvider(
				'App\Socialite\Two\QqProvider', $config
		);
	}
}