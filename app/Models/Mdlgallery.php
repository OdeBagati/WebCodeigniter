<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlgallery extends Model
{
	protected $table      = 'joyful_gallery';
    protected $primaryKey = 'idgallery';

    protected $builder;

    function __construct()
    {
    	$db               = \Config\Database::connect();
		$this->builder    = $db->table('joyful_gallery');
    }

    function getAllData()
    {
    	$this->builder->join('joyful_product','joyful_product.idproduct=joyful_gallery.idproduct');
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->where($param);
        return $this->builder->get();
    }

    function getGalByProduct($idproduct)
    {
        $this->builder->where('idproduct',$idproduct);
        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['idgallery']>0)
        {
            $this->builder->where('idgallery',$arrSave['idgallery']);
            $this->builder->update($arrSave);
            return $arrSave['idgallery'];
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
