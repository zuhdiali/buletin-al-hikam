<?php
session_start();
if(!isset($_SESSION['username']))
    header("Location: beranda.php");

$id = $_GET['id'];

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
    <link rel="stylesheet" href="style/styleFormKonten.css">
    
    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>


    <title>Edit - <?php echo $row['judul'];?></title>
</head>
<body>
    <?php    
    include("header.php");
    ?>
    <div class="container">
        <div class="tombol kembali">
            <a href='buletin.php?id_buletin=<?php echo $_SESSION['id_buletin'];?>' title="Kembali"> <i class="fa-solid fa-backward"></i></a>
        </div>
        <div class="judul-tambah-konten edit">
            <h1>Edit Tulisan</h1>
        </div>
    
        <div class="kotak-form" id="form-konten">
            <form action="update-tulisan.php" method="post" id="form-edit-tulisan">
                <table>
                    <tr>
                        <td>
                            <label for="judul">Judul Tulisan :</label>
                        </td>
                        <td>
                            <input type="text" id="judul" name="judul" value="<?php echo $row['judul'];?>" required>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="penulis">Penulis : </label>
                        </td>
                        <td>
                            <input type="text" name="penulis" id="penulis" value="<?php echo $row['penulis'];?>" required>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label for="konten">Konten :</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <textarea name="konten" id="konten" form="form-edit-tulisan" style="white-space:pre-line;" required><?php echo $row['konten'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" title="Selesai"><i class="fa-solid fa-check"></i></button>
                        </td>
                        <td colspan="3">
                    </tr>
                </table>
                
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            </form>
        </div>
    </div>

    <?php    
    include("footer.php");
    ?>
</body>
</html>