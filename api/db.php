<?php
function getdb(){
    $host = "localhost";
    $dbname = "rtckioskdb";
    $user = "root";
    $password = "";

    $dsn = "mysql:
        host=$host;
        dbname=$dbname;
        user=$user;
        password=$password;
    ";

    $conn = new PDO($dsn);
    return $conn;
}