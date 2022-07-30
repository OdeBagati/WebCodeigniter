<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlorder extends Model
{
	protected $table      = 'tb_order';
    protected $primaryKey = 'idorder';

    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('tb_order');
    }

    function getDataBy($param)
    {
        $this->builder->where($param);
        return $this->builder->get();
    }

   function getAllOrder()
   {
   		$this->builder->select('*');
        $this->builder->join('users','users.id=tb_order.idcustomer');
        return $this->builder->get();
   }

   function getAllOrderBy($param)
   {
        $this->builder->select('*');
        $this->builder->join('users','users.id=tb_order.idcustomer');
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
}