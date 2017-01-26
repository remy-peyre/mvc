<?php

$dbh = null;

function connect_to_db()
{
    global $db_config;
    $dsn = 'mysql:dbname='.$db_config['name'].';host='.$db_config['host'];
    $user = $db_config['user'];
    $password = $db_config['pass'];
    
    try {
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    
    return $dbh;
}

function get_dbh()
{
    global $dbh;
    if ($dbh === null)
        $dbh = connect_to_db();
    return $dbh;
}

function find_one($query)
{
    $dbh = get_dbh();
    $data = $dbh->query($query, PDO::FETCH_ASSOC);
    $result = $data->fetch();
    return $result;
}

function find_all($query)
{
    $dbh = get_dbh();
    $data = $dbh->query($query, PDO::FETCH_ASSOC);
    $result = $data->fetchAll();
    return $result;
}

