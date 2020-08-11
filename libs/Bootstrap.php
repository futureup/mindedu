<?php

class Bootstrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        //print_r($url);

        if (empty($url[0]))
        {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' .$url[0]. '.php';
        if (file_exists($file))
        {
            require $file;
        } 
        else
        {
            //require 'controllers/errors.php';
            //$controller = new Errors();
            //return false;
            // throw new Exception("The file: $file Doesn't exists.");
            $this->error();
        }

        if (class_exists($url[0])) {
            $controller = new $url[0];
            $controller->loadModel($url[0]);
        } else {
            return false;
        }
        


        if (isset($url[2]))
        {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
            
        } 
        elseif (isset($url[1]))
        {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}();
            } else {
                $this->error();
            }            
        } 
        else
        {
            $controller->index();
        }

    }

    function error() {
        require 'controllers/errors.php';
        $controller = new Errors();
        $controller->index();
        return false;
    }
}
