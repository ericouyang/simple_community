<?php
return array(
	'_root_'  => 'page/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	// user routes
	'dashboard' => 'user/dashboard',
	'user/(:num)' => 'user/profile/$1',
	'directory' => 'user/directory',
	
  // forum routes
	'forums' => 'forum/index',
	'forum/create' => 'forum/create_forum',
	'forum/(:num)' => 'forum/view/$1',
	'forum/(:num)/edit' => 'forum/edit_forum/$1',
	'forum/(:num)/create_thread' => 'forum/create_thread/$1',
  'forum/(:num)/thread/(:num)' => 'forum/view_thread/$1/$2',
  'forum/(:num)/thread/(:num)/create_post' => 'forum/create_post/$1/$2',
  	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);