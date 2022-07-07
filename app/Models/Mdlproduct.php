<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlproduct extends Model
{
	protected $table      = 'tb_produk';
    protected $primaryKey = 'idproduk';
    protected $builder;
    protected $db;

    private $admlistprod=array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('tb_produk');
    }

    function getAllData()
    {
    	return $this->builder->get();
    }

    function getDataNCat($param)
    {
        $this->builder->join('tb_kategori','tb_kategori.idkategori=tb_produk.idkategori')->where($param);
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->where($param);
    	return $this->builder->get();
    }

    function getTotalProduct($param)
    {
        $this->builder->selectCount('idproduk')->where($param);
        return $this->builder->get();
    }

    function getChangeItem($param)
    {
        $this->builder->where('harga <=',$param);
        return $this->builder->get();
    }

    function getAllProductCat()
    {
        
        $this->builder->select('*');
        $this->builder->join('tb_kategori','tb_produk.idkategori=tb_kategori.idkategori');
        return $this->builder->get();
    }

    function getAllProdForAdm()
    {
        $dataProd=$this->builder->get();

        foreach ($dataProd->getResult() as $prodItem)
        {
           $this->admlistprod[]=array(
            'idproduk'=>$prodItem->idproduk,
            'nama_produk'=>$prodItem->nama_produk
           );
        }

        return $this->admlistprod;
    }

    function saveData($arrSave)
    {
        if($arrSave['idproduk']>0)
        {
            $this->builder->where('idproduk',$arrSave['idproduk']);
            $this->builder->update($arrSave);
            return $arrSave['idproduk'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function updateData($arrSave,$idproduk)
    {
        $this->builder->where('idproduk',$idproduk);
        $this->builder->update($arrSave);
    }

    function deleteData($param)
    {
        $this->builder->where($param);
        return $this->builder->delete();
    }
}