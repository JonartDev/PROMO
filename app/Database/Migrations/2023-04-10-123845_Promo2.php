<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Promo2 extends Migration
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
            ]
        );
        // adding key
		$this->forge->addKey('id', true);
        $this->forge->addKey('username');

		// create table
        $this->forge->createTable('promo_2_week');

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
            ]
        );
        // adding key
		$this->forge->addKey('id', true);
        $this->forge->addKey('username');

        $this->forge->createTable('promo_2_month');

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
            ]
        );
        // adding key
		$this->forge->addKey('id', true);
        $this->forge->addKey('username');
        
        $this->forge->createTable('promo_2_year');
    }

    public function down()
    {
        //
        $this->forge->dropTable('promo_2_week');
        $this->forge->dropTable('promo_2_month');
        $this->forge->dropTable('promo_2_year');
    }
}
