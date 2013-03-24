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
    $data['forums'] = Model_Forum::find('all', array(
      'related' => array(
          'threads' => array(
              'limit' => 5,
          ),
      ),
    ));
    
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
  
  public function action_view_thread($forum_id, $thread_id)
  {
    $data['thread'] = Model_Thread::find($thread_id, array('related' => array('posts')));
    
    // not needed to display thread, for routing consistency sake
    if ($data['thread']->forum_id != $forum_id)
      return Response::forge(View::forge('errors/404'), 404);
    
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

          Response::redirect('forum/view/'.$forum->id);
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

    $this->template->title = "Create a new forum";
    $this->template->content = View::forge('forum/create_forum');
  }
  
  public function action_create_thread($forum_id)
  {
    $forum = Model_Forum::find($forum_id);
      
    if ($forum == null)
      return Response::forge(View::forge('errors/404'), 404);
      
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
          
          $this->action_create_post($forum_id, $thread->id);
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

    $this->template->title = "Create a new thread";
    $this->template->content = View::forge('forum/create_thread');
  }
  
  public function action_create_post($forum_id, $thread_id)
  {
    $thread = Model_Thread::find($thread_id);
    
    // not needed to create post, for routing consistency sake
    if ($thread->forum_id != $forum_id) // will also catch invalid thread_ids
      return Response::forge(View::forge('errors/404'), 404);
    
    if (Input::method() == 'POST')
    {
      $val = Model_Post::validate('create_post');

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

          Response::redirect('forum/'.$forum_id.'/thread/'.$thread_id);
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