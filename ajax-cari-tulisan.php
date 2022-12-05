<?php
require('dbconfig-1.php');

try {
    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $keyword = $_GET['keyword'];

    $sql = "SELECT * FROM tulisan WHERE judul LIKE ?";
    $keyword = "%".$keyword."%";

    $result = $pdo->prepare($sql);
    $result->bindParam(1,$keyword,PDO::PARAM_STR);
    $result->execute();
    
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $result->fetchAll();
    $pdo=NULL;
} catch (PDOException $e) {
    echo "Koneksi gagal:".$e->getMessage();
}

?>

<table>
    <tr>
        <th class='kolom-1'>No</th>
        <th class='kolom-2'>Judul</th>
        <th class='kolom-3'>Tautan</th>
    </tr>
    <?php 
    $i = 0;
    if($keyword===""|$rows==NULL){
        echo "<tr><td colspan='3' style='text-align:center;'>Tulisan tidak ditemukan</td></tr>";
    }
    else{
        foreach($rows as $value){
            $i+=1;
            echo "<tr>";
            echo "<td class='kolom-1'>",$i,"</td>";
            echo "<td class='kolom-2'>",$value['judul'],"</td>";
            echo "<td class='kolom-3'><a href='tulisan.php?id=",$value["id"],"'><i class='fa-solid fa-arrow-up-right-from-square'></i></a></td>";
            echo "</tr>";
        }
    }
    
    ?>
</table>