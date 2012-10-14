<?php namespace OneAuth\Auth;

/**
 * Auth Class taken from NinjAuth Package for FuelPHP
 *
 * @package     NinjAuth
 * @author      Phil Sturgeon <https://github.com/philsturgeon>
 */

class Controller extends \Controller 
{
	/**
	 * Start a session request
	 *
	 * @access  public
	 * @param   array       $provider
	 * @return  Response
	 * @throws  Strategy\Exception
	 */
	public function action_session($provider = null)
	{
		echo('Libraries/auth/Controller.session');

		// if provider data is somehow empty, it might not came from a provider.
		if (empty($provider))
		{
			return \Response::error('404');
		}
		if ($provider == 'fb_checkin_laravel') {
			\Config::set('oneauth::urls.logged_in', $provider);			
			$provider = 'facebook';
		}

		try 
		{
			return Strategy::make($provider)->authenticate();
		}
		catch (Strategy\Exception $e)
		{
			return $this->action_error($provider, $e->getMessage());
		}
	}

	/**
	 * Get authorization code from callback and fetch user access_token and other information
	 *
	 * @access  public
	 * @param   string      $provider
	 * @return  Response
	 * @throws  Strategy\Exception
	 */
	public function action_callback($provider = null)
	{
		echo('Libraries/auth/Controller.callback');
		//die('Error-Controller.Callback');

		// if provider data is somehow empty, it might not came from a provider.
		if (empty($provider))
		{
			return \Response::error('404');
		}
		if($provider == 'fb_checkin_laravel') {
			//echo('funciononou');		
			$provider = 'facebook'	;
			\Config::set('oneauth::urls.logged_in', 'checkin/laravel');			
		} else {
			//echo('não funcionou');
		}
		try 
		{
			$strategy = Strategy::make($provider);
			return Strategy::login_or_register($strategy);
		} 
		catch (Strategy\Exception $e)
		{
			return $this->action_error($provider, $e->getMessage());
		}
	}

	/**
	 * Display error from failed request
	 *
	 * @access  protected
	 * @param   string      $provider
	 * @param   string      $e
	 * @return  Response
	 */
	protected function action_error($provider = null, $e = '') {}
}