<?php
namespace App\Controllers;

class Contproduct extends BaseController
{
    public function index()
    {
        $data['dataProduk'] = $this->objProduct->getAllProductCat();
        $data['page']       = 'adm_product';

        return view('back_end',$data);
    }

    function form($idproduk=false)
    {
        if($idproduk!=false)
        {
            $paramProduct       =array('idproduk'=>$idproduct);
            $rec                =$this->objProduct->getDataBy($paramProduct)->getRow();

            $data['idproduk']           =$rec->idproduk;
            $data['nama_produk']        =$rec->nama_produk;
            $data['thumbnail']          =$rec->thumbnail;
            $data['alt_thumb']          =$rec->alt_thumb;
            $data['penjelasan_singkat'] =$rec->penjelasan_singkat;
            $data['deskripsi']          =$rec->deskripsi;
            $data['min_kapasitas']      =$rec->min_kapasitas;
            $data['harga']              =$rec->harga;
            $data['harga_termasuk']     =$rec->harga_termasuk;
            $data['harga_diluar']       =$rec->harga_diluar;
            $data['durasi']             =$rec->durasi;
            $data['info_tambahan']      =$rec->info_tambahan;
            $data['judul_seo']          =$rec->judul_seo;
            $data['deskripsi_seo']      =$rec->deskripsi_seo;
            $data['keyword_seo']        =$rec->keyword_seo;
            $data['idkategori']         =$rec->idkategori;
            $posisi1=strrpos($rec->url_produk,'/');
            $posisi2=strrpos($rec->url_produk,'/',$posisi1+1);

            if($posisi2>0)
            {
                $currentSlug=substr($rec->url_produk, $posisi2+1);
            }
            else if($posisi1>0)
            {
                $currentSlug=substr($rec->url_produk, $posisi1+1);
            }
            else
            {
                $currentSlug=$rec->url_produk;
            }
            $data['url_produk']         =$currentSlug;
            $data['idslug']             =$rec->idslug;
        }

        if($this->request->getMethod()=='post')
        {
            $rules=[
                'nama_produk'=>[
                    'label'     =>'Nama Produk',
                    'rules'     =>'required',
                    'errors'    =>['required'=>'Nama Produk tidak boleh kosong']
                ],
                'url_produk'=>[
                    'label'     =>'URL Produk',
                    'rules'     =>'required',
                    'errors'    =>['required'=>'URL Produk tidak boleh kosong']
                ],
                'harga'=>[
                    'label'     =>'Harga',
                    'rules'     =>'required|greater_than[0]',
                    'errors'    =>['required'=>'Harga tidak boleh kosong','greater_than[0]'=>'Mau kasi tamunya gratisan?']
                ]
            ];

            if($this->validate($rules))
            {
                $path       ='./assets/img/';
                $images     =service('image');
                $file       =$this->request->getFile('upload_photo');

                if($file->isValid() && !$file->hasMoved())
                {
                    $file->move('./assets/img/', $file->getName());
                    $fileName=$file->getName();

                    $namafoto=$this->request->getPost('thumbnail');

                    if($namafoto!="" and $namafoto!="no-image.jpg" and file_exists(realpath(APPPATH . './assets/img/'.$namafoto)))
                    {
                        unlink(realpath(APPPATH . './assets/img/'.$namafoto));
                    }
                }
                else
                {
                    if($this->request->getPost('thumbnail')=="")
                    {
                        $fileName="no-image.jpg";
                    }
                    else
                    {
                        $fileName=$this->request->getPost('thumbnail');
                    }
                }

                $paramcat=array('idkategori'=>$this->request->getPost('idkategori'));
                $dataCat=$this->objCategory->getDataBy($paramcat)->getRow();

                $itemslug=str_replace(" ", "-", $this->request->getPost('url_produk'));
                $slug=$dataCat->url_kategori.'/'.strtolower($itemslug);

                $dataSave   =array(
                    'idproduk'          =>$this->request->getPost('idproduk'),
                    'nama_produk'       =>$this->request->getPost('nama_produk'),
                    'thumbnail'         =>$fileName,
                    'alt_thumb'         =>$this->request->getPost('alt_thumb'),
                    'penjelasan_singkat'=>$this->request->getPost('penjelasan_singkat'),
                    'deskripsi'         =>$this->request->getPost('deskripsi'),
                    'min_kapasitas'     =>$this->request->getPost('min_kapasitas'),
                    'durasi'            =>$this->request->getPost('durasi'),
                    'harga'             =>$this->request->getPost('harga'),
                    'harga_termasuk'    =>$this->request->getPost('harga_termasuk'),
                    'harga_diluar'      =>$this->request->getPost('harga_diluar'),
                    'judul_seo'         =>$this->request->getPost('judul_seo'),
                    'deskripsi_seo'     =>$this->request->getPost('deskripsi_seo'),
                    'keyword_seo'       =>$this->request->getPost('keyword_seo'),
                    'idkategori'        =>$this->request->getPost('idkategori'),
                    'idslug'            =>$this->request->getPost('idslug'),
                    'url_produk'        =>$slug
                );

                $idproduk       =$this->objProduct->saveData($dataSave);
                $idslug         =$this->request->getPost('idslug');

                $paramIdRoute   =array('idslug'=>$idslug);
                $totalItemRoute =$this->objRoute->getTotalItem($paramIdRoute);

                if($totalItemRoute>0)
                {
                    $arrRoute=array(
                        'slug'      =>$slug,
                        'target'    =>'Contfrontend::product/'.$idproduk,
                        'filters'   =>''
                    );

                    $idslug=$this->objRoute->updateData($arrRoute,$idslug);
                }
                else
                {
                    $arrRoute=array(
                        'idslug'    =>'',
                        'slug'      =>$slug,
                        'target'    =>'Contfrontend::product/'.$idproduk,
                        'filters'   =>''
                    );

                    $idslug=$this->objRoute->saveData($arrRoute);
                }

                $arrUpdateProduct=array('idslug'=>$idslug);
                $this->objProduct->updateData($arrUpdateProduct,$idproduk);

                $this->session->setFlashdata('message','Proses penyimpanana data berhasil');
                return redirect()->to(base_url().'/admin/product-list');
            }
            else
            {
                $data['validation']     =$this->validator;
                $data['page']           ='adm_product_form';

                return view('back_end',$data);
            }
        }
        else
        {
            $data['page']           ='adm_product_form';

            return view('back_end',$data);
        }
    }
}