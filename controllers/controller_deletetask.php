<?php

if (isset($_GET['id'])) {
    require '../connect_db.php';

    $id = $_GET['id'];
    $stmt = $db->prepare("DELETE FROM todos WHERE id=".$id);
    $res = $stmt->execute();
    header("Location: ../index.php");
}
