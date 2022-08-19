<?php
    include '../../database.php';
    include '../../helper.php';

    $id_penyedia = $_POST['id_penyedia'];
    $modul =$_POST['modul'];
   
    if ($modul=='kategori_bekal'){
        $sql = mysqli_query($koneksi, "SELECT DISTINCT kelas_bekal FROM bekal_penyedia WHERE id_penyedia = $id_penyedia");
        $kelas_bekal = '<option>-Kategori Bekal-</option>';
        while($row = mysqli_fetch_array($sql)){
            if($row['kelas_bekal'] ){
                $kelas_bekal .= '<option value="'.$row["kelas_bekal"].'">'.$row["kelas_bekal"].'</option>';
            }
        }
        echo $kelas_bekal;
    }
?>