<?php
namespace App\Controllers;

class Contgallery extends BaseController
{
	public function index()
	{
		if(logged_in())
		{
			$data['dataGaleri']	= $this->objGallery->getAllData();
			$data['page']		= 'adm_gallery';

			return view('back_end',$data);
		}
		else
		{
			return redirect()->to('login');
		}
	}

	function form()
	{
		if(logged_in())
		{
			if($this->request->getMethod()=='post')
			{
				$rules=[
					'upload_photo'	=>[
						'label'	=>'Product Image',
						'rules'	=>'uploaded[upload_photo]|max_size[upload_photo, 2048]|is_image[upload_photo]',
						'errors'=>['uploaded'=>'Foto harus diupload','max_size[upload_photo, 2048]'=>'Maks ukuran foto harus 2MB']
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
	                }
	                else
	                {
	                    if($this->request->getPost('upload_photo')=="")
	                    {
	                        $fileName="no-image.jpg";
	                    }
	                    else
	                    {
	                        $fileName=$this->request->getPost('upload_photo');
	                    }
	                }

	                $dataSave	= array(
						'idgaleri'			=>$this->request->getPost('idgaleri'),
						'idproduk'			=>$this->request->getPost('idproduk'),
						'foto'				=>$fileName,
						'alt_foto'			=>$this->request->getPost('alt_foto')
					);

					$this->objGallery->saveData($dataSave);

					$this->session->setFlashdata('message','Foto berhasil disimpan');
					return redirect()->to(base_url('admin/gallery-list'));
				}

				else
				{
					$data['validation']	= $this->validator;
					$data['page']		= 'adm_gallery_form';

					return view('back_end',$data);
				}
			}
			else
			{
				$data['page']		= 'adm_gallery_form';

				return view('back_end',$data);
			}
		}
		else
		{
			return redirect()->to(base_url().'/login');
		}
	}

	function delete($idgaleri)
	{
		if(logged_in())
		{
			$paramGal	= array('idgaleri'=>$idgaleri);
			$dataFoto	= $this->objGallery->getDataBy($paramGal);

			$thumbnail	= $dataFoto->foto;

			if($thumbnail!="" and $thumbnail!="no-image.jpg" and file_exists(realpath(APPPATH . './assets/img/'.$thumbnail)))
	        {
	            unlink(realpath(APPPATH . './assets/img/'.$thumbnail));
	        }

			$this->objGallery->deleteData($paramGal);

			return redirect()->to(base_url().'/admin/gallery-list');
		}
		else
		{
			return redirect()->to(base_url().'/login');
		}
	}
}