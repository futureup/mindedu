<?php

echo '111';
session_start();

$_SESSION['first_name'] = 'nick';
$name = $_SESSION['first_name'];
echo $name;