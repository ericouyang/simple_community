<?php
class Controller_Admin_User extends Controller_Admin 
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin\user/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);

		$this->template->title = "User";
		$this->template->content = View::forge('admin\user/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user_fields = array(
					'email' => Input::post('email'),
					'first_name' => Input::post('first_name'),
					'last_name' => Input::post('last_name'),
					'password' => Input::post('password'),
					'activated' => 1
				);
    
        try {
          $user = Sentry::getUserProvider()->create($user_fields);
          
          Session::set_flash('success', e('Created new user' . $user->id));

          Response::redirect('admin/user');
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            Session::set_flash('error', 'Login field is required.');
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            Session::set_flash('error', 'Password field is required.');
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            Session::set_flash('error', 'User with this login already exists.');
        }
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin\user/create');

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
			$user->permissions = Input::post('permissions');
			$user->activated = Input::post('activated');
			$user->activation_code = Input::post('activation_code');
			$user->persist_code = Input::post('persist_code');
			$user->reset_password_code = Input::post('reset_password_code');
      $user->about = Input::post('about');
      $user->user_data = Input::post('user_data');
      $user->profile_image = Input::post('profile_image');

			if ($user->save())
			{
				Session::set_flash('success', e('Updated user #' . $id));

				Response::redirect('admin/user');
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
				$user->permissions = $val->validated('permissions');
				$user->activated = $val->validated('activated');
				$user->activation_code = $val->validated('activation_code');
				$user->persist_code = $val->validated('persist_code');
				$user->reset_password_code = $val->validated('reset_password_code');
        $user->about = $val->validated('about');
        $user->user_data = $val->validated('user_data');
        $user->profile_image = $val->validated('profile_image');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin\user/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', e('Deleted user #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete user #'.$id));
		}

		Response::redirect('admin/user');

	}


}