<?php
class Model_Thread extends \Orm\Model
{
  protected static $_belongs_to = array('forum', 'user');
  
  protected static $_has_many = array('posts');
  
	protected static $_properties = array(
		'id',
		'forum_id',
		'user_id',
		'title',
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
		$val->add_field('forum_id', 'Forum Id', 'required|valid_string[numeric]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		$val->add_field('title', 'Title', 'required|max_length[100]');

		return $val;
	}

}
