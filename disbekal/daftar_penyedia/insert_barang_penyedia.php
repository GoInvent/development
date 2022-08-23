<?php 
    include 'database.php';
    include_once('helper.php');
    $id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;

    $idpenyedia             = isset($_POST['id_penyedia']) ? $_POST['id_penyedia'] : false;
    $kelasbekal             = $_POST['kelas_bekal'];
    $namabekal              = $_POST['nama_bekal'];
    $idbekal                = rand();
    // $hargabekal             = $_POST['harga'];
    // $stokbekal              = $_POST['stok_bekal'];
    // $tahunbekal             = $_POST['tahun'];
    $namagudang               = $_POST['nama_gudang'];

    $sql = mysqli_query($koneksi, "INSERT INTO bekal_penyedia (id_penyedia,kelas_bekal, nama_bekal,id_bekal,nama_gudang, created_at, updated_at) 
                VALUES('$idpenyedia','$kelasbekal','$namabekal', '$idbekal','$namagudang', NOW(), NOW())");

    if($sql){
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/daftar_penyedia/detail_penyedia.php&id_penyedia='.$idpenyedia.'"</script>';
    }else{
        echo '<script>alert("Gagal Input Data")</script>';
        echo "Error: " . mysqli_error($koneksi);
    }
    
?>