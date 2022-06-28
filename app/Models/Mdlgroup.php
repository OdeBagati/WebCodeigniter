<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlgroup extends Model
{
	protected $table      = 'auth_groups';
	protected $primaryKey = 'id';

    protected $builder;
    protected $db;

    private $groupList=array();

	function __construct()
	{
		$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('auth_groups');
	}

	function getAllData()
	{
		return $this->builder->get();
	}

	function getGroupData()
    {
        $dataGroup=$this->builder->get();

        foreach($dataGroup->getResult() as $itemGroup)
        {
        	$this->groupList[]=array(
        		'id'=>$itemGroup->id,
        		'name'=>$itemGroup->name
        	);
        }

        return $this->groupList;
    }

    function deleteData($param)
    {
    	$this->builder->where($param);
        return $this->builder->delete();
    }
}