<?php 

    define("BASE_URL", "http://localhost/ilogi/"); 

    
    function rupiah($angka){
        
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    
    }

?>