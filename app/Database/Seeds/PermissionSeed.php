<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PermissionSeed extends Seeder
{
    public function run()
    {
        // initial seed file for permission table
        $data = [
            [
                'controller_method' => 'UserManagement/index',
                'perm_desc' => 'Main user management page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'UserManagement/save_data',
                'perm_desc' => 'User Management create/edit data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'UserManagement/delete_data',
                'perm_desc' => 'User Management delete data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'PermissionManagement/index',
                'perm_desc' => 'Main Permission Management page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'PermissionManagement/save_data',
                'perm_desc' => 'Permission Management create edit data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'PermissionManagement/delete_data',
                'perm_desc' => 'Permission Management delete data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'RoleManagement/index',
                'perm_desc' => 'Main Role Management page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'RoleManagement/save_data',
                'perm_desc' => 'RoleManagement create/edit data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'RoleManagement/delete_data',
                'perm_desc' => 'Role Management delete data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'SysConfig/index',
                'perm_desc' => 'Main sysconfig Management Page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'SysConfig/save_data',
                'perm_desc' => 'Sysconfig create/edit data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'SysConfig/delete_data',
                'perm_desc' => 'Sysconfig delete data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo1/index',
                'perm_desc' => 'Main Promo 1 page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo1/save_data_csv',
                'perm_desc' => 'Promo1 upload and save csv',
                'created_at' => Time::now()
            ],
            
            [
                'controller_method' => 'Promo2week/index',
                'perm_desc' => 'promo 2 week page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo2week/save_data_csv',
                'perm_desc' => 'promo 2 week save and upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo2month/index',
                'perm_desc' => 'promo 2 month page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo2month/save_data_csv',
                'perm_desc' => 'promo 2 month save and upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo2year/index',
                'perm_desc' => 'promo 2 year page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo2year/save_data_csv',
                'perm_desc' => 'promo 2 year save and upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo3/index',
                'perm_desc' => 'Promo 3 main page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo3betlist/index',
                'perm_desc' => 'Promo 3 betlist home',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo3betlist/save_data_csv',
                'perm_desc' => 'Promo 3 betlist upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo3betlist/delete_unprocessed',
                'perm_desc' => 'Promo 3 betlist delete un processed data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo3betlist/process_data',
                'perm_desc' => 'Promo 3 betlist Process data',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo3userinfo/index',
                'perm_desc' => 'Promo 3 userinfo home',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo4gambling/index',
                'perm_desc' => 'Promo 4 gambling home',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo4gambling/save_data_csv',
                'perm_desc' => 'Promo 4 gambling upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo4fishing/index',
                'perm_desc' => 'Promo 4 fishing home',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo4fishing/save_data_csv',
                'perm_desc' => 'Promo 4 fishing upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo4deposit/index',
                'perm_desc' => 'Promo 4 deposit home',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo4deposit/save_data_csv',
                'perm_desc' => 'Promo 4 deposit upload csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'PromoSummary/index',
                'perm_desc' => 'Promo Summary home',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'PromoSummary/generate_summary',
                'perm_desc' => 'Promo Summary generate payout',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'PromoSummary/payout',
                'perm_desc' => 'Promo issue payout',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo1ewallet/index',
                'perm_desc' => 'Main Promo 1ewallet page',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'Promo1ewallet/save_data_csv',
                'perm_desc' => 'Promo1ewallet upload and save csv',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'DailySumarry/index',
                'perm_desc' => 'Daily Summary',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'DailySumarry/index',
                'perm_desc' => 'Daily Summary',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'DailySummary/generate_summary',
                'perm_desc' => 'Daily Summary',
                'created_at' => Time::now()
            ],
            [
                'controller_method' => 'DailySummary/payout',
                'perm_desc' => 'Payout',
                'created_at' => Time::now()
            ],
            
            


        ];

        // foreach loop to insert seed data
        foreach($data as $row)
        {
            // insert data to table
            $this->db->table('permission')->insert($row);
        }
    }
}
