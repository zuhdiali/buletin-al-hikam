<?php
session_start();
$id_buletin=$_GET['id_buletin'];
require('dbconfig-1.php');
try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $sql = " DELETE FROM buletin WHERE id=$id_buletin";
    $stmt = $pdo->query($sql);
    $pdo = NULL;
    header("Location: beranda.php");
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>