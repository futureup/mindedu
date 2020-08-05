<?php

class Help extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo 'this is help';
    }

    public function other($arg = false)
    {
        echo 'you are inside other';
        echo 'Optional: ' .$arg;

        require 'models/help_model.php';
        $model = new Help_Model();
    }
}
