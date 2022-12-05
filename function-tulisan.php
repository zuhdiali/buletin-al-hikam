<?php
$tipe_konten = function($string){
    switch ($string) {
        case '1-telaah-utama':
            return "Telaah Utama - ";
            break;
        case '2-profil':
            return "Profil - ";
            break;
        case '3-akhlak':
            return "Akhlak - ";
            break;
        case '4-info-lepas':
            return "Info Lepas - ";
            break;
        case '5-cerpen':
            return "Cerpen - ";
            break;
        case '5-cerbung':
            return "Cerbung - ";
            break;
        case '6-tafakur':
            return "Tafakur - ";
            break;
        case '7-quran-hadits':
            return "Qur'an Hadits - ";
            break;
        case '8-tarikh':
            return "Tarikh - ";
            break;
        case '9-keikhwanan':
            return "Keikhwanan - ";
            break;
        case '9-keakhwatan':
            return "Keakhwatan - ";
            break;
        case '10-puisi':
            return "Puisi - ";
            break;
        case '11-doa':
            return "Doa - ";
            break;
        case '12-tips-and-trick':
            return "Tips & Trick - ";
            break;
        case '13-kki-kita':
            return "KKI Kita - ";
            break;
    default:
            return "Lainnya - ";
            break;
    }
}
?>