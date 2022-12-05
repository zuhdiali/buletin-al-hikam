<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php");

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
<html lang="en">
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
        <div class="header-konten hapus">
            <h1> Hapus Tulisan </h1>
        </div>
    
        <div class="isi-konten">
            <p> Apakah Anda yakin ingin menghapus tulisan '<?php echo $row['judul'];?>?'</p>
            <div class="tombol hapus">
                <?php
                    echo "<a href='hapus-tulisan-action.php?id=",$row['id'],"' title='Ya'><i class='fa-solid fa-check'></i></a>";
                    echo "<a href='tulisan.php?id=",$row['id'],"' title='Tidak'><i class='fa-solid fa-x'></i></a>";
                ?>
            </div>
        </div>
    </div>


    <?php    
    include("footer.php");
    ?>
</body>
</html>