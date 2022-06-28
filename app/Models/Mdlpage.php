<?php
namespace App\Models;

use CodeIgniter\Model;

class Mdlpage extends Model
{
	protected $table      = 'joyful_page';
    protected $primaryKey = 'idpage';

    protected $builder;

    function __construct()
    {
    	$db      = \Config\Database::connect();
		$this->builder = $db->table('joyful_page');
    }

    function getAllData()
    {
    	return $this->builder->get();
    }

    function getDataBy($idpage)
    {
        $this->builder->where('idpage',$idpage);
        return $this->builder->get();
    }

}
