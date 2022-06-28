<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdldetailorder extends Model
{
	protected $table      = 'joyful_detail_order';
    protected $primaryKey = 'iddetailorder ';

    protected $builder;
    protected $db;

    protected $allowedFields = ['iddetailorder','idorder','idproduct','booking_date','sellingprice','subqty','subtotal'];

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('joyful_detail_order');
    }

    function getTotalItem($param)
    {
        $this->builder->where($param);
        return $this->builder->countAllResults();
    }

    function saveData($arrSave)
    {
        if($arrSave['iddetailorder']>0)
        {
            $this->builder->where('iddetailorder',$arrSave['iddetailorder']);
            $this->builder->update($arrSave);
            return $arrSave['iddetailorder'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function getDetailOrderBy($param)
    {
        $this->builder->select('*,joyful_product.idproduct as id_dari_tabel_produk');
        $this->builder->join('joyful_product','joyful_product.idproduct=joyful_detail_order.idproduct');
        $this->builder->join('joyful_review','joyful_review.detail_id=joyful_detail_order.iddetailorder','left');
        $this->builder->where($param);
        return $this->builder->get();
    }

    function checkStatus($paramProduct,$paramCustomer,$paramStatus)
    {
        $this->builder->join('joyful_order','joyful_detail_order.idorder=joyful_order.idorder');
        $this->builder->where('idproduct',$paramProduct)->where('idcustomer',$paramCustomer)->where('status_order',$paramStatus);
        return $this->builder->get()->getResultArray();
    }

    function deleteDetail($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }

    function updateData($arrSave,$iddetailorder)
    {
        $this->builder->where('iddetailorder',$iddetailorder);
        $this->builder->update($arrSave);
        return $iddetailorder;
    }
}