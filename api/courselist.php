<?php

require("./db.php");

$action = $_GET["action"] ?? null;
$search = $_GET["search"] ?? null;


if ($action == "read"){
    $conn = getdb();
    $query = $conn->query("SELECT * FROM `three_year_course` WHERE `courseName` LIKE '%$search%'"); 
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}