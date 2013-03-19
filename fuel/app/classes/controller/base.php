<?php

class Controller_Base extends Controller_Template {

  public function before()
  {
    parent::before();
    
    $current_user = Sentry::check() ? Sentry::getUser() : null;
    
    if (Sentry::check())
    {
      View::set_global('user_id', $current_user->id);
      View::set_global('full_name', $current_user->first_name.' '.$current_user->last_name);
      View::set_global('current_user', $current_user);
      
      View::set_global('is_admin', $current_user->hasAccess('backend') ? 'true' : '');
    }
  }

}