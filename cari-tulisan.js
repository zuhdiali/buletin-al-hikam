var keyword = document.getElementById("keyword");
var tabel_tulisan = document.getElementById("tabel_tulisan");

keyword.addEventListener('keyup',function(){
    // buat objek ajax
    var xmlhttp = new XMLHttpRequest();
    
    // cek kesiapan ajax
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            tabel_tulisan.innerHTML=xmlhttp.responseText;
        }
    };

    // eksekusi ajax
    xmlhttp.open('GET','ajax-cari-tulisan.php?keyword='+keyword.value,true);
    xmlhttp.send();
});

