<?php
namespace App\Controllers\PublicApi;
use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;
/**
 * zittryx code
 */
class promo3vipinfoapi extends BaseController
{
    public function get_info()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $postdata = $this->request->getPost();
        $vip_level = [
            1   =>  10,
            2   =>  500,
            3   =>  3000,
            4   =>  10000,
            5   =>  30000,
            6   =>  50000,
            7   =>  100000,
            8   =>  200000,
            9   =>  300000,
            10  =>  600000,
            11  =>  1000000,
            12  =>  1500000,
            13  =>  2000000,
            14  =>  3000000,
            15  =>  5000000,
            16  =>  7000000,
            17  =>  10000000,
            18  =>  15000000,
            19  =>  30000000,
            20  =>  50000000,
            21  =>  100000000,
        ];
        $vip_prize = [
            1   =>  5,
            2   =>  10,
            3   =>  20,
            4   =>  30,
            5   =>  50,
            6   =>  80,
            7   =>  130,
            8   =>  300,
            9   =>  400,
            10  =>  600,
            11  =>  1000,
            12  =>  1500,
            13  =>  2000,
            14  =>  3000,
            15  =>  5000,
            16  =>  7000,
            17  =>  10000,
            18  =>  15000,
            19  =>  30000,
            20  =>  50000,
            21  =>  100000,
        ];
        $rules = [
                'username' => [
                    'label' => 'Username', // setting a label to field for validation error response.
                    'rules' => 'required|alpha_numeric', // setting rules
                    'errors' => [ // setting custom error response
                        'required' => '请输入用户名 / The Username field is required.',
                        'alpha_numeric' => '用户名字段只能包含字母数字字符 / The Username field may only contain alphanumeric characters.'
                    ]
                ],
        ];
        $Userinfo3Model = model(Userinfo3Model::class);
        $Promo3Model    = model(Promo3Model::class);
        $last_prize     = $Promo3Model->get_latest_record(['username' => $postdata['username']]);
        $user_data      = $Userinfo3Model->get_data_params(['username' => $postdata['username']]);
        if(count($user_data))
            {
                $bet_List = model(Betlist3Model::class);
                $last_bet  = $bet_List->get_latest_record(['username' => $postdata['username']]);
                $last_bet_amount  = (int)$last_bet['bet'];
                $current_vip_level = $user_data[0]['vip_level'];
                $current_total_bet = (int)$user_data[0]['total_bet'];
                $next_vip_level    = $current_vip_level + 1;
                $amount_to_upgrade = $vip_level[$next_vip_level] - $current_total_bet;
                return  $this->response->setJSON( [
                    'status'        => 1,
                    'latest_bet'    => $last_bet_amount,
                    'date_last_bet' => $last_bet['bet_date'],
                    'current_level' => $current_vip_level,
                    'total_bet'     => $current_total_bet,
                    'next_level'    => $next_vip_level,
                    'upgrade_amount'=> $amount_to_upgrade,
                    'next_level_prize'=>$vip_prize[$next_vip_level],
                    'prize_total'   => (int)$last_prize,
                    ]);
                
            }
        return  $this->response->setJSON( [
                'status'        => 0,
                'message'       =>"Invalid Username"
                ]);
        
    }
}