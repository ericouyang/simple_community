<?php

class Controller_Pages extends Controller_Base
{

	public function action_index()
	{
		$this->template->title = 'Home';
		$this->template->content = View::forge('pages/index');
	}

	public function action_about()
	{
		$this->template->title = 'Page &raquo; About';
		$this->template->content = View::forge('pages/about');
	}

	public function action_404()
	{
		$this->template->title = 'Page &raquo; 404';
		$this->template->content = View::forge('pages/404');
	}

	public function action_access_denied()
	{
		$this->template->title = 'Access Denied';
		$this->template->content = View::forge('pages/access_denied');
	}
}
