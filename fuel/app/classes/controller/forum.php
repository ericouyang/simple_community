<?php

class Controller_Forum extends Controller_Base
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
    $data['forums'] = Model_Forum::find('all');
    
    $this->template->title = 'Forums';
    $this->template->hide_title = true;
    $this->template->content = View::forge('forum/index', $data);
  }
  
  public function action_view($forum_id)
  {
    $data['forum'] = Model_Forum::find($forum_id, array('related' => array('threads')));
    
    $this->template->title = $data['forum']->title;
    $this->template->hide_title = true;
    $this->template->content = View::forge('forum/view_forum', $data);
  }
  
  public function action_view_thread($thread_id)
  {
    $data['thread'] = Model_Thread::find($thread_id, array('related' => array('posts')));
    
    $this->template->title = $data['thread']->title;
    $this->template->hide_title = true;
    $this->template->content = View::forge('forum/view_thread', $data);
  }
  
  public function action_create_forum()
  {
    if (Input::method() == 'POST')
    {
      $val = Model_Forum::validate('create');

      if ($val->run())
      {
        $forum = Model_Forum::forge(array(
          'user_id' => $this->current_user->id,
          'title' => Input::post('title'),
          'description' => Input::post('description'),
        ));

        if ($forum and $forum->save())
        {
          Session::set_flash('success', e('Added forum #'.$forum->id.'.'));

          Response::redirect('forum/view'.$forum->id);
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
    $this->template->content = View::forge('forum/create');
  }
  
  public function action_create_thread($forum_id)
  {
    if (Input::method() == 'POST')
    {
      $val = Model_Thread::validate('create');

      if ($val->run())
      {
        $thread = Model_Thread::forge(array(
          'forum_id' => $forum_id,
          'user_id' => $this->current_user->id,
          'title' => Input::post('title'),
        ));

        if ($thread and $thread->save())
        {
          Session::set_flash('success', e('Added thread #'.$thread->id.'.'));

          Response::redirect('forum/view_thread/'.$thread->id);
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
    $this->template->content = View::forge('forum/create_thread');
  }
  
  public function action_create_post($thread_id)
  {
    if (Input::method() == 'POST')
    {
      $val = Model_Post::validate('create');

      if ($val->run())
      {
        $post = Model_Post::forge(array(
          'user_id' => $this->current_user->id,
          'thread_id' => $thread_id,
          'body' => Input::post('body'),
        ));

        if ($post and $post->save())
        {
          Session::set_flash('success', e('Added post #'.$post->id.'.'));

          Response::redirect('admin/post');
        }

        else
        {
          Session::set_flash('error', e('Could not save post.'));
        }
      }
      else
      {
        Session::set_flash('error', $val->error());
      }
    }

    $this->template->title = "Create Post";
    $this->template->content = View::forge('forum/create_post');
  }
}