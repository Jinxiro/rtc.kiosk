<?php

$dsn = "mysql:
        host=localhost;
        dbname=rtckioskdb;
        user=root;
    ";

    $conn = new PDO($dsn);

    $action = $_GET["action"] ?? null;
    $search = $_GET["search"] ?? null;

    if ($action == "media"){
        $results= $conn->query("SELECT * FROM `media_file` WHERE `title` LIKE '%$search%'")->fetchAll(PDO::FETCH_ASSOC); 
        echo json_encode($results);
    }

    if ($action == "course"){
        $results = $conn->query("SELECT * FROM `three_year_course` WHERE `courseName` LIKE '%$search%'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "docs"){
        $results = $conn->query("SELECT * FROM `docs` WHERE `fileName` LIKE '%$search%'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }