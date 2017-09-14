<?php

namespace App\Controller;

class SetupController extends AppController
{
    public function initialize ()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow();
    }


    public function index()
    {

    }
}