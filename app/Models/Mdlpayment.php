<?php
namespace App\Models;
use CodeIgniter\Model;

class Mdlpayment extends Model
{
	protected $table      = 'payment_method';
	protected $primaryKey = 'idpayment';

    protected $builder;
    protected $db;

    private $payment=array();

    function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('payment_method');
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

    function getPaymentName()
    {
        $dataPayment=$this->builder->get();

        foreach($dataPayment->getResult() as $paymentList)
        {
            $this->payment[]=array(
                'idpayment'     =>$paymentList->idpayment,
                'payment_name'  =>$paymentList->payment_name
            );
        }

        return $this->payment;
    }
}