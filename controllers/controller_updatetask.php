<?php

if (isset($_GET['id'])) {
    require '../connect_db.php';

    $id = intval($_GET['id']);
    $stmt = $db->prepare("SELECT * FROM todos WHERE id=$id");
    $stmt->execute();
    $todos = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$todos){
        header("Location: ../update.php?mess=error");
    }
}

if(isset($_POST['title'])){
    $title = $_POST['title'];

    if (empty($title)) {
        header("Location: ../update.php?id=$id&mess=error");
    } else {
        $stmt = $db->prepare("UPDATE todos SET title=? WHERE id=$id");
        $res = $stmt->execute([
            $title
        ]);

        if(!$res) {
            header("Location: ../update.php?id=&mess=error");
        }
        header("Location: ../index.php");
    }
}

