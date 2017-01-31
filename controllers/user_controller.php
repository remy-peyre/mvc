<?php

require_once('model/user.php');

function register_action()
{
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if (user_check_register($_POST))
        {
            user_register($_POST);
            header('Location: ?action=home');
            exit(0);
        }
        else {
            $error = "Invalid data";
        }    
    }
    require('views/register.php');
}
