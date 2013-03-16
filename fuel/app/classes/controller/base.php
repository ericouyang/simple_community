<?php

class Controller_Base extends Controller_Template {

  public function before()
  {
    parent::before();
    
    $this->current_user = Sentry::check() ? Sentry::getUser() : null;
    
    if (Sentry::check())
    {
      Session::set('user_id', $this->current_user->get('id'));
      View::set_global('current_user', $this->current_user);
      View::set_global('user_metadata', $this->current_user->get('metadata'));
    }
  }

}