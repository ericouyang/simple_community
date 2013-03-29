<?php

class Controller_Page extends Controller_Base
{

	public function action_index()
	{
	  $data['frontpage_text'] = Config::get('simple_community.frontpage_text');
		$this->template->title = 'Welcome to Simple Community!';
		$this->template->content = View::forge('page/index', $data);
	}

	public function action_about()
	{
		$this->template->title = 'Page &raquo; About';
		$this->template->content = View::forge('page/about');
	}

	public function action_404()
	{
		$this->template->title = 'Page &raquo; 404';
		$this->template->content = View::forge('page/404');
	}

	public function action_access_denied()
	{
		$this->template->title = 'Access Denied';
		$this->template->content = View::forge('page/access_denied');
	}
}
