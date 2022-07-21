<?php
namespace App\Controllers;

class Contbackend extends BaseController
{
    public function index()
    {
        $data['page']   = 'adm_dashboard';

        return view('back_end',$data);
    }

    function register()
    {
        return view('register');
    }
}