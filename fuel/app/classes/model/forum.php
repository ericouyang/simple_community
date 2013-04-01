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
  
  public function get_num_posts()
  {
    $sum = 0;
    foreach ($this->threads as $thread)
      $sum += count($thread->posts);
    
    return $sum;
  }
  
  public function get_latest_threads()
  {
    return Model_Thread::find('all', array(
      'where' => array(
        array('forum_id', $this->id)),
      'limit' => 5
    ));
  }
}
