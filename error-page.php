<?php
session_start();
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
    <link rel="stylesheet" href="style/success-buletin.css">
    
    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title>Tambah Buletin</title>
</head>
<body>
    <?php    
    include("header.php");
    ?>
    <div class="container">
        <div class="judul-tambah-buletin">
            <h1>Error</h1>
            <br/>
            <p>Terjadi kesalahan, silahkan kembali ke Beranda</p>
            <form action="beranda.php">
                <input type="submit" value="Lihat Daftar Buletin">
            </form>
        </div>
    </div>
    
    <?php    
    include("footer.php");
    ?>
</body>
</html>