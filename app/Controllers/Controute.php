<?php
namespace App\Controllers;

class Controute extends BaseController
{
	public function index()
	{
		if(logged_in())
		{
			$data['dataRoute']	=$this->objRoute->getAllData();
			$data['page']		='adm_route';

			return view('back_end',$data);
		}
		else
		{
			return redirect()->to('login');
		}
	}

	function form($idslug=false)
	{
		if(logged_in())
		{
			if($idslug!=false)
			{
				$paramRoute				=array('idslug'=>$idslug);
				$rec					=$this->objRoute->getDataBy($paramRoute)->getRow();

				$data['idslug']			=$rec->idroute;
				$data['slug']			=$rec->slug;
				$data['target']			=$rec->target;
				$data['filters']		=$rec->filters;
			}

			if($this->request->getMethod()=='post')
			{
				$rules=[
					'slug'=>[
						'label' =>'Slug URL',
						'rules'	=>'required',
						'errors'	=>['required'=>'Slug URL harus diisi']
					],
					'target'=>[
						'label' =>'URL Target',
						'rules'	=>'required',
						'errors'	=>['required'=>'URL Target harus diisi']
					]
				];

				if($this->validate($rules))
				{
					$request 	= \Config\Services::request();

					$dataSave	=array(
						'idslug'		=>$request->getPost('idslug'),
						'slug'			=>$request->getPost('slug'),
						'target'		=>$request->getPost('target'),
						'filters'		=>$request->getPost('filters')
					);

					$idslug	=$this->objRoute->saveData($dataSave);

					$this->session->setFlashdata('message','Data successfully saved');
					return redirect()->to(base_url().'/admin/route-list');
				}
				else
				{
					$data['validation']	= $this->validator;
					$data['page']		= 'adm_route_form';

					return view('back_end',$data);
				}
			}
			else
			{
				$data['page']		='adm_route_form';

				return view('back_end',$data);
			}
		}
		else
		{
			return redirect()->to(base_url().'/login');
		}
	}

	function delete($idslug)
	{
		if(logged_in())
		{
			$paramSlug		=array('idslug'=>$idslug);
			$this->objRoute->deleteData($paramSlug);

			$this->session->setFlashdata('message','URL berhasil dihapus');
			return redirect()->back();
		}
		else
		{
			return redirect()->to(base_url().'/login');
		}
	}
}