<?php
namespace App\Controllers;

class Contfrontend extends BaseController
{
	public function index()
	{
		$paramKategori			=0;

		$data['main_menu']		=$this->objCategory->getMenuCat();
		// $data['total']			=$this->objProduct->getTotalProduct($param);
		$data['dataKategori']	=$this->objCategory->getCatwithParent($paramKategori)->getResult();

		return view('header',$data);
	}
}