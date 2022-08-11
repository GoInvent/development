<?php
    include '../../database.php';

    class DataController {
            public function getPenyedia() {
                $sql             =           mysqli_query($koneksi,"SELECT * FROM penyedia_barang");
                $result          =           $conn->query($sql);
                if($result->num_rows > 0) {
                    $data        =           mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
               return $data;
            }
    }
?>