<?php
session_start();

require('dbconfig-1.php');
try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $id = $_GET["id"];
    $sql = "SELECT * FROM tulisan WHERE id=$id";
    $hasil = $pdo->query($sql);
    $hasil->setFetchMode(PDO::FETCH_ASSOC);
    $row = $hasil->fetch();
    $pdo = NULL;
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/styleUmum.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleKonten.css">

    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title><?php echo $row['judul'];?></title>
</head>
<body>
    <?php    
    include("header.php");
    ?>
    <div class="container">
        <div class="tombol kembali">
            <a href='buletin.php?id_buletin=<?php echo $row['id_buletin'];?>' title="kembali"> <i class="fa-solid fa-backward"></i></a>
        </div>
        <div class="header-konten">
            <h1> <?php echo $row['judul'];?></h1>
            <p> oleh <?php echo $row['penulis'];?> </p>
        </div>
    
        <div class="isi-konten">
            <?php echo nl2br($row['konten']);?>
        </div>
    
        <div class="tombol tulisan">
            <?php
            if (isset($_SESSION['username'])){
                echo "<a href='form-edit-tulisan.php?id=",$row['id'],"'><i class='fa-solid fa-pencil'></i></a>";
                echo "<a href='hapus-tulisan.php?id=",$row['id'],"'><i class='fa-solid fa-trash-can'></i></a>";
            }
            ?>
        </div>
    </div>

    <?php    
    include("footer.php");
    ?>
</body>
</html>