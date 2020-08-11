<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
    
    <title>Document</title>
    <?php
        if (isset($this->js)) 
        {
            foreach ($this->js as $js) 
            {
                echo '<script src="'.URL. 'views/'.$js.'"></script>';
            }
        }
    ?>
</head>
<body>
<?php Session::init(); ?>
    <div class="header">
        <a href="<?php echo URL; ?>index">Home</a>
        <a href="<?php echo URL; ?>help">Help</a>
        <?php if (Session::get('loggedIn') == true): ?>
            <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
        <?php else: ?>
            <a href="<?php echo URL; ?>login">Login</a>
        <?php endif; ?>
    </div>

    <div class="content">
        <button id="submitbtn">Submit</button>
    
