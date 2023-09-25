<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Promo4Fishing extends Migration
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
                'prize' => [
                    'type'              => 'DECIMAL',
                    'constraint'        => '13, 4',
                ],
                'status' => [
                    'type'              => 'VARCHAR',
                    'constraint'        => 50,
                ],
                'for_date' => [
					'type' => 'DATETIME',
					'null' => true
				],
                'claim_date' => [
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
                'paid' => [
                    'type'       => 'ENUM("0", "1")',
                    'default'    => "0",
                    'comment'    => '1 for paid, 0 as default',
                ],
                'paid_date' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]
        );
        // adding key
		$this->forge->addKey('id', true);
        $this->forge->addKey('username');

		// create table
        $this->forge->createTable('promo_4_fishing');
    }

    public function down()
    {
        //
        $this->forge->dropTable('promo_4_fishing');
    }
}
