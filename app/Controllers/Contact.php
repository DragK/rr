<?php

namespace RR\Controllers;

use \RR\Models;

class Contact extends Basic
{
    private $model;

    public function __construct()
    {
        //TODO

        $this->model = new Models\Basic();
        $data['title'] = 'Kontakt';

        $this->loadView('templates/footer.php');
    }
}