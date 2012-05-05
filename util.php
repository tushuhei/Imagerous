<?php

function connect_db(){
    $dsn = 'mysql:dbname=imagerous;host=localhost';
    $user = 'root';
    $password = '';

    try{
        $db = new PDO($dsn, $user, $password);
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }

    return $db;
}
