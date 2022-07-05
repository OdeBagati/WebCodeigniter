<?php
namespace App\Models;

use CodeIgniter\Model;

class Mdlpage extends Model
{
	protected $table      = 'tb_halaman';
    protected $primaryKey = 'idhalaman';

    protected $builder;

    function __construct()
    {
    	$db      = \Config\Database::connect();
		$this->builder = $db->table('tb_halaman');
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

}
