<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlcustomer extends Model
{
	protected $table      = 'joyful_customer';
    protected $primaryKey = 'idcustomer';

    protected $builder;
    protected $db;

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('joyful_customer');
    }

    function saveData($arrSave)
    {
        if($arrSave['idcustomer']>0)
        {
            $this->builder->where('idcustomer',$arrSave['idcustomer']);
            $this->builder->update($arrSave);
            return $arrSave['idcustomer'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }
}