<?php
namespace App\Controllers;

class Contbackend extends BaseController
{
    public function index()
    {
        $data['page']   = 'adm_dashboard';

        return view('back_end',$data);
    }

    function sendMail()
    {
        $msg = 'Jasa joki TA only 2Jt';
        $email = \Config\Services::email();
        $config['mailType'] = 'html';
        $email->initialize($config);

        $email->setFrom('no-reply@jokita.com', 'Joki TA');
        $email->setTo('putuaryawidiastawa@gmail.com');
        //$email->setCC('another@another-example.com');
        //$email->setBCC('them@their-example.com');

        $email->setSubject('Joki TA');
        $email->setMessage($msg);

        $email->send();
    }
}