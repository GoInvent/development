<?php 

    define("BASE_URL", "http://localhost:8080/website-warehouse/development/"); 

    function rupiah($angka){
        
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    
    }

?>