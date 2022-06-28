<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlquestion extends Model
{
	protected $table      = 'joyful_question'; 
    protected $primaryKey = 'idquestion'; 

    protected $builder;
    protected $db;

    protected $allowedFields = ['idquestion','firstname','lastname','email','date_sent','description'];

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('joyful_question');
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

    function getTotalItem($paramId)
    {
        $this->builder->where($paramId);
        return $this->builder->countAllResults();
    }

    function saveData($arrSave)
    {
        $this->builder->insert($arrSave);
        return $this->db->insertID();
    }

    function updateData($arrSave,$idquestion)
    {
        $this->builder->where('idquestion',$idquestion);
        $this->builder->update($arrSave);
        return $idquestion;
    }
}