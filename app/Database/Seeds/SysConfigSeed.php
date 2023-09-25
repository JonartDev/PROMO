<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SysConfigSeed extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                "name" => "pr1_home",
                "sys_desc" => "首页 link",
                "sys_value" => "https://www.579912.com/",
                'created_at' => Time::now()

            ],
            [
                "name" => "pr1_discount",
                "sys_desc" => "优惠大厅 link",
                "sys_value" => "https://www.579912.com/",
                'created_at' => Time::now()
            ],
            [
                "name" => "pr1_app",
                "sys_desc" => "APP下载 link",
                "sys_value" => "https://5799110.com/",
                'created_at' => Time::now()
            ],
            [
                "name" => "pr1_cservice",
                "sys_desc" => "在线客服 link",
                "sys_value" => "https://isdkfe.9zzems2fa7.com/chatwindow.aspx?siteId=65000770&planId=9660714e-65a3-466b-9a8a-e964b5c2270d",
                'created_at' => Time::now()
            ]
        ];
        // foreach loop to insert seed data
        foreach($data as $row)
        {
            // insert data to table
            $this->db->table('sysconfig')->insert($row);
        }
    }
}
