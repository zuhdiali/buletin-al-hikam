<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php");
$_SESSION['id_buletin'] = $_GET['id_buletin'];

require("dbconfig-1.php");

try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $id_buletin = $_GET["id_buletin"];
    $sql = "SELECT `tipe_konten` FROM `tulisan` WHERE `id_buletin`=$id_buletin";
    $stmt = $pdo->query($sql);
    $hasil = $stmt -> fetchAll(PDO::FETCH_COLUMN, 0);
    $pdo = NULL;
    
}
    catch (PDOException $e) {
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

    <title>Tambah Tulisan</title>
</head>
<body>
    <?php    
    include("header.php");
    ?>

    <div class="container">
        <div class="tombol kembali">
            <a href='buletin.php?id_buletin=<?php echo $_SESSION['id_buletin'];?>' title="Kembali"> <i class="fa-solid fa-backward"></i></a>
        </div>
        <div class="judul-tambah-konten">
            <h1>Tambah Tulisan</h1>
        </div>
    
        <div class="kotak-form" id="form-konten">
        
            <form action="upload-tulisan.php" method="post" id="form-tambah-konten">
                <table>
                    <tr>
                        <td>
                            <label for="judul">Judul Tulisan :</label>
                        </td>
                        <td>
                            <input type="text" id="judul" name="judul" required>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipe-konten">Tipe Tulisan :</label>
                        </td>
                        <td>
                            <select name="tipe-konten" id="tipe-konten" required>
                                <option value="">(Pilih tipe tulisan)</option>
                                <?php
                                    if(!in_array("1-telaah-utama",$hasil)){
                                        echo "<option value=\"1-telaah-utama\">Telaah Utama</option>";
                                    }
                                    if(!in_array("2-profil",$hasil)){
                                        echo "<option value=\"2-profil\">Profil</option>";
                                    }
                                    if(!in_array("3-akhlak",$hasil)){
                                        echo "<option value=\"3-akhlak\">Akhlak</option>";
                                    }
                                    if(!in_array("4-info-lepas",$hasil)){
                                        echo "<option value=\"4-info-lepas\">Info Lepas</option>";
                                    }
                                    if((!in_array("5-cerpen",$hasil))&(!in_array("5-cerbung",$hasil))){
                                        echo "<option value=\"5-cerpen\">Cerpen</option>";
                                        echo "<option value=\"5-cerbung\">Cerbung</option>";
                                    }
                                    if(!in_array("6-tafakur",$hasil)){
                                        echo "<option value=\"6-tafakur\">Tafakur</option>";
                                    }
                                    if(!in_array("7-quran-hadits",$hasil)){
                                        echo "<option value=\"7-quran-hadits\">Qur'an & Hadits</option>";
                                    }
                                    if(!in_array("8-tarikh",$hasil)){
                                        echo "<option value=\"8-tarikh\">Tarikh</option>";
                                    }
                                    if((!in_array("9-keikhwanan",$hasil))&(!in_array("9-keakhwatan",$hasil))){
                                        echo "<option value=\"9-keikhwanan\">Keikhwanan</option>";
                                        echo "<option value=\"9-keakhwatan\">Keakhwatan</option>";
                                    }
                                    if(!in_array("10-puisi",$hasil)){
                                        echo "<option value=\"10-puisi\">Puisi</option>";
                                    }
                                    if(!in_array("11-doa",$hasil)){
                                        echo "<option value=\"11-doa\">Doa</option>";
                                    }
                                    if(!in_array("12-tips-and-trick",$hasil)){
                                        echo "<option value=\"12-tips-and-trick\">Tips & Trick</option>";
                                    }
                                    if(!in_array("13-kki-kita",$hasil)){
                                        echo "<option value=\"13-kki-kita\">KKI Kita</option>";
                                    }
                                    if(!in_array("14-lainnya",$hasil)){
                                        echo "<option value=\"14-lainnya\">Lainnya</option>";
                                    }
                                ?>
                                
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="penulis">Penulis : </label>
                        </td>
                        <td>
                            <input type="text" name="penulis" id="penulis" required>
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
                            <textarea name="konten" id="konten" form="form-tambah-konten" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit"><i class="fa-solid fa-plus"></i></button>
                        </td>
                        <td colspan="3"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <?php    
    include("footer.php");
    ?>
</body>
</html>