<?php
class Controller_Admin_Profile extends Controller_Admin 
{

	public function action_index()
	{
		$data['profiles'] = Model_Profile::find('all');
		$this->template->title = "Profiles";
		$this->template->content = View::forge('admin/profile/index', $data);

	}

	public function action_view($id = null)
	{
		$data['profile'] = Model_Profile::find($id);

		$this->template->title = "Profile";
		$this->template->content = View::forge('admin/profile/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Profile::validate('create');

			if ($val->run())
			{
				$profile = Model_Profile::forge(array(
					'user_id' => Input::post('user_id'),
					'about' => Input::post('about'),
					'profile_image' => Input::post('profile_image'),
				));

				if ($profile and $profile->save())
				{
					Session::set_flash('success', e('Added profile #'.$profile->id.'.'));

					Response::redirect('admin/profile');
				}

				else
				{
					Session::set_flash('error', e('Could not save profile.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Profiles";
		$this->template->content = View::forge('admin/profile/create');

	}

	public function action_edit($id = null)
	{
		$profile = Model_Profile::find($id);
		$val = Model_Profile::validate('edit');

		if ($val->run())
		{
			$profile->user_id = Input::post('user_id');
			$profile->about = Input::post('about');
			$profile->profile_image = Input::post('profile_image');

			if ($profile->save())
			{
				Session::set_flash('success', e('Updated profile #' . $id));

				Response::redirect('admin/profile');
			}

			else
			{
				Session::set_flash('error', e('Could not update profile #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$profile->user_id = $val->validated('user_id');
				$profile->about = $val->validated('about');
				$profile->profile_image = $val->validated('profile_image');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('profile', $profile, false);
		}

		$this->template->title = "Profiles";
		$this->template->content = View::forge('admin/profile/edit');

	}

	public function action_delete($id = null)
	{
		if ($profile = Model_Profile::find($id))
		{
			$profile->delete();

			Session::set_flash('success', e('Deleted profile #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete profile #'.$id));
		}

		Response::redirect('admin/profile');

	}


}