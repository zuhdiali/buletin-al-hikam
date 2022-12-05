<?php
session_start();
if (!isset($_SESSION["username"]))
    header("Location: login.php");

// require('dbconfig-1.php');
require('dbconfig-2.php');

$id = $_SESSION['id'];
$nama_buletin = $_SESSION["nama_buletin"];
$edisi = $_SESSION["edisi"];
$penanggung_jawab = $_SESSION["penanggung_jawab"];
$editor = $_SESSION["editor"];
$pembina = $_SESSION["pembina"];
$layouter = $_SESSION["layouter"];
$pemimpin_redaksi = $_SESSION["pemimpin_redaksi"];
$reporter = $_SESSION["reporter"];
$sekretaris = $_SESSION["sekretaris"];
$bendahara = $_SESSION["bendahara"];
$humas = $_SESSION["humas"];


try {
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

            $sql = "UPDATE buletin SET nama_buletin=?, edisi=?,
            penanggung_jawab=?, pembina=?, pemimpin_redaksi=?, 
            sekretaris=?, bendahara=?, editor=?, 
            layouter=?, reporter=?, humas=?, image='$imgContent', 
            created=NOW() WHERE id=$id";

            // Update into database  
            $insert = $db->prepare($sql); 
            $insert->bind_param('sssssssssss',$nama_buletin, $edisi, $penanggung_jawab, $pembina, $pemimpin_redaksi,
                                $sekretaris, $bendahara, $editor, $layouter, $reporter, $humas);
            $insert->execute();

            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $sql = "UPDATE buletin SET nama_buletin=?, edisi=?,
            penanggung_jawab=?, pembina=?, pemimpin_redaksi=?, 
            sekretaris=?, bendahara=?, editor=?, 
            layouter=?, reporter=?, humas=? WHERE id=$id";

            // Update into database 
            $insert = $db->prepare($sql); 
            $insert->bind_param('sssssssssss',$nama_buletin, $edisi, $penanggung_jawab, $pembina, $pemimpin_redaksi,
                                $sekretaris, $bendahara, $editor, $layouter, $reporter, $humas);
            $insert->execute();
    } 
    $db = NULL;

    // menghapus session tak penting
    unset($_SESSION["nama_buletin"]);
    unset($_SESSION["edisi"]);
    unset($_SESSION["editor"]);
    unset($_SESSION["pembina"]);
    unset($_SESSION["layouter"]);
    unset($_SESSION["pemimpin_redaksi"]);
    unset($_SESSION["reporter"]);
    unset($_SESSION["sekretaris"]);
    unset($_SESSION["bendahara"]);
    unset($_SESSION["humas"]);
    
    header("Location: buletin.php?id_buletin=$id");
} catch (PDOException $e) {
    exit("SQL Error: ".$e->getMessage()."<br>");
    header("Location: error-page.php");
}
?>