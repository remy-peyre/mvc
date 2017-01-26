<?php

require_once('model/user.php');

function home_action()
{
    //$user = get_user_by_id($_SESSION['user_id']);
    $user = get_user_by_id(1);
    $username = $user['username'];
    require('views/home.php');
}

function about_action()
{
    require('views/about.html');
}

function contact_action()
{
    require('views/contact.html');
}
