<?php

class Controller_Base extends Controller_Template {

  public function before()
  {
    parent::before();
    
    $this->current_user = Sentry::check() ? Sentry::getUser() : null;
    
    if (Sentry::check())
    {
      View::set_global('user_id', $this->current_user->id);
      View::set_global('full_name', $this->current_user->first_name.' '.$this->current_user->last_name);
      View::set_global('current_user', $this->current_user);
      
      View::set_global('is_admin', $this->current_user->hasAccess('backend') ? 'true' : '');
    }
  }

}