<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Promo4Deposit extends Migration
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
                'deposit' => [
                    'type'              => 'DECIMAL',
                    'constraint'        => '13, 4',
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
        $this->forge->createTable('promo_4_deposit');
    }

    public function down()
    {
        //
        $this->forge->dropTable('promo_4_deposit');
    }
}
