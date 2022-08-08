<?php 
    include 'database.php';
    include_once('helper.php');
    $id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;

    $kelasbekal             = $_POST['kelas_bekal'];
    $idpenyedia             = isset($_POST['id_penyedia']) ? $_POST['id_penyedia'] : false;
    $namabekal              = $_POST['nama_bekal'];
    $idbekal                = rand();
    $stokbekal              = $_POST['stok_bekal'];

    $sql = mysqli_query($koneksi, "INSERT INTO bekal_penyedia (kelas_bekal, id_penyedia, nama_bekal,id_bekal,stok_bekal, created_at, updated_at) 
                VALUES('$kelasbekal', '$idpenyedia', '$namabekal', '$idbekal','$stokbekal', NOW(), NOW())");

    if($sql){
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/databekal.php"</script>';
    }else{
        echo '<script>alert("Gagal Input Data")</script>';
        echo "Error: " . mysqli_error($koneksi);
    }
    
?>