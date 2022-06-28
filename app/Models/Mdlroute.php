<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlroute extends Model
{
	protected $table      = 'tb_slug'; // menentukan nama tabel jika diakses dari model ini
    protected $primaryKey = 'idslug'; // id produk yang memiliki settingan primary key

    protected $builder;
    protected $db;

    private $filterList=array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('tb_slug');
    }

    function getAllData()
    {
        return $this->builder->get();
    }

    function getDataBy($paramRoute)
    {
        $this->builder->where($paramRoute);
        return $this->builder->get();
    }

    function getTotalItem($paramRoute)
    {
        $this->builder->where($paramRoute);
        return $this->builder->countAllResults();
    }


    function saveData($arrSave)
    {
        if($arrSave['idslug']>0)
        {
            $this->builder->where('idslug',$arrSave['idslug']);
            $this->builder->update($arrSave);
            return $arrSave['idslug'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function updateData($arrSave,$idslug)
    {
        $this->builder->where('idslug',$idslug);
        $this->builder->update($arrSave);
        return $idslug;
    }

    function deleteData($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }
}