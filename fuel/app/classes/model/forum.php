<?php
class Model_Forum extends \Orm\Model
{
  protected static $_belongs_to = array('user');
  
  protected static $_has_many = array('threads');
  
	protected static $_properties = array(
		'id',
		'user_id',
		'title',
		'description',
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
		$val->add_field('title', 'Title', 'required|max_length[100]');
		$val->add_field('description', 'Description', 'required|max_length[255]');

		return $val;
	}

  public function get_url()
  {
    return 'forum/'.$this->id;
  }
}
