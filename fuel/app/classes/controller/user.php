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
    $data['dashboard_text'] = Config::get('simple_community.dashboard_text');

    $this->template->title = 'Dashboard';
    $this->template->content = View::forge('user/dashboard', $data);
  }

  public function action_profile($id = null)
  {
    $data['user'] = Model_User::find($id, array('related' => 'profile'));

    if ($data['user'] == null)
      return Response::forge(View::forge('error/404'), 404);

    $this->template->title = $data['user']->get_full_name();
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
      $user->profile->about = Input::post('about');
      $user->profile->website = Input::post('website');

      // if exists files that are trying to be uploaded
      if (Upload::get_files())
      {
        // Custom configuration for profile image upload
        $config = array(
            'path' => DOCROOT.'/user_data/profile_images',
            'randomize' => true,
            'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );

        // process the uploaded files in $_FILES
        Upload::process($config);

        // if there are any valid files
        if (Upload::is_valid())
        {
          // save them according to the config
          Upload::save(0);

          $profile_image = Upload::get_files(0);
          $user->profile->profile_image = 'user_data/profile_images/'.$profile_image['saved_as'];

          Image::load($profile_image['saved_to'].'/'.$profile_image['saved_as'])->preset('thumbnail')->save($profile_image['saved_to'].'/thumbnails/'.$profile_image['saved_as']);
        }


        // process any errors
        foreach (Upload::get_errors() as $file)
        {
            // $file is an array with all file information,
            // $file['errors'] contains an array of all error occurred
            // each array element is an an array containing 'error' and 'message'
            foreach ($file['errors'] as $error)
            Session::set_flash('error', $error['message']);
        }
      }
      if ($user->save())
      {
        Session::set_flash('success', e('Updated profile for user #' . $id));

        Response::redirect($user->get_url());
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
        $user->profile->about = $val->validated('about');
        $user->profile->profile_image = $val->validated('profile_image');
        $user->profile->website = $val->validated('website');

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
      'per_page'      => 16,
      'total_items'   => DB::count_records('users'),
      'uri_segment'   => 2,
    );

    $pagination = Pagination::forge('user_pagination', $pagination_config);

    $data['pagination'] = $pagination->render();

    $data['users'] = Model_User::find('all', array(
      'order_by' => array('last_name'),
      'limit' => $pagination->per_page,
      'offset' => $pagination->offset,
      'related' => 'profile'
    ));

    $this->template->title = 'Directory';
    $this->template->content = View::forge('user/directory', $data);
  }

}
