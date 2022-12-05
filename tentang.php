<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/styleUmum.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleTentang.css">

    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>
    <title>Selamat Datang</title>
</head>
<body>
    <?php    
    include("header.php");
    ?>
    <div class="container">
        <h1 class="style-center"> Tentang Halaman Web Ini</h1>
        <div class="kotak-grid">
            <div class="pembuat">
                <div class="kiri"></div>
                <div class="gambar">
                    <img src="img/zuhdi_cropped.png" alt="Zuhdi Ali Hisyam">
                    <p> Halaman web ini dibangun oleh Zuhdi Ali Hisyam untuk memenuhi tugas mata kuliah Pemrograman Berbasis Web di Polstat STIS Program Studi D-IV T.A. 2021/2022.</p>
                    <br />
                    <p> Jejaring sosial: </p>
                    <div class="sosmed">
                        <div class="kosong"></div>
                        <div class="kosong"></div>
                        <div class="email">
                            <a href="mailto:zuhdialihisyam@gmail.com" target="_blank"><i class="fa-solid fa-envelope link"></i></a>
                        </div>
                        <div class="instagram">
                            <a href="https://www.instagram.com/zuhdiali_/" target="_blank"><i class="fa-brands fa-instagram link"></i></a>
                        </div>
                        <div class="youtube">
                            <a href="https://www.youtube.com/channel/UC9cXHSwlniev7jqktNbXK6A" target="_blank"><i class="fa-brands fa-youtube link"></i></a>
                        </div>
                        <div class="facebook">
                            <a href="https://www.facebook.com/profile.php?id=100008071667807" target="_blank"><i class="fa-brands fa-facebook link"></i></a>
                        </div>
                        <div class="kosong"></div>
                        <div class="kosong"></div>
                    </div>
                </div>
                
                <br />
                <div class="kanan"></div>
            </div>
            <div class="thanks-to">
                <h1>Terima kasih kepada:</h1>
                <p>1. Allah SWT atas segala karunia-Nya.</p>
                <p>2. Politeknik Statistika STIS.</p>
                <p>3. Bu Lya Hulliyyatus Suadaa selaku dosen mata kuliah Pemrograman Berbasis Web.</p>
                <p>4. Teman-teman dari Kelompok Kajian Islam.</p>
            </div>
        </div>
    </div>
    
    <?php
        include("footer.php");
    ?>
</body>
</html>