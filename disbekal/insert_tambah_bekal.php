<?php 
    include 'database.php';
    include_once('helper.php');

    $kode_komoditi       = $_POST['kode_komoditi'];
    $jenis_komoditi      = $_POST['jenis_komoditi'];

    mysqli_query($koneksi, "INSERT INTO komoditi (kode_komoditi, jenis_komoditi) VALUES('$kode_komoditi','$jenis_komoditi')");

    echo '<script>alert("Simpan data Berhasil")</script>';
    echo '<script>window.location="index.php?page=disbekal/databekal.php"</script>';

?>