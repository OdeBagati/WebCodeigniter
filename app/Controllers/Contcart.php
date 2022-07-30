<?php 
namespace App\Controllers;

class Contcart extends BaseController
{
	public function index()
	{
		$paramPage				=array('idhalaman'=>2);
		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['itemPage']		=$this->objPage->getDataBy($paramPage)
		->getRow();
		$data['items']			=$this->session->get('cart');
		$data['subtotal']		=$this->subtotal();
		$data['page']			= 'cart';

		//SEO
		$data['judul_seo']		=$data['itemPage']->judul_seo;
		$data['deskripsi_seo']	=$data['itemPage']->deskripsi_seo;
		$data['keyword_seo']	=$data['itemPage']->keyword_seo;
		$data['judul_halaman']	=$data['itemPage']->judul_halaman;
		$data['deskripsi']		=$data['itemPage']->deskripsi;

		return view('front_end',$data);
	}

	function insertCart()
	{
		if($this->request->getMethod()=='post')
		{
			$rules = [
				'qty' => [
					'rules' => 'required|greater_than[0]',
					'errors'=> [
						'required' 		=> 'Quantity field is required',
						'greater_than'	=> 'Quantity must be greater than 0'
					]
				],
				'booking_date' => [
					'rules' => 'required|check_date',
					'errors'=> [
						'required'	=> 'Order date is required',
						'check_date'=> 'Please select date after today'
					]
				]
			];

			if($this->validate($rules))
			{
				$idproduk		=$this->request->getPost('idproduk');

				$paramProduk	=array('idproduk'=>$this->request->getPost('idproduk'));
				$rec			=$this->objProduct->getDataBy($paramProduk)->getRow();

				$item=array(
					'idproduk'			=>$this->request->getPost('idproduk'),
					'produk'			=>$rec->nama_produk,
					'photo'				=>$rec->foto_produk,
					'harga'				=>$rec->harga,
					'qty'				=>$this->request->getPost('qty'),
					'booking_date'		=>$this->request->getPost('booking_date')
				);

				if($this->session->has('cart'))
				{
					$checkValue	=$this->check_cart($idproduk);
					$cart		=$this->session->get('cart');

					if($checkValue==1)
					{
						$cart[$idproduk]['qty']++;
					}
					else
					{
						$cart[$idproduk]=$item;
					}
				}
				else
				{
					$cart[$idproduk]=$item;
				}

				$this->session->set('cart',$cart);

				return redirect()->to(base_url().'/cart');
			}
			else
			{
				$this->session->setFlashdata('valid',$this->validator);

				return redirect()->back();
			}
		}
		else
		{
			return redirect()->back();
		}
	}

	function check_cart($idproduk)
	{
		if($this->session->has('cart'))
		{
			$items = $this->session->get('cart');
			
			foreach($items as $index =>$item)
			{
				if($index==($idproduk))
				{
					return 1;
				}
			}
			return -1;
		}
		else
		{
			return -1;
		}
	}

	function subtotal()
	{
		$subtotal=0;

		if($this->session->has('cart'))
		{
			$items=$this->session->get('cart');
			foreach($items as $index => $item)
			{
				$subtotal+=$item['qty']*$item['harga'];
			}
		}
		return $subtotal;
	}

	function update_qty()
	{
		$paramPage				=array('idhalaman' => 2 );

		if($this->request->getMethod()=='post')
		{
			$rules = [
				'qty' => [
					'rules' => 'required|greater_than[0]',
					'errors'=> [
						'required' 		=> 'Quantity field is required',
						'greater_than'	=> 'Quantity must be greater than 0'
					]
				]
			];

			if($this->validate($rules))
			{
				$rowid		=$this->request->getPost('rowid');
				$qty		=$this->request->getPost('qty');
				$cart		=$this->session->get('cart');
				$this->session->remove('cart');
				$cart[$rowid]['qty']=$qty;
				

				$this->session->set('cart',$cart);
				return redirect()->to(base_url().'/cart');
			}
			else
			{
				return redirect()->to(base_url().'/cart');
			}
		}
		else
		{
			return redirect()->to(base_url().'/cart');
		}
	}

	function total_qty()
	{
		$total_qty=0;

		if($this->session->has('cart'))
		{
			$items=$this->session->get('cart');
			foreach($items as $index => $item)
			{
				$total_qty+=$item['qty']*$item['qty'];
			}
		}
		return $total_qty;
	}

	function del_item_cart($rowid)
	{
		$cart=$this->session->get('cart');

		unset($cart[$rowid]);
		$cart2=$this->session->set('cart',$cart);
		return redirect()->to(base_url().'/cart');
	}

	function next()
	{
		if($this->request->getMethod()=='post')
		{
			$rules=[
                'firstname'=>[
                    'rules'     =>'required',
                    'errors'    =>['required'=>'Firstname is required']
                ],
				'lastname'=>[
                    'rules'     =>'required',
                    'errors'    =>['required'=>'Lastname is required']
                ],
                'pickup'=>[
                    'rules'     =>'required',
                    'errors'    =>['required'=>'Pickup address is required']
                ],
            ];

            if($this->validate($rules))
            {
            	$arrOrder = array(
            		'order_date' => date('Y-m-d'),
            		'firstname'	=> $this->request->getPost('firstname'),
            		'lastname'	=> $this->request->getPost('lastname'),
            		'pickup'	=> $this->request->getPost('pickup'),
            	);

            	$this->session->set('arrOrder',$arrOrder);

            	return redirect()->to(base_url().'/checkout');
            }
            else
            {
            	$paramPage				=array('idhalaman'=>2);

            	$data['validation']		=$this->validator;
				$data['main_menu']		=$this->objCategory->getMenuCat();
				$data['itemPage']		=$this->objPage->getDataBy($paramPage)
				->getRow();
				$data['items']			=$this->session->get('cart');
				$data['subtotal']		=$this->subtotal();
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
		else
		{
			return redirect()->back();
		}
	}

	function checkout()
	{
		$paramPage				=array('idhalaman'=>2);
		$data['main_menu']		=$this->objCategory->getMenuCat();
		$data['itemPage']		=$this->objPage->getDataBy($paramPage)
		->getRow();
		$data['items']			=$this->session->get('cart');
		$data['arrOrder']		=$this->session->get('arrOrder');
		$data['subtotal']		=$this->subtotal();
		$data['page']			= 'checkout';

		//SEO
		$data['judul_seo']		=$data['itemPage']->judul_seo;
		$data['deskripsi_seo']	=$data['itemPage']->deskripsi_seo;
		$data['keyword_seo']	=$data['itemPage']->keyword_seo;
		$data['judul_halaman']	=$data['itemPage']->judul_halaman;
		$data['deskripsi']		=$data['itemPage']->deskripsi;

		return view('front_end',$data);
	}

	function finish()
	{
		$itemOrder		=$this->session->get('arrOrder');

		//Save data Order
		if(logged_in())
		{
			$arrSaveOrder=array(
				'idorder'		=>'',
				'idcustomer'	=>user()->id,
				'nama_customer'	=>user()->firstname.' '.user()->lastname,
				'tgl_order'		=>date("Y-m-d h:i:s"),
				'pickup'		=>$itemOrder['pickup'],
				'qty'			=>$this->total_qty(),
				'total'			=>$this->subtotal(),
				'payment'		=>'transfer',
				'status_order'	=>'order',
				'status_cancel'	=>'no',
			);
		}
		else
		{
				$arrSaveOrder=array(
				'idorder'		=>'',
				'idcustomer'	=>'0',
				'nama_customer'	=>$itemOrder['firstname'].' '.$itemOrder['lastname'],
				'tgl_order'		=>date("Y-m-d h:i:s"),
				'pickup'		=>$itemOrder['pickup'],
				'qty'			=>$this->total_qty(),
				'total'			=>$this->subtotal(),
				'payment'		=>'transfer',
				'status_order'	=>'order',
				'status_cancel'	=>'no',
			);
		}
		
		$idorder=$this->objOrder->saveData($arrSaveOrder);

		//Save detail Order
		$items=$this->session->get('cart');
		foreach($items as $item)
		{
			$arrDetailOrder=array(
				'iddetailorder'		=>'',
				'idorder'			=>$idorder,
				'idproduk'			=>$item['idproduk'],
				'tgl_booking'		=>$item['booking_date'],
				'harga_jual'		=>$item['harga'],
				'subqty'			=>$item['qty'],
				'subtotal'			=>$item['harga']*$item['qty'],
			);

		$this->objDetailorder->saveData($arrDetailOrder);
		}

		$this->session->remove('cart','arrOrder');

		return redirect()->to(base_url().'/cart');
	}
}