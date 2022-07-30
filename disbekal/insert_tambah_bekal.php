<?php 
    include 'database.php';
    include_once('helper.php');

    $nama_kategori_bekal = $_POST['nama_kategori_bekal'];
    $kategori_bekal      = $_POST['kelas_bekal'];

    mysqli_query($koneksi, "INSERT INTO kategori_bekal (nama_kategori_bekal, kelas_bekal, created_at, updated_at) 
                VALUES('$nama_kategori_bekal', '$kategori_bekal', NOW(), NOW()");

    echo '<script>alert("Simpan data Berhasil")</script>';
    echo '<script>window.location="index.php?page=disbekal/databekal.php"</script>';

?>