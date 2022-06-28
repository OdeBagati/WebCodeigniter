<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlcategory extends Model
{
	protected $table      = 'tb_kategori';
    protected $primaryKey = 'idkategori';
    protected $builder;
    protected $db;

    private $list_item='';
    private $prefix=array();
    private $admlistcat=array();
    private $catId=array();
    private $subCatId=array();

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('tb_kategori');
    }

    function getAllCat()
    {
        return $this->builder->get();
    }

    function getDataBy($param)
    {
    	$this->builder->where($param);
    	return $this->builder->get();
    }

    function getCatBy($param)
    {
        $this->builder->whereIn('idkategori',$param);
        return $this->builder->get();
    }

    function getMenuCat($child=false,$parent=0)
    {
        if($child==false)
        {
            $param=array('parent'=>$parent);
            $this->builder->where($param);
            $dataCat=$this->builder->get();

            foreach ($dataCat->getResult() as $catItem) 
            {

                $paramCheck=array('parent'=>$catItem->idkategori);
                $this->builder->where($paramCheck);
                $totalRecCheck=$this->builder->countAllResults();

                if($totalRecCheck>0)
                {
                    $this->list_item.='<li class="nav-item dropdown ms-1 me-1">'.anchor('#',$catItem->nama_kategori,array('class'=>'nav-link dropdown-toggle','id'=>'nnavbarDropdown','role'=>'button','data-bs-toggle'=>'dropdown','aria-expanded'=>'false'));
                }
                else
                {
                    $this->list_item.='<li class="nav-item ms-1 me-1">'.anchor($catItem->url_kategori,$catItem->nama_kategori,array('class'=>'nav-link','aria-current'=>'page'));
                }
                $this->getMenuCat(true,$catItem->idkategori);
                $this->list_item.='</li>';
            }
        }
        else
        {
            $paramSub=array('parent'=>$parent);
            $this->builder->where($paramSub);
            $totalRec=$this->builder->countAllResults();

            if($totalRec>0)
            {
                $this->list_item.='<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                $paramSub=array('parent'=>$parent);
                $this->builder->where($paramSub);
                $dataCatSub=$this->builder->get();

                foreach ($dataCatSub->getResult() as $catItemSub) {
                   $this->list_item.='<li>'.anchor($catItemSub->url_kategori,$catItemSub->nama_kategori,array('class'=>'dropdown-item'));

                   $this->getMenuCat(true,$catItemSub->idkategori);
                   $this->list_item.='</li>';
                }
                $this->list_item.='</ul>';
            }
        }
        return $this->list_item;
    }

    function getAllCatforAdm($child=false,$parent=0)
    {

        if($child==false) 
        {
            $param=array('parent'=>$parent);
            $this->builder->where($param);
            $dataCat=$this->builder->get();

            foreach ($dataCat->getResult() as $catItem) {
               $this->admlistcat[]=array(
                'idkategori'=>$catItem->idkategori,
                'nama_kategori'=>$catItem->nama_kategori
               );

               $this->getAllCatforAdm(true,$catItem->idkategori);
               array_shift($this->prefix);
            }
        }
        else
        {
            array_push($this->prefix,'-- ');  
            $paramSub=array('parent'=>$parent);
            $this->builder->where($paramSub);
            $totalRec=$this->builder->countAllResults();

            if($totalRec>0)
            {
                $paramSub=array('parent'=>$parent);
                $this->builder->where($paramSub);
                $dataCatSub=$this->builder->get();

                foreach ($dataCatSub->getResult() as $catItemSub) {
                    $this->admlistcat[]=array(
                        'idkategori'=>$catItemSub->idkategori,
                        'nama_kategori'=>implode('',$this->prefix).$catItemSub->nama_kategori
                       );

                    $this->getAllCatforAdm(true,$catItemSub->idkategori);
                    array_shift($this->prefix);
                }
            }
        }
        return $this->admlistcat;
    }

    function getParentName()
    {
        $query  = $this->db->query
        ('
            SELECT cat.idkategori , cat.nama_kategori , cat.deskripsi , category.nama_kategori as parent FROM tb_kategori as cat
            LEFT join tb_kategori as category on category.idkategori = cat.parent'
        );
        
        return $query->getResult('array');
    }

    function saveData($arrSave)
    {
        if($arrSave['idkategori']>0)
        {
            $this->builder->where('idkategori',$arrSave['idkategori']);
            $this->builder->update($arrSave);
            return $arrSave['idkategori'];
        }
        else
        {
            $this->builder->insert($arrSave);
            return $this->db->insertID();
        }
    }

    function updateData($arrSave,$idkategori)
    {
        $this->builder->where('idkategori',$idkategori);
        $this->builder->update($arrSave);
    }

    function deleteData($param)
    {
        $this->builder->where($param);
        $this->builder->delete();
    }

}