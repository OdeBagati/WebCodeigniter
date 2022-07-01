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

    function form($idkategori=false)
    {
        if($idkategori!=false)
        {
            $paramCat           =array('idkategori'=>$idkategori);
            $rec                =$this->objCategory->getDataBy($paramCat)->getRow();

            $data['idkategori']     =$rec->idkategori;
            $data['nama_kategori']  =$rec->nama_kategori;
            $data['parent']         =$rec->parent;
            $data['deskripsi']      =$rec->cat_desc;
            $data['judul_seo']      =$rec->cat_seo_title;
            $data['deskripsi_seo']  =$rec->cat_seo_desc;
            $data['keyword_seo']    =$rec->cat_seo_desc;
            $posisi1=strrpos($rec->category_slug,'/');
            if($posisi1>0)
            {
                $currentSlug=substr($rec->category_slug, $posisi1+1);
            }
            else
            {
                $currentSlug=$rec->category_slug;
            }
            $data['url_kategori']   =$currentSlug;
            $data['idslug']         =$rec->idslug;
        }

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
                $paramcat   =array('idkategori'=>$this->request->getPost('idkategori'));
                $dataCat    =$this->objCategory->getDataBy($paramcat)->getRow();

                $itemslug   =str_replace(" ", "-", $this->request->getPost('url_kategori'));
                $slug       =strtolower($itemslug);

                $dataSave   =array(
                    'idkategori'        =>$this->request->getPost('idkategori'),
                    'nama_kategori'     =>$this->request->getPost('nama_kategori'),
                    'parent'            =>$this->request->getPost('parent'),
                    'deskripsi'         =>$this->request->getPost('deskripsi'),
                    'judul_seo'         =>$this->request->getPost('judul_seo'),
                    'deskripsi_seo'     =>$this->request->getPost('deskripsi_seo'),
                    'keyword_seo'       =>$this->request->getPost('keyword_seo'),
                    'url_kategori'      =>$slug,
                    'idslug'            =>$this->request->getPost('idslug')
                );

                $idkategori =$this->objCategory->saveData($dataSave);

                $idslug=$this->request->getPost('idslug');

                $paramIdRoute=array('idslug'=>$idslug);
                $totalItemRoute=$this->objRoute->getTotalItem($paramIdRoute);

                if($totalItemRoute>0)
                {
                    $arrRoute=array(
                        'slug'          =>$slug,
                        'target'        =>'Contfrontend::category/'.$idkategori,
                        'filters'       =>''
                    );

                    $idslug=$this->objRoute->updateData($arrRoute,$idslug);
                }
                else
                {
                    $arrRoute=array(
                        'idslug'        =>'',
                        'slug'          =>$slug,
                        'target'        =>'Contfrontend::category/'.$this->request->getPost('idkategori'),
                        'filters'       =>''
                    );

                    $idslug=$this->objRoute->saveData($arrRoute);
                }

                $this->session->setFlashdata('message','Kategori berhasil disimpan');
                return redirect()->to(base_url().'/admin/category-list');
            }
            else
            {
                $data['validation']     = $this->validator;
                $data['page']           = 'adm_category_form';

                return view('back_end',$data);
            }
        }
        else
        {
            $data['page']           = 'adm_category_form';

            return view('back_end',$data);
        }
    }

    function delete($idkategori)
    {
        $paramCat       =array('idkategori'=>$idkategori);
        $rec            =$this->objCategory->getDataBy($paramCat)->getRow();

        $idkategori     =$rec->idkategori;
        $idslug         =$rec->idslug;

        $paramSlug      =array('idslug'=>$idslug);
        $this->objRoute->deleteData($paramSlug);
        $this->objCategory->deleteData($paramCat);

        $this->session->setFlashdata('message','Kategori berhasil dihapus');
        return redirect()->to(base_url().'/admin/category-list');
    }
}