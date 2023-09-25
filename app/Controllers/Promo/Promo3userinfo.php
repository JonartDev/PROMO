<?php

namespace App\Controllers\Promo;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Config\Services;

/**
 * 
 */
class Promo3userinfo extends BaseController
{
    /**
     * 
     */

    public function index()
    {
        $dataset = [
            'pagetitle' => '总存款',
            'css' => ['/assets/bootstrap-datepicker/css/datepicker.css'], // use to add css specific to page.
            'js' => ['/assets/bootstrap-datepicker/js/bootstrap-datepicker.js', '/assets/js/promo3userinfo.js'] // use to add js specific to page.
        ];

        return view('admin/v_header', $dataset)
            . view('promo/v_promo3userinfo')
            . view('admin/v_footer');
    }

    public function datatable()
    {
        $postdata = $this->request->getPost();

        // instantiate model class
        $Userinfo3Model = model(Userinfo3Model::class);

        $orderby =  $postdata['columns'][$postdata['order'][0]['column']]['data']; // get proper orderby string

        $dataset = $Userinfo3Model->get_datatable_data($postdata['length'], $postdata['start'], $orderby, $postdata['order'][0]['dir'], $postdata['search']['value']);

        return $this->response->setJSON($dataset);
    }

    public function download_csv()
    {
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'ID');
        $activeWorksheet->setCellValue('B1', 'Username');
        $activeWorksheet->setCellValue('C1', 'Total Bet');
        $activeWorksheet->setCellValue('D1', 'VIP Level');
        $activeWorksheet->setCellValue('E1', 'Date Created');
        $activeWorksheet->setCellValue('F1', 'Date Updated');

        $Userinfo3Model = model(Userinfo3Model::class);

        $filename = "promo3userinfo_" . date('Y-m-d-H-i-s') . ".xlsx";
        $results = $Userinfo3Model->download_csv();

        $count = 2;

        foreach ($results as $result) {
            $id = $result['id'];
            $username = $result['username'];
            $total_bet = $result['total_bet'];
            $date_created = $result['created_at'];
            $date_updated = $result['updated_at'];
            $vipLevel = $result['vip_level'];
            $spreadsheet->getActiveSheet()->fromArray(array($id, $username, $total_bet, $vipLevel, $date_created, $date_updated), null, 'A' . $count)->getStyle('B' . $count)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $count++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("downloads/" . $filename);
        return $this->response->download('downloads/' . $filename, null);
    }

    /*
    public function download_csv_2()
    {
        $Userinfo3Model = model(Userinfo3Model::class);

        $filename = "promo3userinfo_".date('Y-m-d-H-i-s').".csv";

        header("Content-Description: File Transfer"); 
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');

        $results = $Userinfo3Model->download_csv();

         // file creation 
        $file = fopen('php://output', 'w');

        $header = array('ID', 'Username', 'Total Bet', 'VIP Level', 'Date Created', 'Date Updated');

        fputcsv($file, $header);
        foreach ($results as $key=>$line){
            fputcsv($file,$line); 
        }
        fclose($file); 
    }*/
}
