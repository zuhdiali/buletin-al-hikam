<?php
session_start();
if(!isset($_SESSION['username']))
    header("Location: beranda.php");

require('dbconfig-1.php');
try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $id = $_GET["id_buletin"];
    $sql = "SELECT * FROM buletin WHERE id=$id";
    $hasil = $pdo->query($sql);
    $hasil->setFetchMode(PDO::FETCH_ASSOC);
    $row = $hasil->fetch();
    $pdo = NULL;
    $_SESSION['id']=$row['id'];
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
    <link rel="stylesheet" href="style/styleFormBuletin.css">

    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title>Edit - <?php echo $row['nama_buletin'];?></title>
</head>
<body>
    <?php    
    include("header.php");
    ?>
    <div class="container">
        <div class="judul-tambah-buletin">
            <h1>Edit Buletin</h1>
        </div>
    
        <div class="kotak-form">
            <form action="form-edit-buletin-2.php" method="post" id="form-tambah-buletin">
                <table>
                    <tr>
                        <td>
                            <label for="nama_buletin">Nama Buletin</label>
                        </td>
                        <td>
                            <input type="text" id="nama_buletin" name="nama_buletin" value="<?php echo $row['nama_buletin'];?>">
                        </td>
                        <td class="kolom-2">
                            <label for="edisi">Edisi</label>
                        </td>
                        <td>
                            <input type="text" id="edisi" name="edisi" placeholder="Edisi X Tahun XX (Bulan) (Tahun)" value="<?php echo $row['edisi'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1>Redaksi</h1>
                        </td>
                        <td></td>
                        <td class="kolom-2"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="penanggung_jawab">Penanggung Jawab</label>
                        </td>
                        <td>
                            <textarea name="penanggung_jawab" id="penanggung_jawab" rows="5" form="form-tambah-buletin"><?php echo $row['penanggung_jawab'];?></textarea>
                        </td>
                        <td class="kolom-2">
                            <label for="editor">Editor</label>
                        </td>
                        <td>
                            <textarea name="editor" id="editor" form="form-tambah-buletin"><?php echo $row['editor'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pembina">Pembina</label>
                        </td>
                        <td>
                            <textarea name="pembina" id="pembina" form="form-tambah-buletin"><?php echo $row['pembina'];?></textarea>
                        </td>
                        <td class="kolom-2">
                            <label for="layouter">Lay-outer</label>
                        </td>
                        <td>
                            <textarea name="layouter" id="layouter" form="form-tambah-buletin"><?php echo $row['layouter'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pemimpin_redaksi">Pemimpin Redaksi</label>
                        </td>
                        <td>
                            <input type="text" name="pemimpin_redaksi" id="pemimpin_redaksi" value="<?php echo $row['pemimpin_redaksi'];?>">
                        </td>
                        <td class="kolom-2">
                            <label for="reporter">Reporter</label>
                        </td>
                        <td>
                            <textarea name="reporter" id="reporter" form="form-tambah-buletin"><?php echo $row['reporter'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="sekretaris">Sekretaris</label>
                        </td>
                        <td>
                            <input type="text" name="sekretaris" id="sekretaris" value="<?php echo $row['sekretaris'];?>">
                        </td>
                        <td class="kolom-2">
                            <label for="humas">Humas</label>
                        </td>
                        <td>
                            <textarea name="humas" id="humas" form="form-tambah-buletin"><?php echo $row['humas'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="bendahara">Bendahara</label>
                        </td>
                        <td>
                            <input type="text" name="bendahara" id="bendahara" value="<?php echo $row['bendahara'];?>">
                        </td>
                        <td class="kolom-2"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                        </td>
                        <td class="kolom-2"></td>
                        <td></td>
                    </tr>
                </table>
                <div class="tombol edit">
                    <button type="Submit" title="Selanjutnya" class="edit"><i class="fa-solid fa-arrow-right-long"></i></button>
                    <a href="buletin.php?id_buletin=<?php echo $id;?>"><i class="fa-solid fa-x"></i></a>
                </div>
            </form>
        </div>
    </div>

    <?php    
    include("footer.php");
    ?>
</body>
</html>