<?php

namespace Fuel\Migrations;

class Create_profiles
{
	public function up()
	{
		\DBUtil::create_table('profiles', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'about' => array('type' => 'text', 'null' => true),
			'website' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'profile_image' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('profiles');
	}
}