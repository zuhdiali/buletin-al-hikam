<?php session_start();
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
    <link rel="stylesheet" href="style/styleCari.css">

    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title>Cari Tulisan</title>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div class="container">
        <div class="header-tulisan">
            <h1>Cari Tulisan</h1>
        </div>
    
        <div class="isi-konten">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input type="text" name="keyword" id="keyword" placeholder="Ketikkan judul di sini...">
            </form>
    
            <div id="tabel_tulisan">
                <!-- div ini jangan dihapus, ada kaitan sama AJAX -->
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>

    <script src="cari-tulisan.js"></script>
</body>
</html>