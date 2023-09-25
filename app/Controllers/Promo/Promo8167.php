<?php

namespace App\Controllers\Promo;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Controllers\BaseController;

class Promo8167 extends BaseController
{/**
	 * 
	 */

     public function index()
     {
         $dataset = [
             'pagetitle' => '8167 Promo',
             'css' => [ '/assets/bootstrap-datepicker/css/datepicker.css' ], // use to add css specific to page.
             'js' => [ '/assets/bootstrap-datepicker/js/bootstrap-datepicker.js', '/assets/js/8167promo.js' ] // use to add js specific to page.
         ];
 
         return view('admin/v_header' , $dataset)
             . view('promo/v_8167promo')
             . view('admin/v_footer');
     }
 
     public function datatable(){
         $postdata = $this->request->getPost();
 
         // instantiate model class
         $Promo8167Model = model(Promo8167Model::class);
 
         $orderby =  $postdata['columns'][ $postdata['order'][0]['column'] ]['data']; // get proper orderby string
 
         $dataset = $Promo8167Model->get_datatable_data($postdata['length'], $postdata['start'], $orderby, $postdata['order'][0]['dir'], $postdata['search']['value']);
 
         return $this->response->setJSON( $dataset );
     }
 
     public function download_csv_check()
     {
         $postdata = $this->request->getPost();
 
         $rules = [
             'start_date' => [
                 'label' => 'Start Date', // setting a label to field for validation error response.
                 'rules' => 'required', // setting rules
                 'errors' => [
                     'required' => '请选择开始日期 / The field Start Date is required.',
                 ]
             ],
             'end_date' => [
                 'label' => 'End Date', // setting a label to field for validation error response.
                 'rules' => 'required', // setting rules
                 'errors' => [
                     'required' => '请选择结束日期 / The field End Date is required.',
                 ]
             ],
         ];
         
         if (! $this->validate($rules)) {
             return $this->response->setJSON( [ 'status' => 0, 'validation' => $this->validator->listErrors() ] );
         }
 
         $postdata['start_date'] = $postdata['start_date']." 00:00:00";
         $postdata['end_date'] = $postdata['end_date']." 23:59:59";
 
         if( strtotime($postdata['start_date']) >  strtotime($postdata['end_date']) )
         {
             return $this->response->setJSON( [ 'status' => 0, 'validation' => '开始日期不能大于结束日期 / The field Start Date cannot be greater than End date.' ] );
         }
         $Promo8167Model = model(Promo8167Model::class);
 
         $results = $Promo8167Model->download_csv($postdata);
 
         if( count($results) == 0 )
         {
             return $this->response->setJSON( [ 'status' => 0, 'validation' => '没有找到记录 / No record found.' ] );
         }
         else 
         {
             return $this->response->setJSON( [ 'status' => 1, 'toast' => '下载已启动，请等待 / Download Initiated. Please wait.' ] );
         }
 
     }


     public function download_csv(){
     	$postdata = $this->request->getGet();

        $postdata['start_date'] = $postdata['start_date']." 00:00:00";
        $postdata['end_date'] = $postdata['end_date']." 23:59:59";

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Username');
        $activeWorksheet->setCellValue('B1', 'VIP Level');
        $activeWorksheet->setCellValue('C1', 'Prize');
        $activeWorksheet->setCellValue('D1', 'Status');
        $activeWorksheet->setCellValue('E1', 'Date Claimed');

        //$Promo3Model = model(Promo3Model::class);

        //$filename = "promo3_".$postdata['dtype']."_".date('Y-m-d-H-i-s').".xlsx";

        //$results = $Promo3Model->download_csv($postdata);
	//$Promo8167Model = model(Promo8167Model::class);
	
        $Promo8167Model = model(Promo8167Model::class);

        $filename = "promo8167_" . $postdata['dtype'] . "_" . date('Y-m-d-H-i-s') . ".xlsx";

        $results = $Promo8167Model->download_csv($postdata);


        $sumOfPrizeByUsername = [];
        $highestVipLevelByUsername = [];
        foreach ($results as $result) {
            $username = $result['username'];
            $status = $result['status'];
            $claim_date = $result['claim_date'];
            $vipLevel = $result['vip_level'];
            if (!isset($sumOfPrizeByUsername[$username])) {
                $sumOfPrizeByUsername[$username] = 0;
                $highestVipLevelByUsername[$username] = 0; // Initialize with a default value
            }
            $sumOfPrizeByUsername[$username] += $result['prize'];
            if ($vipLevel > $highestVipLevelByUsername[$username]) {
                $highestVipLevelByUsername[$username] = $vipLevel;
            }
        }

        $count = 2;
         foreach ($sumOfPrizeByUsername as $username => $totalPrize) {
            $highestVipLevel = $highestVipLevelByUsername[$username];
              $spreadsheet->getActiveSheet()->fromArray(array($username,$highestVipLevel,$totalPrize,$status,$claim_date), null, 'A'.$count)->getStyle('A'.$count)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $count++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("downloads/".$filename);
        return $this->response->download('downloads/'.$filename, null);
     }


      public function download_csv_2(){
        $postdata = $this->request->getGet();

        $postdata['start_date'] = $postdata['start_date'] . " 00:00:00";
        $postdata['end_date'] = $postdata['end_date'] . " 23:59:59";

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Username');
        $activeWorksheet->setCellValue('B1', 'VIP Level');
        $activeWorksheet->setCellValue('C1', 'Prize');
        $activeWorksheet->setCellValue('D1', 'Status');
        $activeWorksheet->setCellValue('E1', 'Date Claimed');

        $Promo8167Model = model(Promo8167Model::class);

        $filename = "promo8167_" . $postdata['dtype'] . "_" . date('Y-m-d-H-i-s') . ".xlsx";

        $results = $Promo8167Model->download_csv($postdata);

        $sumOfPrizeByUsername = [];
        $highestVipLevelByUsername = [];
        foreach ($results as $result) {
            $username = $result['username'];
            $status = $result['status'];
            $claim_date = $result['claim_date'];
            $vipLevel = $result['vip_level'];
            if (!isset($sumOfPrizeByUsername[$username])) {
                $sumOfPrizeByUsername[$username] = 0;
                $highestVipLevelByUsername[$username] = 0; // Initialize with a default value
            }
            $sumOfPrizeByUsername[$username] += $result['prize'];
            if ($vipLevel > $highestVipLevelByUsername[$username]) {
                $highestVipLevelByUsername[$username] = $vipLevel;
            }
        }

        $count = 2;
        foreach ($sumOfPrizeByUsername as $username => $totalPrize) {
            $highestVipLevel = $highestVipLevelByUsername[$username];
            $spreadsheet->getActiveSheet()->fromArray(array($username, $highestVipLevel, $totalPrize, $status, $claim_date), null, 'A' . $count)->getStyle('A' . $count)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $count++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("downloads/" . $filename);
        return $this->response->download('downloads/' . $filename, null);
    }


    
 
}

