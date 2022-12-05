<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php");

require('dbconfig-1.php');
try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $judul = $_POST["judul"];
    $tipe_konten = $_POST["tipe-konten"];
    $penulis = $_POST["penulis"];
    $konten = $_POST["konten"];
    $id_buletin = $_SESSION['id_buletin'];

    $sql = "INSERT INTO tulisan (judul,tipe_konten,penulis,konten,id_buletin) 
            VALUES (?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(1,$judul,PDO::PARAM_STR);
    $stmt->bindParam(2,$tipe_konten,PDO::PARAM_STR);
    $stmt->bindParam(3,$penulis,PDO::PARAM_STR);
    $stmt->bindParam(4,$konten,PDO::PARAM_STR);
    $stmt->bindParam(5,$id_buletin,PDO::PARAM_INT);
    
    $stmt->execute();

    $pdo = NULL;
    header("Location: success-tulisan.php");
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
    header("Location: error-page.php");
}

?>
