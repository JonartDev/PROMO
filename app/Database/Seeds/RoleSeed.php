<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeed extends Seeder
{
    public function run()
    {
        //initial seed file for role table
        $data = [
            [
                "role_name" => "Administrator",
                "permission_id" => "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40",
                "role_desc" => "Admin Account. can do all."
            ],
            [
                "role_name" => "Agent",
                "permission_id" => "10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38",
                "role_desc" => "Agent Account."
            ]
        ];
        // foreach loop to insert seed data
        foreach($data as $row)
        {
            // insert data to table
            $this->db->table('roles')->insert($row);
        }
    }
}
