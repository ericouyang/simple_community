<?php
class Model_User extends \Orm\Model
{
  protected static $_has_many = array('forums', 'threads', 'posts');
  
  protected static $_has_one = array('profile');
  
	protected static $_properties = array(
		'id',
		'email',
		'first_name',
		'last_name',
		'permissions',
		'activated',
		'activation_hash',
		'persist_hash',
		'reset_password_hash',
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
		$val->add_field('activation_hash', 'Activation Code', 'max_length[255]');
		$val->add_field('persist_hash', 'Persist Code', 'max_length[255]');
		$val->add_field('reset_password_hash', 'Reset Password Code', 'max_length[255]');

		return $val;
	}
  
  public static function get_url_by_id($id)
  {
    return 'user/'.$id;
  }
  
  public function get_url()
  {
    return $this::get_url_by_id($this->id);
  }
  
  public function get_full_name()
  {
    return $this->first_name.' '.$this->last_name;
  }
}
