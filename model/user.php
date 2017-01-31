<?php

require_once('model/db.php');

function get_user_by_id($id)
{
    $id = (int)$id;
    $data = find_one("SELECT * FROM users WHERE id = ".$id);
    return $data;
}

function get_user_by_username($username)
{
    $data = find_one_secure("SELECT * FROM users WHERE username = :username",
                            ['username' => $username]);
    return $data;
}

function user_check_register($data)
{
    if (empty($data['username']) OR empty($data['email']) OR empty($data['password']))
        return false;
    $data = get_user_by_username($data['username']);
    if ($data !== false)
        return false;
    // TODO : Check valid email
    return true;
}

function user_register($data)
{
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    db_insert('users', $data);
}