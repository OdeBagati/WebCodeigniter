<?php
namespace App\Controllers;

class Contcategory extends BaseController
{
    public function index()
    {
        $data['dataKategori']   =$this->objCategory->getParentName();
        $data['page']           = 'adm_category';

        return view('back_end',$data);
    }
}