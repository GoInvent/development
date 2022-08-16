<?php
    include '../../database.php';
    include_once('helper.php');


    $kelas_bekal = $_POST['kelas_bekal'];
    $nama_bekal  = $_POST['nama_bekal'];
    $modul =$_POST['modul'];
   
    if ($modul=='nama_kategori_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM kategori_bekal WHERE kelas_bekal = $kelas_bekal");
        while($row = mysqli_fetch_array($sql)){
            $kelas_bekal .= '<option value="'.$row["id_kelas"].'">'.$row["nama_kategori_bekal"].'</option>';
        }

        echo $kelas_bekal;
    }elseif($modul=='jenis_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia AND kelas_bekal = $kelas_bekal");
        while($row = mysqli_fetch_array($sql)){
            $jenis_bekal .= '<option value="'.$row["id_bekal_penyedia"].'">'.$row["nama_bekal"].'</option>';
        }

        echo $jenis_bekal;
    }
?>