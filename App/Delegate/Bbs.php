<?php

namespace App\Delegate;

use App\Delegate\Protocol\MailDelegate;
use App\Delegate\Protocol\NotificationDelegate;

class Bbs
{
    protected $posts = [];
    protected $mailDelegate;
    protected $notificationDelegate;

    function setMailDelegate(MailDelegate $delegate)
    {
        $this->mailDelegate = $delegate;
    }

    function setNotificationDelegate(NotificationDelegate $delegate)
    {
        $this->notificationDelegate = $delegate;
    }

    function getAll()
    {
        return $this->posts;
    }

    function post($data)
    {
        print('START' . "\n");

        $this->save($data);

        if (isset($this->mailDelegate)) {
            $this->mailDelegate->send();
        }
        if (isset($this->notificationDelegate)) {
            $this->notificationDelegate->notify();
        }

        print('END' . "\n");

    }

    function save($data)
    {
        return $this->posts[] = $data;
        // save
        print('save' . "\n");
    }
}

