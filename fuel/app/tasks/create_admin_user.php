<?php

namespace Fuel\Tasks;

class Create_Admin_User
{
    public function run()
    {
      $user = \Cartalyst\Sentry\Facades\FuelPHP\Sentry::getUserProvider()->create(array(
          'email' => 'admin@admin.com',
          'first_name' => 'Mr.',
          'last_name' => 'Admin',
          'password' => 'password',
          'activated' => 1
      ));
      
      // create profile
      $profile = new \Model_Profile(array('user_id' => $user->id));
      $profile->save();
      
      $admin = \Cartalyst\Sentry\Facades\FuelPHP\Sentry::getGroupProvider()->findByName('Admin');
      
      $user->addGroup($admin);
    }
}

