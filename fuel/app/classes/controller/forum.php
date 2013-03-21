<?php

class Controller_Forum extends Controller_Base
{
  public function action_index()
  {
    $this->template->title = 'Forum';
    $this->template->content = View::forge('forum/index');
  }
}