<?php
namespace App\Controllers\PublicApi;
use App\Controllers\BaseController;

use CodeIgniter\I18n\Time;
/**
 * 
 */
class GetSysConfig extends BaseController
{


    public function index( string $data = '')
    {
        
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        
        if( strlen($data) < 3 )
        {
            return $this->response->setJSON( ['error'] );
        }

        $SysConfigModel = model(SysConfigModel::class);

        $dataset = $SysConfigModel->get_data_params_like( ['name' => $data], 'after' );

        return $this->response->setJSON( $dataset );
    }
}