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

	function product($idproduk)
	{

		$paramProduk			=array('idproduk'=>$idproduk);
		$produkData 			=$this->objProduct->getDataBy($paramProduk)->getRow();

		$data['dataProduk']		=$this->objProduct->getDataNCat($paramProduk)->getRow();
		$idkategori				=array('idkategori'=>$data['dataProduk']->idkategori);
		$data['produkList']		=$this->objProduct->getDataBy($idkategori);

		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['listProduk']		=$this->objProduct->getDataBy($paramProduk);
		$data['dataGaleri']		=$this->objGallery->getGalByProduct($paramProduk);
		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['page']			='product_page';

		$data['judul_seo']		=$produkData->judul_seo_produk;
		$data['deskripsi_seo']	=$produkData->deskripsi_seo_produk;
		$data['keyword_seo']	=$produkData->keyword_seo_produk;

		return view('front_end',$data);
	}
}