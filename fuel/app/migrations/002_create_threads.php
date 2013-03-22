<?php

namespace Fuel\Migrations;

class Create_threads
{
	public function up()
	{
		\DBUtil::create_table('threads', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'forum_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 100, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('threads');
	}
}