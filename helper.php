<?php 

    define("BASE_URL", "http://localhost/ilogi/");
    // define("BASE_URL", "http://localhost:8080/website-warehouse/development/"); 
    function rupiah($angka){
        
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    
    }
    function pagination($query, $data_perhalaman, $pagination, $url){
        $total_data = mysqli_num_rows($query);
        // ceil untuk membulatkan nilai keatas
        $total_halaman = ceil($total_data/$data_perhalaman);
        
        $batasPosisi = 6;
        $batasHalaman = 10;
        $mulaiPagination = 1;
        $batasAkhir = $total_halaman;

        echo "<ul class='pagination'>";
        if($pagination > 1){
            $prev = $pagination - 1;
            echo "<li class='page-pagination'><a href='".BASE_URL."$url&pagination=$prev'><<</a></li>";
        }
        
        if($total_halaman >= $batasHalaman){
            if($pagination > $batasPosisi){
                $mulaiPagination = $pagination - ($batasPosisi - 1);
            }
    
            $batasAkhir = ($mulaiPagination - 1) + $batasHalaman;
            if($batasAkhir > $total_halaman){
                $batasAkhir = $total_halaman;
            }
        }

        for($i = $mulaiPagination; $i<=$batasAkhir; $i++){
            echo "<li class='page-pagination'><a href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
        }

        if($pagination < $total_halaman){
            $next = $pagination + 1;
            echo "<li class='page-pagination'><a href='".BASE_URL."$url&pagination=$next'>>></a></li>";
        }
        echo"</ul>";
    }

?>