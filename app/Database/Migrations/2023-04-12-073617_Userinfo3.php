<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Userinfo3 extends Migration
{
    public function up()
    {
        //
        $this->forge->addField(
            [
                'id' => [
                    'type'              => 'INT',
                    'constraint'        => 12,
                    'unsigned'          => true,
                    'auto_increment'    => true
                ],
                'username' => [
                    'type'              => 'VARCHAR',
                    'constraint'        => 50,
                    'null'              => false
                ],
                'total_bet' => [
                    'type'              => 'DECIMAL',
                    'constraint'        => '13, 4',
                ],
                'vip_level' => [
                    'type'              => 'INT',
                    'default'           => 0
                ],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => true
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => true
				],
				'deleted_at' => [
					'type' => 'DATETIME',
					'null' => true
				],
            ]
        );
        // adding key
		$this->forge->addKey('id', true);
        $this->forge->addKey('username');
		// create table
        $this->forge->createTable('userinfo_3');
    }

    public function down()
    {
        //
        $this->forge->dropTable('userinfo_3');
    }
}
