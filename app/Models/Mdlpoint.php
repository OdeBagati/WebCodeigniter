<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlpoint extends Model
{
	protected $table      = 'joyful_point'; 
    protected $primaryKey = 'idpoint'; 

    protected $builder;
    protected $db;

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('joyful_point');
    }

    function saveData($arrSave)
    {
        $this->builder->insert($arrSave);
        return $this->db->insertID();
    }

    function countGetPoint($param)
    {
        $this->builder->where($param)->where('status','got');
        $this->builder->selectSum('point');

        return $this->builder->get();
    }

    function countUsedPoint($param)
    {
        $this->builder->where($param)->where('status','used');
        $this->builder->selectSum('point');

        return $this->builder->get();
    }

    function countPoint($iduser)
    {
        $this->builder->selectSum('point');
        $this->builder->where($iduser);

        return $this->builder->get();
    }
}