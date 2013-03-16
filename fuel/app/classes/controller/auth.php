<?php

class Controller_Auth extends Controller_Base
{
  public function action_login()
  {
    if (Input::method() == 'POST')
    {
      $credentials = array(
        'email' => Input::post('email'),
        'password' => Input::post('password')
      );
      
      try
      {
        $user = Sentry::authenticate($credentials);
      }
      
      catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
      {
          Session::set_flash('error', 'Login field is required.');
      }
      catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
      {
          Session::set_flash('error', 'Your account is not active.');
      }
      catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
      {
          Session::set_flash('error', 'Account not found.');
      }
      
      // Following is only needed if throttle is enabled
      catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
      {
          $time = $throttle->getSuspensionTime();
      
          Session::set_flash('error', "Your account has been suspended for [$time] minutes.");
      }
      catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
      {
          Session::set_flash('error', 'Your account is banned.');
      }
    }
    $this->template->title = 'Login';
    $this->template->content = View::forge('auth/login');
  }
  
  public function action_logout()
  {
    // Logs the user out
    Sentry::logout();
    Session::set_flash('success', 'You are now logged out.');
    Response::redirect('/');
  }
  
  public function action_register()
  {
    
  }
  
  public function action_activate()
  {
  }
  
  public function action_reset_password()
  {
  }
  
  public function action_reset_password_confirm()
  {
  }
  
  public static function send_activation_email($email, $url)
  {
  }
}  
?>
