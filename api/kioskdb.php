<?php

$dsn = "mysql:
        host=localhost;
        dbname=rtckioskdb;
        user=root;
    ";

    $conn = new PDO($dsn);

    $action = $_GET["action"] ?? null;
    $search = $_GET["search"] ?? null;
    $status = $_GET["status"] ?? null;
    $id = $_GET["id"] ?? null;

    if ($action == "media"){
        $results= $conn->query("SELECT * FROM `media_file` WHERE `title` LIKE '%$search%'")->fetchAll(PDO::FETCH_ASSOC); 
        echo json_encode($results);
    }

    if ($action == "course"){
        $results = $conn->query("SELECT * FROM `three_year_course` WHERE `courseName` LIKE '%$search%' ORDER BY `courseName` ASC")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "docs"){
        $results = $conn->query("SELECT * FROM `docs` WHERE `fileName` LIKE '%$search%'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "shortterm"){
        $results = $conn->query("SELECT * FROM `short_term_course` WHERE `certification` LIKE '$search'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "Short-Term"){
        $results = $conn->query("SELECT * FROM `short_term_course` WHERE `courseName` LIKE '%$search%' ORDER BY `courseName` ASC")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "CBT_MTP"){
        $results = $conn->query("SELECT * FROM `community_based` WHERE `certification` LIKE '$search' AND `program` LIKE 'Mobile Training Program (MTP)'")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "All_CBT_MTP"){
        $results = $conn->query("SELECT * FROM `community_based` WHERE `courseName` LIKE '%$search%' AND `program` LIKE 'Mobile Training Program (MTP)' ORDER BY `id` ASC")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "CBT_MNTR"){
        $results = $conn->query("SELECT * FROM `community_based` WHERE `courseName` LIKE '%$search%' AND `program` LIKE 'Training Monitoring & No Training Regulation (NTR) Programs'
")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "EditDiploma"){
        $results = $conn->query("UPDATE `three_year_course` SET `status` = '$status' WHERE `three_year_course`.`id` =  $id;
")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "EditST"){
        $results = $conn->query("UPDATE `short_term_course` SET `status` = '$status' WHERE `short_term_course`.`id` = $id;
")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "EditMTP"){
        $results = $conn->query("UPDATE `community_based` SET `status` = '$status' WHERE `community_based`.`id` = $id;
")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
    if ($action == "EditMNTR"){
        $results = $conn->query("UPDATE `community_based` SET `status` = '$status' WHERE `community_based`.`id` = $id;
")->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
    }
