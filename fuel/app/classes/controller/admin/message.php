<?php
class Controller_Admin_Message extends Controller_Admin 
{

	public function action_index()
	{
		$data['messages'] = Model_Message::find('all');
		$this->template->title = "Messages";
		$this->template->content = View::forge('admin\message/index', $data);

	}

	public function action_view($id = null)
	{
		$data['message'] = Model_Message::find($id);

		$this->template->title = "Message";
		$this->template->content = View::forge('admin\message/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Message::validate('create');

			if ($val->run())
			{
				$message = Model_Message::forge(array(
					'thread_id' => Input::post('thread_id'),
					'user_id' => Input::post('user_id'),
					'body' => Input::post('body'),
				));

				if ($message and $message->save())
				{
					Session::set_flash('success', e('Added message #'.$message->id.'.'));

					Response::redirect('admin/message');
				}

				else
				{
					Session::set_flash('error', e('Could not save message.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('admin\message/create');

	}

	public function action_edit($id = null)
	{
		$message = Model_Message::find($id);
		$val = Model_Message::validate('edit');

		if ($val->run())
		{
			$message->thread_id = Input::post('thread_id');
			$message->user_id = Input::post('user_id');
			$message->body = Input::post('body');

			if ($message->save())
			{
				Session::set_flash('success', e('Updated message #' . $id));

				Response::redirect('admin/message');
			}

			else
			{
				Session::set_flash('error', e('Could not update message #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$message->thread_id = $val->validated('thread_id');
				$message->user_id = $val->validated('user_id');
				$message->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('message', $message, false);
		}

		$this->template->title = "Messages";
		$this->template->content = View::forge('admin\message/edit');

	}

	public function action_delete($id = null)
	{
		if ($message = Model_Message::find($id))
		{
			$message->delete();

			Session::set_flash('success', e('Deleted message #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete message #'.$id));
		}

		Response::redirect('admin/message');

	}


}