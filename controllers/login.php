<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();

        //$this->view->render('login/index');
    }

    function index() {
        $this->view->render('login/index');
    }

    function run() {
        $this->model->run();
    }
}
