<?php
class Controller_Admin_Forum extends Controller_Admin 
{

	public function action_index()
	{
		$data['forums'] = Model_Forum::find('all');
		$this->template->title = "Forums";
		$this->template->content = View::forge('admin\forum/index', $data);

	}

	public function action_view($id = null)
	{
		$data['forum'] = Model_Forum::find($id);

		$this->template->title = "Forum";
		$this->template->content = View::forge('admin\forum/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Forum::validate('create');

			if ($val->run())
			{
				$forum = Model_Forum::forge(array(
					'user_id' => Input::post('user_id'),
					'title' => Input::post('title'),
					'description' => Input::post('description'),
				));

				if ($forum and $forum->save())
				{
					Session::set_flash('success', e('Added forum #'.$forum->id.'.'));

					Response::redirect('admin/forum');
				}

				else
				{
					Session::set_flash('error', e('Could not save forum.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Forums";
		$this->template->content = View::forge('admin\forum/create');

	}

	public function action_edit($id = null)
	{
		$forum = Model_Forum::find($id);
		$val = Model_Forum::validate('edit');

		if ($val->run())
		{
			$forum->user_id = Input::post('user_id');
			$forum->title = Input::post('title');
			$forum->description = Input::post('description');

			if ($forum->save())
			{
				Session::set_flash('success', e('Updated forum #' . $id));

				Response::redirect('admin/forum');
			}

			else
			{
				Session::set_flash('error', e('Could not update forum #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$forum->user_id = $val->validated('user_id');
				$forum->title = $val->validated('title');
				$forum->description = $val->validated('description');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('forum', $forum, false);
		}

		$this->template->title = "Forums";
		$this->template->content = View::forge('admin\forum/edit');

	}

	public function action_delete($id = null)
	{
		if ($forum = Model_Forum::find($id))
		{
			$forum->delete();

			Session::set_flash('success', e('Deleted forum #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete forum #'.$id));
		}

		Response::redirect('admin/forum');

	}


}