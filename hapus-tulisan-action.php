<?php
session_start();
$id_buletin=$_SESSION['id_buletin'];
require('dbconfig-1.php');
try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $id = $_GET["id"];
    $sql = " DELETE FROM tulisan WHERE id=$id";
    $stmt = $pdo->query($sql);
    $pdo = NULL;
    header("Location: buletin.php?id_buletin=$id_buletin");
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>