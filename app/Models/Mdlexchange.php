<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlexchange extends Model
{
	protected $table      = 'poin_exchange';
	protected $primaryKey = 'idexchange';

    protected $builder;
    protected $db;

    private $user=array();

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('poin_exchange');
    }

    function getDisc($param)
    {
        $this->builder->where('point_needed <=',$param);
        return $this->builder->get();
    }
}