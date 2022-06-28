<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlpointexchange extends Model
{
	protected $table      = 'poin_exchange'; 
    protected $primaryKey = 'idexchange'; 

    protected $builder;
    protected $db;

    protected $allowedFields = ['idexchange','title_exchange','discount','point_needed'];

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('poin_exchange');
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
        if($arrSave['idexchange']>0)
        {
            $this->builder->where('idexchange',$arrSave['idexchange']);
            $this->builder->update($arrSave);
            return $arrSave['idexchange'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function deleteData($param)
        {
            $this->builder->where($param);
            return $this->builder->delete();
        }
}