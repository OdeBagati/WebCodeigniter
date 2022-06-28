<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlanswer extends Model
{
	protected $table      = 'joyful_answer'; 
    protected $primaryKey = 'idanswer'; 

    protected $builder;
    protected $db;

    protected $allowedFields = ['idanswer','idquestion','iduser','reply'];

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('joyful_answer');
    }

    function getAllData()
    {
        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        $this->builder->insert($arrSave);
        return $this->db->insertID();
    }

    function getDataBy($param)
    {
        $this->builder->select('*');
        $this->builder->join('users','users.id=joyful_answer.idadmin');
        $this->builder->where($param);
        return $this->builder->get();
    }
}