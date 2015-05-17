<?php


namespace App\Socialite\Two;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class QqProvider extends AbstractProvider implements ProviderInterface {

	/**
	 *
	 * @var stirng
	 */
	private $openId;

	/**
	 * The scopes being requested.
	 *
	 * @var array
	 */
	protected $scopes = [
			'get_user_info'
	];

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Laravel\Socialite\Two\AbstractProvider::getAuthUrl()
	 */
	protected function getAuthUrl($state) {
		return $this->buildAuthUrlFromBase ( 'https://graph.qq.com/oauth2.0/authorize', $state );
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Laravel\Socialite\Two\AbstractProvider::getTokenUrl()
	 */
	protected function getTokenUrl() {
		return 'https://graph.qq.com/oauth2.0/token';
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Laravel\Socialite\Two\AbstractProvider::getUserByToken()
	 */
	protected function getUserByToken($token) {
		$response = $this->getHttpClient ()->get ( 'https://graph.qq.com/oauth2.0/me?' . $token );
		$this->openId = json_decode ( $this->removeCallback ( $response->getBody () ), true )['openid'];
		$response = $this->getHttpClient ()->get ( "https://graph.qq.com/user/get_user_info?$token&openid={$this->openId}&oauth_consumer_key={$this->clientId}" );
		return json_decode ( $this->removeCallback ( $response->getBody () ), true );
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Laravel\Socialite\Two\AbstractProvider::mapUserToObject()
	 */
	protected function mapUserToObject(array $user) {
		return (new User ())->setRaw ( $user )->map ( [
				'id' => $this->openId,
				'nickname' => $user ['nickname'],
				'avatar' => $user ['figureurl']
		] );
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Laravel\Socialite\Two\AbstractProvider::getTokenFields()
	 */
	protected function getTokenFields($code) {
		$tokenFields = parent::getTokenFields ( $code );
		$tokenFields ['grant_type'] = 'authorization_code';
		return $tokenFields;
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \Laravel\Socialite\Two\AbstractProvider::getAccessToken()
	 */
	public function getAccessToken($code) {
		$response = $this->getHttpClient ()->get ( $this->getTokenUrl (), [
				'query' => $this->getTokenFields ( $code )
		] );
		return $response->getBody ();
	}

	/**
	 *
	 * @param unknown $response
	 * @return string
	 */
	protected function removeCallback($response) {
		if (strpos ( $response, "callback" ) !== false) {
			$lpos = strpos ( $response, "(" );
			$rpos = strrpos ( $response, ")" );
			$response = substr ( $response, $lpos + 1, $rpos - $lpos - 1 );
		}
		return $response;
	}
}
