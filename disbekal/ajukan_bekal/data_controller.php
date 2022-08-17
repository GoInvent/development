<?php
    include '../../database.php';
    include_once('helper.php');

    $id_penyedia = $_POST['id_penyedia'];
    $kelas_bekal = $_POST['kelas_bekal'];
    $modul =$_POST['modul'];
   
    if ($modul=='kategori_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia");
        $kelas_bekal = '<option>-Kategori Bekal-</option>';
        while($row = mysqli_fetch_array($sql)){
            $kelas_bekal .= '<option value="'.$row["kelas_bekal"].'">'.$row["kelas_bekal"].'</option>';
        }

        echo $kelas_bekal;

    }
?>