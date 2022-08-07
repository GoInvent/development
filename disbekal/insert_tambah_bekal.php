<?php 
    include 'database.php';
    include_once('helper.php');

    $namakelas          = $_POST['nama_kategori_bekal'];
    $kelasbekal         = $_POST['kelas_bekal'];

    $sql = mysqli_query($koneksi, "INSERT INTO `kategori_bekal`(nama_kategori_bekal, kelas_bekal, created_at, updated_at) 
                VALUES('$namakelas', '$kelasbekal', NOW(), NOW())");

    if($sql){
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/databekal.php"</script>';
    }else{
        echo '<script>alert("Gagal Input Data")</script>';
    }
    
?>