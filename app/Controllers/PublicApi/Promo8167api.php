<?php
namespace App\Controllers\PublicApi;
use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;
/**
 * 
 */
class Promo8167api extends BaseController
{

    public function show_level(){

        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        
        $postdata = $this->request->getPost();

        $rules = [
            'username' => [
                'label' => 'Username', // setting a label to field for validation error response.
                'rules' => 'required|alpha_numeric', // setting rules
                'errors' => [ // setting custom error response
                    'required' => '请输入用户名 / The Username field is required.',
                    'alpha_numeric' => '用户名字段只能包含字母数字字符 / The Username field may only contain alphanumeric characters.'
                ]
            ]
        ];

        $UserInfo8167 = model(Userinfo8167Model::class);
        $resultset =  $UserInfo8167->get_data_params([ 'username' => $postdata['username'] ]);

        if( count($resultset) )
        {
            return $this->response->setJSON( [ 'status' => 1, 'data' => $resultset]);
        } else {
            return $this->response->setJSON( [ 'status' => 0, 'data' => [], 'validation' => 'Username Invalid' ] );
        }

    }
}
