<?php
namespace App\Controllers\Promo;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

use Config\Services;

/**
 * 
 */
class Promo8167betlist extends BaseController
{
    /**
     * 
     */

    public function index()
    {
        $dataset = [
            'pagetitle' => '上传存款',
            'css' => ['/assets/bootstrap-datepicker/css/datepicker.css'],
            // use to add css specific to page.
            'js' => ['/assets/bootstrap-datepicker/js/bootstrap-datepicker.js', '/assets/js/promo8167betlist.js'] // use to add js specific to page.
        ];

        return view('admin/v_header', $dataset)
            . view('promo/v_promo8167betlist')
            . view('admin/v_footer');
    }

    public function datatable()
    {
        $postdata = $this->request->getPost();

        // instantiate model class
        $Betlist8167Model = model(Betlist8167Model::class);

        $orderby = $postdata['columns'][$postdata['order'][0]['column']]['data']; // get proper orderby string

        $dataset = $Betlist8167Model->get_datatable_data($postdata['length'], $postdata['start'], $orderby, $postdata['order'][0]['dir'], $postdata['search']['value']);

        return $this->response->setJSON($dataset);
    }

    public function save_data_csv()
    {
        $rules = [
            'csv_file' => [
                'label' => 'Uploaded File',
                'rules' => [
                    'uploaded[csv_file]',
                    // check IF data is uploaded
                    'ext_in[csv_file,csv]' // if file extension is csv
                ],
                'errors' => [
                    'uploaded' => '请上传一个有效的文件 / Uploaded File is not a valid uploaded file.',
                    'ext_in' => '请上传一个有效的文件扩展名的文件 / Uploaded File does not have a valid file extension.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON(['status' => 0, 'validation' => $this->validator->listErrors()]);
        }
        $postdata = $this->request->getPost();
        $csv_file = $this->request->getFile('csv_file');

        $dataset = array(); // container for csv data
        if (($handle = fopen($csv_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c += 2) {
                    $dataset[] = array(
                        'username' => $data[$c],
                        'bet' => $data[$c + 1],
                        'bet_date' => Time::now()->setTime(0, 0, 0)
                    );
                }
            }

            array_shift($dataset); // remove 1st row.
            fclose($handle);
        }
        if (!$csv_file->hasMoved()) {
            // save a copy of uploads
            $filepath = WRITEPATH . 'uploads/' . $csv_file->store();
        }
        //load model
        $Betlist8167Model = model(Betlist8167Model::class);

        // insert to database
        $new = 0;
        foreach ($dataset as $row) {
            $insert_data = $Betlist8167Model->insert_data($row);
            $new += 1;
        }
        log_message('alert', 'promo3betlist/save_data_csv batch insert betlist3. user: ' . $_SESSION['username'] . ' data: ' . $new . ' entries inserted. IP: ' . getUserIP());

        return $this->response->setJSON(['status' => 1, 'result' => '任务完成。 ' . $new . '条目已插入。/ Task Completed. ' . $new . ' entries inserted.']);

    }

    public function delete_unprocessed()
    {
        $Betlist8167Model = model(Betlist8167Model::class);
        $query = $Betlist8167Model->delete_data_params(['status' => 0]);
        log_message('alert', 'Promo3betlist/delete_unprocessed. user: ' . $_SESSION['username'] . ' . IP: ' . getUserIP());
        return $this->response->setJSON([
            'status' => 1,
            'toast' => 'Unprocessed Data Removed from database.'
        ]);
    }

    public function process_data()
    {
        $Promo8167Model = model(Promo8167Model::class);
        $Betlist8167Model = model(Betlist8167Model::class);
        $Userinfo8167Model = model(Userinfo8167Model::class);

        $dataset = $Betlist8167Model->get_distinct_user_params(['status' => 0]);
        $user_insert = 0;
        $user_update = 0;
        $promo_insert = 0;
        foreach ($dataset as $row) {
            $rowset = $Betlist8167Model->get_distinct_sum_params(['username' => $row['username']]);
            $rowset = $rowset[0];
            //USERINFO. insert IF not exist, edit if exist.
            $checkuserinfo = $Userinfo8167Model->get_data_params(['username' => $row['username']]);
            $vip_level = $this->get_vip_level($rowset['total']);

            if (count($checkuserinfo)) {
                //update
                $payload = [
                    'total_bet' => $rowset['total'],
                    'vip_level' => $vip_level
                ];
                $updateuserinfo = $Userinfo8167Model->update_data_params(['username' => $row['username']], $payload);
                $user_update += 1;
            } else {
                //insert
                $payload = [
                    'username' => $row['username'],
                    'total_bet' => $rowset['total'],
                    'vip_level' => $vip_level
                ];
                $insertuserinfo = $Userinfo8167Model->insert_data($payload);
                $user_insert += 1;
            }
            //PROMO. if not exist, insert.
            if($vip_level != 0)
            {
                for($i = 1; $i <= $vip_level; $i++)
                {
                    //check if exist in promo
                    $checkpromo = $Promo8167Model->get_data_params( ['username' => $row['username'], 'vip_level' => $i] );
                    if( count($checkpromo) == 0 )
                    {

                        $initialDateTime = new Time($rowset['bet_date']);
                        $modifiedDateTime = $initialDateTime->addDays(1);
                        // Modify the time to 12:00 PM (noon)
                        $modifiedDateTime = $modifiedDateTime->modify('12:00 PM');
                        // Format the modified date and time as desired
                        $newDate = $modifiedDateTime->format('Y-m-d H:i:s');

                        $payload = [
                            'username' => $row['username'],
                            'vip_level' => $i,
                            'prize' => $this->get_vip_prize($i),
                            'status' => '已派送',
                            'for_date' => $newDate,
                            'claim_date' => Time::now()
                        ];
                        $insertpromo = $Promo8167Model->insert_data( $payload );
                        $promo_insert += 1;
                    }
                }
            }

        }



        $update_betlist = $Betlist8167Model->update_data_params(['status' => 0], ['status' => 1]);

        log_message('alert', 'Promo3betlist/process_data. user: ' . $_SESSION['username'] . ' Userinfo insert: ' . $user_insert . '. Userinfo update: ' . $user_update . '. Promo insert: ' . $promo_insert . '. IP: ' . getUserIP());
        return $this->response->setJSON([
            'status' => 1,
            'toast' => 'Data Processed. Userinfo insert: ' . $user_insert . '. Userinfo update: ' . $user_update . '. Promo insert: ' . $promo_insert
        ]);
    }


    private function get_vip_level(int $value = 0)
    {
        $level = 0;
        $value = floor($value); // remove decimal
        if ($value >= 10 && $value < 500) {
            $level = 1;
        } elseif ($value >= 500 && $value < 3000) {
            $level = 2;
        } elseif ($value >= 3000 && $value < 10000) {
            $level = 3;
        } elseif ($value >= 10000 && $value < 30000) {
            $level = 4;
        } elseif ($value >= 30000 && $value < 50000) {
            $level = 5;
        } elseif ($value >= 50000 && $value < 100000) {
            $level = 6;
        } elseif ($value >= 100000 && $value < 200000) {
            $level = 7;
        } elseif ($value >= 200000 && $value < 300000) {
            $level = 8;
        } elseif ($value >= 300000 && $value < 600000) {
            $level = 9;
        } elseif ($value >= 600000 && $value < 1000000) {
            $level = 10;
        }
        elseif($value >= 1000000 && $value < 1500000)
        {
            $level = 11;
        }
        elseif($value >= 1500000 && $value < 2000000)
        {
            $level = 12;
        } elseif ($value >= 2000000 && $value < 3000000) {
            $level = 13;
        } elseif ($value >= 3000000 && $value < 5000000) {
            $level = 14;
        } elseif ($value >= 5000000 && $value < 7000000) {
            $level = 15;
        } elseif ($value >= 7000000 && $value < 10000000) {
            $level = 16;
        } elseif ($value >= 10000000 && $value < 15000000) {
            $level = 17;
        } elseif ($value >= 15000000 && $value < 30000000) {
            $level = 18;
        } elseif ($value >= 30000000 && $value < 50000000) {
            $level = 19;
        } elseif ($value >= 50000000 && $value < 100000000) {
            $level = 20;
        } elseif ($value >= 100000000) {
            $level = 21;
        }

        return $level;
    }

    private function get_vip_prize(int $value = 0)
    {
        $p = 0;
        if ($value == 1) {
            $p = 5;
        } elseif ($value == 2) {
            $p = 10;
        } elseif ($value == 3) {
            $p = 20;
        } elseif ($value == 4) {
            $p = 30;
        } elseif ($value == 5) {
            $p = 50;
        } elseif ($value == 6) {
            $p = 80;
        } elseif ($value == 7) {
            $p = 130;
        } elseif ($value == 8) {
            $p = 300;
        } elseif ($value == 9) {
            $p = 400;
        } elseif ($value == 10) {
            $p = 600;
        } elseif ($value == 11) {
            $p = 1000;
        } elseif ($value == 12) {
            $p = 1500;
        } elseif ($value == 13) {
            $p = 2000;
        } elseif ($value == 14) {
            $p = 3000;
        } elseif ($value == 15) {
            $p = 5000;
        } elseif ($value == 16) {
            $p = 7000;
        } elseif ($value == 17) {
            $p = 10000;
        } elseif ($value == 18) {
            $p = 15000;
        } elseif ($value == 19) {
            $p = 30000;
        } elseif ($value == 20) {
            $p = 50000;
        } elseif ($value == 21) {
            $p = 100000;
        }

        return $p;
    }

}
