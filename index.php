<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/styleUmum.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleIndex.css">

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

        <div class="atas">
            <div class="selamat-datang">
                <div class="tulisan-selamat">
                    <h1>Selamat Datang</h1>
                    <p>Selamat datang di halaman web Buletin Al-Hikam. Buletin Al-Hikam merupakan buletin yang dibuat oleh Kelompok Kajian Islam (KKI) di SMAN 1 Wonosobo.</p>
                    
                </div>
                <div class="bg-beranda">
                    
                </div>
            </div>
            <div class="tombol login">
                <a href="login.php" class="masuk" title="Ke Halaman Masuk">Masuk sebagai admin</a>
                <a href="beranda.php" class="lanjut" title="Ke Beranda">Lanjutkan tanpa masuk</a>
            </div>
        </div>
        <div class="tengah">
            <div class="logo-smansa">
                <img src="img/al_hikam_logo.png" alt="Logo Al-Hikam">
            </div>
            <div class="logo-kki">
                <img src="img/kki-logo.png" alt="Logo KKI">
            </div>
            <div class="deskripsi-al-hikam">
                <h2> Apa Itu Al-Hikam?</h2>
                <p> Buletin Al-Hikam merupakan sarana dakwah organisasi Kelompok Kajian Islam dalam bentuk tulisan. <br />
                    Buletin yang murni ditulis oleh para siswa ini tidak hanya didistribusikan di sekitar SMAN 1 Wonosobo saja, tetapi juga didistribusikan ke sekolah-sekolah terdekat lainnya, baik itu SMK, SMA, SMP, MA, maupun MTs. <br /> 
                    Selain bisa meningkatkan kemampuan menulis para siswa, diharapkan buletin ini juga memberi manfaat bagi khalayak umum.
                </p>
            </div>
        </div>

        <div class="bawah">
            <div class="tulisan-al-hikam">
                <img src="img/al-hikam.png" alt="Al-Hikam">
            </div>
        
            <h2> Selebihnya mengenai Al-Hikam...</h2>
            <br />
            <p> Dalam setiap penerbitan buletin, akan dibentuk sebuah tim mulai dari pemimpin redaksi, sekretaris, bendahara, reporter, editor, layouter, hingga humas. <br /></p>
            <p> Konten dalam buletin terdiri dari telaah utama, profil, akhlak, info lepas, Qur'an dan/atau Hadits, cerita pendek atau cerita bersambung, tafakur, tips dan trik, keikhwanan atau keakhwatan, puisi, doa, dan KKI kita. <br /></p>
            <br />
            <div class="tombol jelajahi">
                <a href="beranda.php"> Jelajahi Buletin </a>
            </div>
        </div>

    </div>
    
    <?php
        include("footer.php");
    ?>
</body>
</html>