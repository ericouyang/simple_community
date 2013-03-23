<?php
return array(
	'_root_'  => 'page/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	'dashboard' => 'user/dashboard',
	'u/(:num)' => 'user/profile/$1',
	'directory' => 'user/directory',
	'forums' => 'forum/index',
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);