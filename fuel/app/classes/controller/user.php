<?php

class Controller_User extends Controller_Base
{
  public function action_login()
  {
    try
    {
        // Find the user using the user id
        $user = Sentry::getUserProvider()->findById(1);
    
        // Log the user in
        Sentry::login($user);
    }
    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
    {
        echo 'Login field is required.';
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
        echo 'User not activated.';
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        echo 'User not found.';
    }
    
    // Following is only needed if throttle is enabled
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
    {
        $time = $throttle->getSuspensionTime();
    
        echo "User is suspended for [$time] minutes.";
    }
    catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
    {
        echo 'User is banned.';
    }
  }
  
  public function action_logout()
  {
    // Logs the user out
    Sentry::logout();
    Response::redirect('/');
  }
  
  public function action_register()
  {
    
  }
  
  public function action_activate()
  {
  }
  
  public function action_dashboard()
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
