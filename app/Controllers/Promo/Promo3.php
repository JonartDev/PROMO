<?php
namespace App\Controllers\Promo;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Config\Services;

/**
 * 
 */
class Promo3 extends BaseController
{
	/**
	 * 
	 */

	public function index()
	{
        $dataset = [
			'pagetitle' => '彩金',
			'css' => [ '/assets/bootstrap-datepicker/css/datepicker.css' ], // use to add css specific to page.
			'js' => [ '/assets/bootstrap-datepicker/js/bootstrap-datepicker.js', '/assets/js/promo3.js' ] // use to add js specific to page.
		];

		return view('admin/v_header' , $dataset)
			. view('promo/v_promo3')
			. view('admin/v_footer');
    }

    public function datatable(){
        $postdata = $this->request->getPost();

        // instantiate model class
		$Promo3Model = model(Promo3Model::class);

        $orderby =  $postdata['columns'][ $postdata['order'][0]['column'] ]['data']; // get proper orderby string

        $dataset = $Promo3Model->get_datatable_data($postdata['length'], $postdata['start'], $orderby, $postdata['order'][0]['dir'], $postdata['search']['value']);

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
        $Promo3Model = model(Promo3Model::class);

        $results = $Promo3Model->download_csv($postdata);

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
 
	$Promo3Model = model(Promo3Model::class);

	$filename = "promo3_".$postdata['dtype']."_".date('Y-m-d-H-i-s').".xlsx";

	$results = $Promo3Model->download_csv($postdata);

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

    public function download_csv_2()
    {
        $postdata = $this->request->getGet();

        $postdata['start_date'] = $postdata['start_date']." 00:00:00";
        $postdata['end_date'] = $postdata['end_date']." 23:59:59";

        $Promo3Model = model(Promo3Model::class);

        $filename = "promo3_".$postdata['dtype']."_".date('Y-m-d-H-i-s').".csv";

	
        header("Content-Description: File Transfer");
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
	 
	$results = $Promo3Model->download_csv($postdata);

         // file creation 
        $file = fopen('php://output', 'w');

        $header = array('Username', 'VIP Level', 'Prize', 'Status', 'Date Claimed');

        fputcsv($file, $header);
        //echo $TmleadsModel->getLastQuery();
	foreach ($results as $key=>$line){
		$n_line = [];
		if(is_numeric($line["username"])){
			//echo $line['username']."\n";
			$line["username"] = $line["username"]."";
		}else{
			//echo $line['username'];
                	$line["username"] = $line["username"];
		}
		//$line["username"] = "=".$line["username"]." ";
            fputcsv($file,$line); 
        }
        fclose($file); 
    }

    public function payout_status()
    {
        $id = $this->request->getPost('id');
        $selectedStatus = $this->request->getPost('selectedStatus');
        $Promo3Model = model(Promo3Model::class);
        $Promo3Model->update_status($id, $selectedStatus);
        return $this->response->setJSON(['success' => true]);
    }

}
