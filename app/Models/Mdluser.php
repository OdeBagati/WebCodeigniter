<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdluser extends Model
{
	protected $table      = 'users';
	protected $primaryKey = 'id';

    protected $builder;
    protected $db;

    private $user=array();

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
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

    function getUsername()
    {
        $dataUser=$this->builder->get();

        foreach($dataUser->getResult() as $userList)
        {
            $this->user[]=array(
                'id'=>$userList->id,
                'username'=>$userList->username
            );
        }

        return $this->user;
    }

    function getGender()
    {
        $dataUser=$this->builder->get();

        foreach($dataUser->getResult() as $userList)
        {
            $this->user[]=array(
                'id'=>$userList->id,
                'gender'=>$userList->gender
            );
        }

        return $this->user;
    }

    function getUserPoint($paramPoint)
    {
        //$this->builder->join('joyful_order','joyful_order.idorder=users.id')
        $this->builder->selectSum('point')
        ->where('idcustomer',$paramPoint);
        // ->orGroupStart()
        // ->where('joyful_order.status','paid')
        // ->where('joyful_order.status','done')
        // ->groupEnd();
        // $this->builder->and('status','paid');
        // $this->builder->or('status','done');

        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['id']>0)
        {
            $this->builder->where('id',$arrSave['id']);
            $this->builder->update($arrSave);
            return $arrSave['id'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function updateData($iduser,$arrSave)
    {
        $this->builder->where('id',$iduser);
        $this->builder->update($arrSave);
        return $iduser;
    }
}