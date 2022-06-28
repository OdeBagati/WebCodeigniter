<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlreview extends Model
{
	protected $table      = 'joyful_review'; 
    protected $primaryKey = 'idreview';

    protected $builder;
    protected $db;

    protected $allowedFields = ['idreview','idproduct','username','rating','review_date','description'];

    function __construct()
    {
    	$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('joyful_review');
    }

    function getAllData()
    {
        return $this->builder->get();
    }

    function getDataBy($param)
    {
        $this->builder->join('users','joyful_review.iduser=users.id');
        $this->builder->where($param);
        return $this->builder->get();
    }

    function getDataByDetail($param)
    {
        $this->builder->join('joyful_detail_order','joyful_review.detail_id=joyful_detail_order.iddetailorder');
        $this->builder->where($param);
        return $this->builder->get();
    }

    function getData($paramUser,$paramProduct)
    {
        $this->builder->where('idproduct',$paramProduct);
        return $this->builder->get()->getResultArray();
    }

    function insertReview($arrReview)
    {
        $this->builder->insert($arrReview);
        return $this->db->insertID();
    }

    function updateReview($arrSave,$idreview)
    {
        $this->builder->where('idreview',$idreview);
        $this->builder->update($arrSave);
    }

    function getProductReview()
    {
        $this->builder->select('*');
        $this->builder->join('joyful_product','joyful_review.idproduct=joyful_product.idproduct');
        $this->builder->join('users','joyful_review.iduser=users.id');
        return $this->builder->get();
    }

    function getDetailRating()
    {
        $this->builder->join('joyful_detail_order','joyful_review.detail_id=joyful_detail_order.iddetailorder');
        return $this->builder->get();
    }
}