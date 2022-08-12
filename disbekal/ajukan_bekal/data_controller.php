<?php
    include '../../database.php';
    include_once('helper.php');

    $id_penyedia = $_POST['id_penyedia'];
    $kelas_bekal = $_POST['kelas_bekal'];
    $modul =$_POST['modul'];
   
    if ($modul=='kelas_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia");
        while($row = mysqli_fetch_array($sql)){
            $kelas_bekal .= '<option value="'.$row["id_bekal_penyedia"].'">'.$row["kelas_bekal"].'</option>';
        }

        echo $kelas_bekal;
    }elseif($modul=='jenis_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia and kelas_bekal = $kelas_bekal");
        while($row = mysqli_fetch_array($sql)){
            $jenis_bekal .= '<option value="'.$row["id_bekal_penyedia"].'">'.$row["jenis_bekal"].'</option>';
        }

        echo $jenis_bekal;
    }
?>