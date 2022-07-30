<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdldetailorder extends Model
{
	protected $table      = 'tb_detail_order';
    protected $primaryKey = 'iddetailorder ';

    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('tb_detail_order');
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
        $this->builder->select('*,tb_produk.idproduk as id_dari_tabel_produk');
        $this->builder->join('tb_produk','tb_produk.idproduk=tb_detail_order.idproduk');
        // $this->builder->join('joyful_review','joyful_review.detail_id=joyful_detail_order.iddetailorder','left');
        $this->builder->where($param);
        return $this->builder->get();
    }

    function checkStatus($paramProduct,$paramCustomer,$paramStatus)
    {
        $this->builder->join('tb_order','tb_detail_order.idorder=tbl_order.idorder');
        $this->builder->where('idproduk',$paramProduct)->where('idcustomer',$paramCustomer)->where('status_order',$paramStatus);
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