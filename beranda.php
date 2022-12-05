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
    <link rel="stylesheet" href="style/styleBeranda.css">

    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title>Beranda</title>
</head>
<body>
    <?php    
    include("header.php");
    ?>
    <div class="container">
        <div class="daftar-buletin">
            <h1>Daftar Buletin</h1>
        </div>
    
        <div class="kotak-daftar-buletin">
            <ul class="list-buletin">
                <?php
                require("dbconfig-1.php");
                try {
                    $counter = 0;
                    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
                    $sql = "SELECT * FROM buletin ORDER BY 'id'";
                    $stmt = $pdo->query($sql);
                    if($stmt==NULL){
                        echo "<li>Buletin Kosong</li>";
                    }
                    else{
                        foreach($stmt as $row) {
                            $counter +=1;
                            echo "<li><a href='buletin.php?id_buletin=",$row["id"],"'>",
                            $counter,". ",$row["nama_buletin"],"</a></li>";
                        }
                    }
                    $pdo = NULL;
                } catch (PDOException $e) {
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
                ?>
            </ul>
    
            <!-- tombol di bawah ini hanya muncul jika login sebagai admin -->
            <div class="tombol">    
                <?php
                if(isset($_SESSION['username'])){
                    echo "<a href='form-buletin.php' title='Tambah Buletin'><i class='fa-solid fa-plus'></i></a>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>
</body>
</html>