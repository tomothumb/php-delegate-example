<?php

namespace App\Delegate;

require __DIR__.'/../../vendor/autoload.php';

use App\Delegate\Protocol\MailDelegate;


class Sample2 implements MailDelegate{

    private $bbs;
    public function __construct()
    {
        $this->bbs = new Bbs();
    }

    public function index(){
        return $this->bbs->getAll();
    }

    public function run(){
        $data = [
            'subject'=> 'sample subject',
            'body'=> 'sample body'
        ];

        $this->bbs = new Bbs();
        $this->bbs->setMailDelegate(new self());
        $this->bbs->post($data);
    }

    public function send()
    {
        // メール送信
        print('mail' . "\n");
    }

}

$main = new Sample2();
$main->run();