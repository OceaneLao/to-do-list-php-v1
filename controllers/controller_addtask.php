<?php

if (isset($_POST['title'])) {
    require '../connect_db.php';

    $title = $_POST['title'];

    if (empty($title)) {
        header("Location: ../index.php?mess=error");
    } else {
        $stmt = $db->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);
        header("Location: ../index.php");
    }
}