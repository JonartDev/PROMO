<?php
namespace App\Controllers\Promo;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Config\Services;

/**
 * 
 */
class DailySummary extends BaseController
{
	/**
	 * 
	 */

	public function index()
	{
        $dataset = [
			'pagetitle' => '促销总结 / Promo Summary',
			'css' => [ '/assets/bootstrap-datepicker/css/datepicker.css' ], // use to add css specific to page.
			'js' => [ '/assets/bootstrap-datepicker/js/bootstrap-datepicker.js', '/assets/js/dailysummary.js' ] // use to add js specific to page.
		];

		return view('admin/v_header' , $dataset)
			. view('promo/v_dailysummary')
			. view('admin/v_footer');
    }

    public function datatable(){ 
        $postdata = $this->request->getPost();

        // instantiate model class
		$Promo1Model = model(Promo1Model::class);
		$Promo1eModel = model(Promo1ewalletModel::class);
		$Promo4fModel = model(Promo4fishingModel::class);
		$Promo4gModel = model(Promo4gamblingModel::class);
        $params=[];
        $current_date =Time::now()->toDateString();
        $params['where']['status'] = '已派送';
       if($postdata['username'])$params['where']['username']=$postdata['username'];
       if($postdata['status']=="0")$params['where']['paid'] ="0";
       if($postdata['status']=="1")$params['where']['paid'] ="1";
       if($postdata['win_date'])
       {
        $params['where']['claim_date>=']  = $postdata['win_date']." 00:00:00";
        $params['where']['claim_date<=']  = $postdata['win_date']." 23:59:59";
       }
       else  $params['where']['claim_date'] =$current_date;
       if(!$postdata['promotype']=="all"){
            if($postdata['claim_date'])
            {
                $params['where']['paid_date >=']=$postdata['claim_date']." 00:00:00";
                $params['where']['paid_date <=']=$postdata['claim_date']." 23:59:59";
            }
        }
       
       // if($postdata['status']>=0)$params['where']['paid']=$postdata['status'];
        if($postdata['promotype']=="promo1")$dataset= $Promo1Model->get_datatable_summary($params);
        if($postdata['promotype']=="promo4fishing")$dataset= $Promo4fModel->get_datatable_summary($params);
        if($postdata['promotype']=="promo4gambling")$dataset= $Promo4gModel->get_datatable_summary($params);
        if($postdata['promotype']=="promo1e")$dataset= $Promo1eModel->get_datatable_summary($params);
        if($postdata['promotype']=="all"){
           
            $dataset1 = $Promo1Model->get_datatable_summary($params);
            $dataset2 = $Promo4gModel->get_datatable_summary($params);
            $dataset3 = $Promo4fModel->get_datatable_summary($params);
            $dataset4= $Promo1eModel->get_datatable_summary($params);
            $dataset['data'] = array_merge($dataset1['data'], $dataset2['data'], $dataset3['data'],$dataset4['data']);
            $dataset['recordsTotal'] = array_sum(array_column([$dataset1, $dataset2, $dataset3, $dataset4], 'recordsTotal'));
        }

        
        
        return $this->response->setJSON( $dataset );
    }

    public function payout()
    {
        $postdata = $this->request->getPost();
        $PromoSummaryModel ="";
        if($postdata['type'] == "promo1")$PromoSummaryModel = model(Promo1Model::class);
        if($postdata['type'] == "promo1e")$PromoSummaryModel = model(Promo1ewalletModel::class);
        if($postdata['type'] == "promo4fishing")$PromoSummaryModel = model(Promo4fishingModel::class);
        if($postdata['type'] == "promo4gambling")$PromoSummaryModel = model(Promo4gamblingModel::class);

        if($PromoSummaryModel)
        {
            $data =[
                'paid' => "1",
                'paid_date' =>Time::now()->toDateTimeString(),
            ]; 
            $updateuserinfo = $PromoSummaryModel->set_payout(['id' => $postdata['id']], $data);
            if($updateuserinfo)
            {
                return $this->response->setJSON(['status' => 1, 'message' => 'User was paid.']);
            }
            else
            {
                return $this->response->setJSON(['status' => 0, 'message' => 'Unable to update user.']);
            }
        }
        else
        {
            return $this->response->setJSON(['status' =>  $postdata["type"], 'message' => 'Invalid promo type.']);
        }
    }
}