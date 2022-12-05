<?php session_start();?>

<?php
    require('function-tulisan.php');
    require('dbconfig-2.php');
    $id_buletin = $_GET['id_buletin'];
    $result = $db->query("SELECT * FROM buletin WHERE id='$id_buletin'"); 
    $row = $result->fetch_assoc();
    $id = $row['id'];
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
    <link rel="stylesheet" href="style/styleBuletin.css">
    
    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title><?php echo $row['nama_buletin']; ?></title>
</head>
<body>
    <?php
    include("header.php");
    ?>

    

    <div class="header-buletin">
        <div class="sampul">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="Sampul Buletin" title="Sampul Buletin">
        </div>
        <div class="deskripsi">
            <h1 id="judul-buletin"><?php echo $row['nama_buletin']; ?></h1>
            <p id="edisi"><?php echo $row['edisi']; ?></p>
        </div>
    </div>

    <div class="kotak-deskripsi">
        <table>
            <tr>
                <td colspan="4">
                    <h1>Redaksi</h1>
                </td>
            </tr>
            <tr>
                <td class="identifier">
                    Penanggung Jawab:
                </td>
                <td>
                    <p>
                        <?php echo $row['penanggung_jawab']; ?>
                    </p>
                </td>
                <td class="kolom-2 identifier">
                    Editor:
                </td>
                <td>
                    <p>
                        <?php echo nl2br($row['editor']); ?> 
                    </p>
                </td>
            </tr>
            <tr>
                <td class="identifier">
                    Pembina:
                </td>
                <td>
                    <p>
                        <?php echo nl2br($row['pembina']); ?>
                    </p>
                </td>
                <td class="kolom-2 identifier">
                    Lay-outer
                </td>
                <td>
                    <p>
                        <?php echo nl2br($row['layouter']); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="identifier">
                    Pemimpin Redaksi:
                </td>
                <td>
                    <p>
                        <?php echo $row['pemimpin_redaksi']; ?>
                    </p>
                </td>
                <td class="kolom-2 identifier">
                    Reporter:
                </td>
                <td>
                    <p>
                        <?php echo nl2br($row['reporter']); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="identifier">
                    Sekretaris:
                </td>
                <td>
                    <p>
                        <?php echo $row['sekretaris']; ?>
                    </p>
                </td>
                <td class="kolom-2 identifier">
                    Humas:
                </td>
                <td>
                    <p>
                        <?php echo nl2br($row['humas']); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="identifier">
                    Bendahara:
                </td>
                <td>
                    <p>
                        <?php echo $row['bendahara']; ?>
                    </p>
                </td>
                <td class="kolom-2 identifier"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">
                    <h1>Konten Buletin</h1>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="konten-buletin">
        <ul>
        <?php
            try {
                $sql = "SELECT * FROM tulisan WHERE id_buletin=$id_buletin ORDER BY tipe_konten";
                $hasil = $db->query($sql);
                $_SESSION['id_buletin'] = $id_buletin;
                if($hasil->num_rows <1){
                    echo "<li><a href=''>Tulisan Kosong</a></li>";
                }
                else{
                    while($row = $hasil->fetch_assoc()){
                        echo "<li><a href='tulisan.php?id=",$row["id"],"'>",$tipe_konten($row["tipe_konten"]),$row['judul'],"</a></li>";
                    }
                }
            } catch (PDOException $e) {
                exit("PDO Error: ".$e->getMessage()."<br>");
            }
        ?>
        </ul>
    </div>

    <div class="tombol">    
        <?php
            if(isset($_SESSION['username'])){
                echo "<a href='form-tulisan.php?id_buletin=$id_buletin' title='Tambah Konten'><i class='fa-solid fa-plus'></i></a>";
                echo "<a href='form-edit-buletin.php?id_buletin=$id_buletin' title='Edit Buletin'><i class='fa-solid fa-pencil'></i></a>";
                echo "<a href='hapus-buletin.php?id_buletin=$id_buletin' title='Hapus Buletin'><i class='fa-solid fa-trash-can'></i></a>";
            }

            // menutup koneksi database
            $db = NULL;
        ?>
    </div>

    <?php
    include("footer.php");
    ?>
</body>
</html>