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

    function form()
    {
        if($this->request->getMethod()=='post')
        {
            $rules=[
                'nama_kategori'=>[
                    'label'     =>'Nama Kategori',
                    'rules'     =>'required',
                    'errors'    =>['required'=>'Nama Kategori tidak boleh kosong']
                ]
            ];

            if($this->validate($rules))
            {
                $paramcat   =array('idkategori'=>$request->getPost('idkategori'));
                $dataCat    =$this->objCategory->getDataBy($paramcat)->getRow();

                $itemslug   =str_replace(" ", "-", $request->getPost('url_kategori'));
                $slug       =strtolower($itemslug);

                $dataSave   =array(
                    'idkategori'        =>$this->request->getPost('idkategori'),
                    'nama_kategori'     =>$this->request->getPost('nama_kategori'),
                    'parent'            =>$this->request->getPost('parent'),
                    'deskripsi'         =>$this->request->getPost('deskripsi'),
                    'judul_seo'         =>$this->request->getPost('judul_seo'),
                    'deskripsi_seo'     =>$this->request->getPost('deskripsi_seo'),
                    'url_kategori'      =>$slug,
                    'idslug'            =>$this->request->getPost('idslug')
                );

                $idkategori =$this->objCategory->saveData($dataSave);

                $idslug=$request->getPost('idslug');

                $paramIdRoute=array('idslug'=>$idslug);
                $totalItemRoute=$this->objRoute->getTotalItem($paramIdRoute);

                if($totalItemRoute>0)
                {
                    $arrRoute=array(
                        'slug'          =>$slug,
                        'target'        =>'Contfrontend::category/'.$idkategori,
                        'filters'       =>''
                    );

                    $idroute=$this->objRoute->updateData($arrRoute,$idslug);
                }
                else
                {
                    $arrRoute=array(
                        'idslug'        =>'',
                        'slug'          =>$slug,
                        'target'        =>'Contfrontend::category/'.$idkategori,
                        'filters'       =>''
                    );

                    $idslug=$this->objRoute->saveData($arrRoute);
                }
            }
            else
            {
                $data['validation']     = $this->validator;
                $data['page']           = 'adm_category';

                return view('back_end',$data);
            }
        }
        else
        {
            $data['page']           = 'adm_category';

            return view('back_end',$data);
        }
    }
}