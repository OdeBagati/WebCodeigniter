<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlmaster extends Model
{
	protected $table      = 'master_point'; 
    protected $primaryKey = 'id'; 

    protected $builder;
    protected $db;

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('master_point');
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

    function saveData($arrSave)
    {
        if($arrSave['id']>0)
        {
            $this->builder->where('id',$arrSave['id']);
            $this->builder->update($arrSave);
            return $arrSave['id'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }
}