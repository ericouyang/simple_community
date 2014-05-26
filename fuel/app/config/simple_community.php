<?php
/*
 * Simple Community Configuration File
 *
 * Use this file to customize your simple community installation
 */
return array(
  'registration_enabled' => true,
  'forum' => array('is_public' => false),
  'site_title' => 'Simple Community',
  'frontpage_text' =>
<<<EOD
    This is an open-source simple community webapp with user profiles, a searchable user directory, and a basic forum
    built on top of the PHP framework FuelPHP, Twitter Bootstrap, and the Sentry authentication system.
EOD
, 'registration_text' =>
<<<EOD
    Welcome to Simple Community! We're excited for you to join us.
    Please fill out this form and we'll get you started by sending you an activation email.
EOD
,'login_text' => 'Welcome! If you already have an account, please sign in using this form.',
  'dashboard_text' => 'Welcome! Start engaging with the community. If you have any issues or suggestions, please contact Eric Ouyang at contact [at] ericouyang.com'
);
