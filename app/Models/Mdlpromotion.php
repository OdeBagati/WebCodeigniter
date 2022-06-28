<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlpromotion extends Model
{
	protected $table      = 'joyful_promotion'; 
    protected $primaryKey = 'idpromotion'; 

    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('joyful_promotion');
    }

    function getAllData()
    {
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->where($param);
        return $this->builder->get();
    }

    public function filter($param)
    {
        //$this->builder->select('*');
        $this->builder->where('date_start <=',$param)->where('date_end >=',$param);
        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['idpromotion']>0)
        {
            $this->builder->where('idpromotion',$arrSave['idpromotion']);
            $this->builder->update($arrSave);
            return $arrSave['idpromotion'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function updateData($arrSave,$idpromotion)
    {
        $this->builder->where('idpromotion',$idroute);
        $this->builder->update($arrSave);
    }

    function deleteData($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }
}