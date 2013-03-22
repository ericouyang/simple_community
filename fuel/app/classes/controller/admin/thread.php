<?php
class Controller_Admin_Thread extends Controller_Admin 
{

	public function action_index()
	{
		$data['threads'] = Model_Thread::find('all');
		$this->template->title = "Threads";
		$this->template->content = View::forge('admin\thread/index', $data);

	}

	public function action_view($id = null)
	{
		$data['thread'] = Model_Thread::find($id);

		$this->template->title = "Thread";
		$this->template->content = View::forge('admin\thread/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Thread::validate('create');

			if ($val->run())
			{
				$thread = Model_Thread::forge(array(
					'forum_id' => Input::post('forum_id'),
					'user_id' => Input::post('user_id'),
					'title' => Input::post('title'),
				));

				if ($thread and $thread->save())
				{
					Session::set_flash('success', e('Added thread #'.$thread->id.'.'));

					Response::redirect('admin/thread');
				}

				else
				{
					Session::set_flash('error', e('Could not save thread.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Threads";
		$this->template->content = View::forge('admin\thread/create');

	}

	public function action_edit($id = null)
	{
		$thread = Model_Thread::find($id);
		$val = Model_Thread::validate('edit');

		if ($val->run())
		{
			$thread->forum_id = Input::post('forum_id');
			$thread->user_id = Input::post('user_id');
			$thread->title = Input::post('title');

			if ($thread->save())
			{
				Session::set_flash('success', e('Updated thread #' . $id));

				Response::redirect('admin/thread');
			}

			else
			{
				Session::set_flash('error', e('Could not update thread #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$thread->forum_id = $val->validated('forum_id');
				$thread->user_id = $val->validated('user_id');
				$thread->title = $val->validated('title');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('thread', $thread, false);
		}

		$this->template->title = "Threads";
		$this->template->content = View::forge('admin\thread/edit');

	}

	public function action_delete($id = null)
	{
		if ($thread = Model_Thread::find($id))
		{
			$thread->delete();

			Session::set_flash('success', e('Deleted thread #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete thread #'.$id));
		}

		Response::redirect('admin/thread');

	}


}