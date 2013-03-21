<?php
class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'email',
		'first_name',
		'last_name',
		'permissions',
		'activated',
		'activation_code',
		'persist_code',
		'reset_password_code',
		'about',
		'user_data',
		'profile_image',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('first_name', 'First Name', 'required|max_length[255]');
		$val->add_field('last_name', 'Last Name', 'required|max_length[255]');
		$val->add_field('activated', 'Activated', 'valid_string[numeric]');
		$val->add_field('activation_code', 'Activation Code', 'max_length[255]');
		$val->add_field('persist_code', 'Persist Code', 'max_length[255]');
		$val->add_field('reset_password_code', 'Reset Password Code', 'max_length[255]');

		return $val;
	}

  public function get_user_data()
  {
    if (empty($this->user_data))
    {
      return array();
    }
    
    if ( ! $user_data = json_decode($this->user_data, true))
    {
      throw new \InvalidArgumentException("Cannot JSON decode user data [$this->user_data].");
    }

    return $user_data;
  }
  
  public static function get_url($id)
  {
    return 'u/'.$id;
  }
}
