<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlorder extends Model
{
	protected $table      = 'joyful_order';
    protected $primaryKey = 'idorder';

    protected $builder;
    protected $db;

    protected $allowedFields = ['idorder','idcustomer','order_date','qty','total','point','status'];

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('joyful_order');
    }

    function getDataBy($param)
    {
        $this->builder->where($param);
        return $this->builder->get();
    }

   function getAllOrder()
   {
   		$this->builder->select('*');
        $this->builder->join('users','users.id=joyful_order.idcustomer');
        return $this->builder->get();
   }

   function getAllOrderBy($param)
   {
        $this->builder->select('*');
        $this->builder->join('users','users.id=joyful_order.idcustomer');
        // $this->builder->join('payment_method','payment_method.idpayment=joyful_order.idpayment');
        $this->builder->where($param);
        return $this->builder->get();
   } 

    function saveData($arrSave)
    {
        if($arrSave['idorder']>0)
        {
            $this->builder->where('idorder',$arrSave['idorder']);
            $this->builder->update($arrSave);
            return $arrSave['idorder'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function updateStatus($arrSave,$idorder)
    {
        $this->builder->where('idorder',$idorder);
        $this->builder->update($arrSave);
        return $idorder;
    }

    function deleteOrder($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }

    function getUserPoint()
    {
        //SELECT SUM(point) FROM `joyful_order` WHERE idcustomer=12 AND (status='paid' OR status='done')
        //$this->builder->join('joyful_order','joyful_order.idorder=users.id')
        // $builder = $this->db->table('joyful_order');
        // $builder->selectSum('point');
        // $query = $builder->get();

        $this->builder->selectSum('point');

        return $this->builder->get();
        // ->orGroupStart()
        // ->where('joyful_order.status','paid')
        // ->where('joyful_order.status','done')
        // ->groupEnd();
        // $this->builder->and('status','paid');
        // $this->builder->or('status','done');
    }

}