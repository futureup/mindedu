<?php

class Login_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        //echo '1111';
        //echo md5('nick');
    }

    public function run()
    {
        $sth = $this->db->prepare("select id from users 
        where login = :login and password = :password");

        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => MD5($_POST['password'])
        ));

        $data = $sth->fetchAll();
        //echo $sth->rowCount();
        $count = $sth->rowCount();
        //print_r($data);

        if ($count > 0) {
            //Logged in
            Session::init();
            Session::set('loggedIn', true);
            header('location: ' .URL. 'dashboard');
        }
        else
        {
            header('location: ' .URL. 'login');
        }
    }
}
