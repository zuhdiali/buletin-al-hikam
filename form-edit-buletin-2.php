<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php");
    
if(isset($_REQUEST['nama_buletin']))
    $_SESSION['nama_buletin'] = $_REQUEST['nama_buletin'];
if(isset($_REQUEST['edisi']))
    $_SESSION['edisi'] = $_REQUEST['edisi'];
if(isset($_REQUEST['penanggung_jawab']))
    $_SESSION['penanggung_jawab'] = $_REQUEST['penanggung_jawab'];
if(isset($_REQUEST['editor']))
    $_SESSION['editor'] = $_REQUEST['editor'];
if(isset($_REQUEST['pembina']))
    $_SESSION['pembina'] = $_REQUEST['pembina'];
if(isset($_REQUEST['layouter']))
    $_SESSION['layouter'] = $_REQUEST['layouter'];
if(isset($_REQUEST['pemimpin_redaksi']))
    $_SESSION['pemimpin_redaksi'] = $_REQUEST['pemimpin_redaksi'];
if(isset($_REQUEST['reporter']))
    $_SESSION['reporter'] = $_REQUEST['reporter'];
if(isset($_REQUEST['sekretaris']))
    $_SESSION['sekretaris'] = $_REQUEST['sekretaris'];
if(isset($_REQUEST['humas']))
    $_SESSION['humas'] = $_REQUEST['humas'];
if(isset($_REQUEST['bendahara']))
    $_SESSION['bendahara'] = $_REQUEST['bendahara'];
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
    <link rel="stylesheet" href="style/styleFormBuletin2.css">
        
    <link rel="shortcut icon" href="img/al_hikam_logo.png" type="image/alhikam-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <!-- Scipt ini hanya untuk menambahkan icon agar website lebih menarik -->
    <script src="https://kit.fontawesome.com/550c311c2e.js" crossorigin="anonymous"></script>

    <title>Edit Buletin</title>
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
            <form action="update-buletin.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="label">
                            <label for="image">Jika ingin mengubah sampul, silahkan lampirkan pada kolom di bawah ini.</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button type="submit" title="Tambah Buletin"><i class="fa-solid fa-check"></i></button>
                        </td>
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