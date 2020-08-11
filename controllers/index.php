<?php

class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
        //echo 'this is index';
        //$this->view->render('index/index');
    }

    function index() {
        $this->view->render('index/index');
    }
}
