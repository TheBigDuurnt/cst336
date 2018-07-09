<?php

function getDatabaseConnection($dbname = 'ottermart'){
    
    $host = 'localhost'; //cloud9
    //$dbname ='tcp';
    $username = 'root';
    $password = '';
    
    //creates db connectoin
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //displays error when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}