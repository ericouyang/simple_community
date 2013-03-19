<?php
\Package::load('email');

class Controller_User extends Controller_Base
{
  public function before()
  {
    parent::before();
    
    if (!Sentry::check())
    {
      Session::set_flash('error', 'You must be logged in to access this page');
      Response::redirect('auth/login?dest='.Uri::string());
    }
  }
  public function action_index()
  {
    Response::redirect('user/dashboard');
  }
  
  public function action_dashboard()
  {
    $this->template->title = 'Dashboard';
    $this->template->content = View::forge('user/dashboard');
  }
  
  public function action_profile($id = null)
  {
    $data['user'] = Model_User::find($id);
    $data['user_data'] = $data['user']->get_user_data();
    $first_name = $data['user']->first_name;
    $last_name = $data['user']->last_name;
    
    $this->template->title = $first_name.' '.$last_name;
    $this->template->hide_title = true;
    $this->template->content = View::forge('user/profile', $data);
  }
  
  public function action_edit($id = null)
  {
    $user = Model_User::find($id);
    $val = Model_User::validate('edit');

    if ($val->run())
    {
      $user->email = Input::post('email');
      $user->first_name = Input::post('first_name');
      $user->last_name = Input::post('last_name');
      $user->about = Input::post('about');

      // Custom configuration for profile image upload
      $config = array(
          'path' => DOCROOT.DS.'profile_images',
          'randomize' => true,
          'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
      );
      
      // process the uploaded files in $_FILES
      Upload::process($config);
      
      // if there are any valid files
      if (Upload::is_valid())
      {
          // save them according to the config
          Upload::save();
      
          $profile_image = Upload::get_files(0);
          $user->profile_image = $profile_image['saved_to'];
          
          Image::load($profile_image['saved_to'])->preset('thumbnail')->save('thumbnails'.DS.$profile_image['name']);
      }
      
      // and process any errors
      foreach (Upload::get_errors() as $file)
      {
          // $file is an array with all file information,
          // $file['errors'] contains an array of all error occurred
          // each array element is an an array containing 'error' and 'message'
          foreach ($file['errors'] as $error)
          Session::set_flash('error', $error['message']);
      }
      
      if ($user->save())
      {
        Session::set_flash('success', e('Updated profile for user #' . $id));
  
        Response::redirect(Model_User::get_url($id));
      }

      else
      {
        Session::set_flash('error', e('Could not update user #' . $id));
      }
    }

    else
    {
      if (Input::method() == 'POST')
      {
        $user->email = $val->validated('email');
        $user->first_name = $val->validated('first_name');
        $user->last_name = $val->validated('last_name');
        $user->about = $val->validated('about');
        $user->user_data = $val->validated('user_data');
        $user->profile_image = $val->validated('profile_image');

        Session::set_flash('error', $val->error());
      }

      $this->template->set_global('user', $user, false);
    }

    $this->template->title = "Edit profile";
    $this->template->content = View::forge('user/edit');  
  }
  
  public function action_preferences()
  {
    $this->template->title = 'Change preferences';
    $this->template->content = View::forge('user/preferences');
  }
  
  public function action_directory()
  {
    $pagination_config = array(
      'pagination_url' => 'http://localhost/directory/',
      'per_page'       => 10,
      'uri_segment'    => 1,
      // or if you prefer pagination by query string
      //'uri_segment'    => 'page',
    );

    $pagination = Pagination::forge('user_pagination', $pagination_config);
    
    $data['users'] = Model_User::find('all', array(
      'order_by' => array('last_name'),
      'limit' => $pagination->per_page,
      'offset' => $pagination->offset
    ));
    
    $data['pagination'] = $pagination->render();
    $this->template->title = 'Directory';
    $this->template->content = View::forge('user/directory', $data);
  }
  
}