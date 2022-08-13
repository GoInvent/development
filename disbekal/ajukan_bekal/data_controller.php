<?php
    include '../../database.php';
    include_once('helper.php');

    $id_penyedia = $_POST['id_penyedia'];
    // $kelas_bekal = $_POST['kelas_bekal'];
    $nama_bekal = "nama_bekal";
    $id_bekal_penyedia = $_POST['id_bekal_penyedia'];
    $modul =$_POST['modul'];
   
    if ($modul=='jenis_bekal'){
        $sql = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia");
        while($row = mysqli_fetch_array($sql)){
            $jenis_bekal .= '<option value="'.$row["nama_bekal"].'">'.$row["nama_bekal"].'</option>';
        }

        echo $jenis_bekal;

    }
    if($modul=='harga_bekal'){
        $nama = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia WHERE id_penyedia = $id_penyedia");
        $harga_bekal = '<option value="1">'.$modul.'</option>';
        while($row = mysqli_fetch_array($nama)){
            $harga_bekal .= '<input type="number" name="harga_bekal" class="form-control" id="harga_bekal" placeholder="" required value= "'.$row["harga"].'">';
        }

        echo $harga_bekal;
    }
?>