<?php

use yii\db\Migration;

class m151215_172117_insert_users extends Migration
{
    public function up()
    {
		$this->insert('user',array(
			'email'=>'admin@admin.com',
			'username' =>'admin',
			'auth_key' => 'o9I-3hC7ncbZv5MdU3ASvQXmiHYglbtK',
			// Hashed password is: 'password'
			'password_hash' => '$2y$13$2i8rmjjlusI9jyopbuyJD.BYhvpqd//eRlXswc4EtTCXdGysN8dNG',
			'created_at' => time(),
			'updated_at' => time(),
		));
		$this->insert('user',array(
			'email'=>'demo@demo.com',
			'username' =>'demo',
			'auth_key' => '5DxuY2DARvbwosjgVHcOxOjuVg5Ruo9H',
			// Hashed password is: 'password'
			'password_hash' => '$2y$13$O5zLSsD.H5TSPMubP9/Q8OC4Zn5sla9QJAe5mu0n/3L.DsM3UbLNy',
			'created_at' => time(),
			'updated_at' => time(),
		));
    }

    public function down()
    {
        $this->delete('user', ['email'=>'admin@admin.com']);
		$this->delete('user', ['email'=>'demo@demo.com']);
    }
}
