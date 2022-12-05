<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style/styleUmum.css">
    <link rel="stylesheet" href="style/styleHeader.css">
    <link rel="stylesheet" href="style/styleFooter.css">
    <link rel="stylesheet" href="style/styleLogin.css">

    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title>Masuk</title></head>
<body>
    <?php    
    include("header.php");
    ?>

    <div class="masuk">
        <div class="tulisan-masuk">
            <h1>Masuk sebagai admin</h1>
            <form action="#" method="post">
                <table>
                    <tr>
                        <td colspan="2" class="pesan-error">
                            <?php 
                            if(isset($_POST["username"])&isset($_POST["password"])){
                                require('dbconfig-1.php');
                                try {
                                    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
                                    $username = $_POST["username"];
                                    $password = $_POST["password"];
                                    $sql = "SELECT * FROM admin";
                                    $stmt = $pdo->query($sql);
                                    $pdo = NULL;
                                    foreach($stmt as $row){
                                        if (($username==$row['username']) & ($row["password"]==$password)){
                                            $_SESSION["username"]=$_POST["username"];
                                            header("Location: beranda.php");
                                        }
                                    }
                                    echo " Nama Pengguna atau Kata Sandi tidak benar. ";
                                } catch (PDOException $e) {
                                    exit("PDO Error: ".$e->getMessage()."<br>");
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="username">Nama Pengguna</label>
                        </td>
                        <td>
                            <input type="text" class="username" id="username" name="username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Kata Sandi</label>
                        </td>
                        <td>
                            <input type="password" class="password" id="password" name="password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Masuk">
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
            <div class="tombol login">    
                <a href="beranda.php" class="lanjut" title="Ke Beranda">Lanjutkan tanpa masuk</a>
            </div>
        </div>
        <div class="bg-beranda">
            <img src="img/beranda.png" alt="bg beranda">
        </div>
    </div>

    
    <?php    
    include("footer.php");
    ?>
</body>
</html>