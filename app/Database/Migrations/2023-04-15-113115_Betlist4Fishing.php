<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Betlist4Fishing extends Migration
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
                'bet' => [
                    'type'              => 'DECIMAL',
                    'constraint'        => '13, 4',
                ],
                'bet_date' => [
					'type' => 'DATETIME',
					'null' => true
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
        $this->forge->createTable('betlist_4_fishing');
    }

    public function down()
    {
        //
        $this->forge->dropTable('betlist_4_fishing');
    }
}
