<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $dataset = [
            'pagetitle' => '澳门新葡京',
            'css' => [], // use to add css specific to page.
            'js' => [] // use to add js specific to page.
        ];

        return view('v_index' , $dataset);
    }

    public function mobile()
    {
        $dataset = [
            'pagetitle' => '澳门新葡京',
            'css' => [], // use to add css specific to page.
            'js' => [] // use to add js specific to page.
        ];

        return view('v_mobile' , $dataset);
    }
}
