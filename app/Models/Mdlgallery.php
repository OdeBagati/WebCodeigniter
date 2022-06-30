<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlgallery extends Model
{
	protected $table      = 'tb_galeri';
    protected $primaryKey = 'idgaleri';

    protected $builder;

    function __construct()
    {
    	$db               = \Config\Database::connect();
		$this->builder    = $db->table('tb_galeri');
    }

    function getAllData()
    {
    	$this->builder->join('tb_produk','tb_produk.idproduk=tb_galeri.idproduk');
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->where($param);
        return $this->builder->get();
    }

    function getGalByProduct($idproduk)
    {
        $this->builder->where('idproduk',$idproduk);
        return $this->builder->get();
    }

    function saveData($arrSave)
    {
        if($arrSave['idgaleri']>0)
        {
            $this->builder->where('idgaleri',$arrSave['idgaleri']);
            $this->builder->update($arrSave);
            return $arrSave['idgaleri'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->builder->insert($arrSave);
        }
    }

    function deleteData($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }

}
