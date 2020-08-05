<?php

class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $_GET['url']);
        //print_r($url);

        if (empty($url[0]))
        {
            require 'controllers/index.php';
            $controller = new Index();
            return false;
        }

        $file = 'controllers/' .$url[0]. '.php';
        if (file_exists($file))
        {
            require $file;
        } 
        else
        {
            require 'controllers/errors.php';
            $controller = new Errors();
            return false;
            // throw new Exception("The file: $file Doesn't exists.");
        }

        $controller = new $url[0];


        if (isset($url[2]))
        {
            $controller->{$url[1]}($url[2]);
        } 
        else
        {
            $controller->{$url[1]}();
        }
    }
}
