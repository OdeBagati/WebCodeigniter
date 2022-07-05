<?php
namespace App\Controllers;

class Contfrontend extends BaseController
{
	public function index()
	{
		$paramKategori			=0;
		$paramPage				=array('idhalaman'=>1);

		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['dataKategori']	=$this->objCategory->getCatwithParent($paramKategori)->getResult();
		$data['itemPage']		=$this->objPage->getDataBy($paramPage)->getRow();
		$data['page']			='home_page';

		//SEO
		$data['judul_seo']		=$data['itemPage']->judul_seo;
		$data['deskripsi_seo']	=$data['itemPage']->deskripsi_seo;
		$data['keyword_seo']	=$data['itemPage']->keyword_seo;
		$data['judul_halaman']	=$data['itemPage']->judul_halaman;
		$data['deskripsi']		=$data['itemPage']->deskripsi;

		return view('front_end',$data);
	}

	function category($idkategori)
	{
		$param					=array('idkategori'=>$idkategori);

		$dataCat				=$this->objCategory->getDataBy($param)->getRow();
		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['dataKategori']	=$this->objCategory->getDataBy($param)->getRow();
		$data['dataProduk']		=$this->objProduct->getDataBy($param);
		$data['page']			='category_page';

		//SEO
		$data['judul_seo']		=$dataCat->judul_seo;
		$data['deskripsi_seo']	=$dataCat->deskripsi_seo;
		$data['keyword_seo']	=$dataCat->keyword_seo;

		return view('front_end',$data);
	}
}