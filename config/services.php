<?php
return [

		/*
		 * |--------------------------------------------------------------------------
		 * | Third Party Services
		 * |--------------------------------------------------------------------------
		 * |
		 * | This file is for storing the credentials for third party services such
		 * | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
		 * | default location for this type of information, allowing packages
		 * | to have a conventional place to find your various credentials.
		 * |
		 */

		'mailgun' => [
				'domain' => '',
				'secret' => ''
		],

		'mandrill' => [
				'secret' => ''
		],

		'ses' => [
				'key' => '',
				'secret' => '',
				'region' => 'us-east-1'
		],

		'stripe' => [
				'model' => 'App\User',
				'key' => '',
				'secret' => ''
		],
		'github' => [
				'client_id' => '2ab706059c6cd2300413',
				'client_secret' => '39a51dbfc3a4d2fa00c697bedb31f0b5b4095172',
				'redirect' => 'http://runphp.net/auth/socialite/github'
		],
		'qq' => [
				'client_id' => '101216002',
				'client_secret' => 'd6e5afcc6c3220eed2ad7044345c3361',
				'redirect' => 'http://runphp.net/auth/socialite/qq'
		]
]
;
