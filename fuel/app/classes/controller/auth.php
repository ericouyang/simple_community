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
        
        Response::redirect(Input::post('dest')); // go to set dest (which defaults to dashboard)
      }
      
      catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
      {
          Session::set_flash('error', 'The login field is required.');
      }
      catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
      {
          Session::set_flash('error', 'Your account has not been activate.');
      }
      catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
      {
          Session::set_flash('error', 'Please check your login details and try again.');
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
    //Session::set_flash('success', 'You are now logged out.');
    Response::redirect('/');
  }
  
  public function action_register()
  {
    if (Input::method() == 'POST')
    {
      $credentials = array(
        'email' => Input::post('email'),
        'first_name' => Input::post('first_name'),
        'last_name' => Input::post('last_name'),
        'password' => Input::post('password')
      );
      
      try
      {
          // Let's register a user.
          $user = Sentry::register($credentials);
      
          // Let's get the activation code
          $activationCode = $user->getActivationCode();
      
          // Send activation code to the user so he can activate the account
              
          Session::set_flash('success', 'The activation code is '.$activationCode);
          Response::redirect('/');
      }
      catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
      {
          Session::set_flash('error', 'The login field is required.');
      }
      catch (Cartalyst\Sentry\Users\UserExistsException $e)
      {
          Session::set_flash('error', 'This email has already been used. Please log in or use a different address.');
      }
    }

    $this->template->title = 'Register';
    $this->template->content = View::forge('auth/register');
    
  }
  
  public function action_activate($activation_code)
  {
    try
    {
        // Find the user using the user activation code
        $user = Sentry::getUserProvider()->findByActivationCode($activation_code);
        
    
        // Attempt to activate the user
        if ($user->attemptActivation($activation_code))
        {
            // User activation passed
            Session::set_flash('success', 'Your account is now active! You can now login.');
        }
        else
        {
            // User activation failed
            Session::set_flash('error', 'There was an issue with activation. Please try again.'); 
        }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        Session::set_flash('error', 'Activation code not found.');
    }
    Response::redirect('/');
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
  
  public function action_reset_password_confirm($reset_code)
  {
    if(Input::method() == 'POST')
    {
      
    }
    try
    {
      // Find the user using the user id
      $user = Sentry::getUserProvider()->findByResetPasswordCode($reset_code);
  
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
