<?php 
namespace App\Controllers;

class Contcart extends BaseController
{
	public function index()
	{
		$paramPage				=array('idhalaman'=>2);
		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['itemPage']		=$this->objPage->getDataBy($paramPage)->getRow();
		$data['page']			= 'cart';

		//SEO
		$data['judul_seo']		=$data['itemPage']->judul_seo;
		$data['deskripsi_seo']	=$data['itemPage']->deskripsi_seo;
		$data['keyword_seo']	=$data['itemPage']->keyword_seo;
		$data['judul_halaman']	=$data['itemPage']->judul_halaman;
		$data['deskripsi']		=$data['itemPage']->deskripsi;

		return view('front_end',$data);
	}
}