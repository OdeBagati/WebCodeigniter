<?php
namespace App\Controllers;

class Contbackend extends BaseController
{
    public function index()
    {
        if(logged_in())
        {
            $data['page']   = 'adm_dashboard';

            return view('back_end',$data);
        }
        else
        {
            return redirect()->to('login');
        }
        
    }

    function register()
    {
        return view('register');
    }
}