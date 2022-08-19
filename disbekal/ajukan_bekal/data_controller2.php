<?php
    include '../../database.php';
    include '../../helper.php';

    $kelas_bekal = $_POST['kelas_bekal'];
    $id_penyedia = $_POST['id_penyedia'];
    $modul =$_POST['modul'];
   
    if ($modul=='jenis_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE kelas_bekal = '$kelas_bekal' AND id_penyedia = $id_penyedia");
        $jenis_bekal = '<option>-Jenis Bekal-</option>';
        while($row = mysqli_fetch_array($sql)){
            $jenis_bekal .= '<option value="'.$row["nama_bekal"].'">'.$row["nama_bekal"].'</option>';
        }
        echo $jenis_bekal;
    }
?>