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

function getXpath($url) {
    libxml_use_internal_errors(true);
    $content = @file_get_contents($url);
    $doc = new DOMDocument();
    $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
    libxml_clear_errors();
    $xpath = new DOMXPath($doc);
    return $xpath;
}
