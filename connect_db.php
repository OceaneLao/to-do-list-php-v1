<?php

const DB_HOST = "localhost";
const DB_NAME = "to_do_list";
const DB_USER = "root";
const DB_PASS = "";

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
