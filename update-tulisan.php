<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php");

require('dbconfig-1.php');
try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $konten = $_POST["konten"];
    
    $sql = "UPDATE tulisan SET judul=?,penulis=?,konten=? WHERE id='$id'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1,$judul,PDO::PARAM_STR);
    $stmt->bindParam(2,$penulis,PDO::PARAM_STR);
    $stmt->bindParam(3,$konten,PDO::PARAM_STR);
    $stmt->execute();
    
    $pdo = NULL;
    header("Location: tulisan.php?id=$id");
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
    header("Location: error-page.php");
}

?>
