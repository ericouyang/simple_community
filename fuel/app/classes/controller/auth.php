<?php

class Controller_Auth extends Controller_Base
{
  public function action_index()
  {
    Response::redirect('user/login');
  }
  
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
        
        if (isset($_GET['dest']))
          Response::redirect($_GET['dest']);
        else
          Response::redirect('/');
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
    if(Input::method() == 'POST')
    {
      $email = Input::post('email');
      try
      {
          // Find the user using the user email address
          $user = Sentry::getUserProvider()->findByLogin($email);
      
          // Get the password reset code
          $resetCode = $user->getResetPasswordCode();
          
          $resetUrl = Uri::create('auth/reset_password_confirm/'.$resetCode);
      
          send_auth_email($email, $resetUrl);
          
          Session::set_flash('success', 'Your reset confirmation email has been sent to '.$email);
          Response::redirect('/');
      }
      catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
      {
          echo 'User was not found.';
      }
    }
    $this->template->title = 'Reset Password';
    $this->template->content = View::forge('auth/new_password');
  }
  
  public function action_reset_password_confirm()
  {
    if(Input::method() == 'POST')
    {
      
    }
    try
    {
      // Find the user using the user id
      $user = Sentry::getUserProvider()->findByResetPasswordCode(Uri::segment(3));
  
      $this->template->title = 'Reset Password';
      $this->template->content = View::forge('auth/reset_password');
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        Session::set_flash('error', 'That reset password is not valid.');
        Response::redirect('/');
    }
  }
  
  public static function send_auth_email($email, $url)
  {
    // Create an instance
    $email = Email::forge();

    // Set the from address
    $email->from('test@email.me', 'Test');

    // Set the to address
    $email->to($email);

    // Set a subject
    $email->subject('Test Email');

    // And set the body.
    $email->body($url);
  }
}  
?>