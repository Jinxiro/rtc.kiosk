<?php

require("./db.php");

$action = $_GET["action"] ?? null;
$search = $_GET["search"] ?? null;


if ($action == "read"){
    $conn = getdb();
    $query = $conn->query("SELECT * FROM `media_file` WHERE `title` LIKE '%$search%'"); 
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
}