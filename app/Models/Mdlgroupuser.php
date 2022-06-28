<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlgroupuser extends Model
{
	protected $table      = 'auth_groups_users';

    protected $builder;
    protected $db;

	function __construct()
	{
		$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('auth_groups_users');
	}

	function getAllData()
	{
		$this->builder->join('auth_groups','auth_groups.id=auth_groups_users.group_id');
		$this->builder->join('users','users.id=auth_groups_users.user_id');

		return $this->builder->get();
	}

	function getDataBy($param)
    {
        $this->builder->where($param);
        return $this->builder->get();
    }

    function updateRole($arrSave)
    {
        if($arrSave['user_id']>0)
        {
            $this->builder->where('user_id',$arrSave['user_id']);
            $this->builder->update($arrSave);
            return $arrSave['user_id'];
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