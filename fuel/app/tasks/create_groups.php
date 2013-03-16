<?php

namespace Fuel\Tasks;

class Create_Groups
{
    public function run()
    {
      \Cartalyst\Sentry\Facades\FuelPHP\Sentry::getGroupProvider()->create(array(
          'name'        => 'Admin',
          'permissions' => array(
              'accessBackend' => 1,
          ),
      ));
    }
}

