<?php
    include '../../database.php';
    include_once('helper.php');

    $id_penyedia = $_POST['id_penyedia'];
    $kelas_bekal = $_POST['kelas_bekal'];
    $jenis_bekal  = $_POST['jenis_bekal'];
    $modul =$_POST['modul'];
   
    if ($modul=='kelas_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia");
        while($row = mysqli_fetch_array($sql)){
            $kelas_bekal .= '<option value="'.$row["kelas_bekal"].'">'.$row["kelas_bekal"].'</option>';
        }

        echo $kelas_bekal;
    }elseif($modul=='jenis_bekal'){
        $nama = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia AND kelas_bekal = $kelas_bekal");
        // $jenis_bekal = '<option value="1">'.$kelas_bekal.'</option>';
        while($row = mysqli_fetch_array($nama)){
            $jenis_bekal .= '<option value="'.$row["id_penyedia"].'">'.$row["nama_bekal"].'</option>';
        }

        echo $jenis_bekal;
    }
?>