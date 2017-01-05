<?php

namespace RR\Controllers;


class Contact extends Basic
{
    private $model = '';

    public function __construct()
    {
        //TODO 
        $data['title'] = 'Kontakt';

        print_r($this->loadView('templates/head.php', $data));
        $this->loadView('templates/footer.php');
    }
}