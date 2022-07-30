<?php 
    include 'database.php';
    include_once('helper.php');

    $nama_penyedia   = $_POST['nama_penyedia'];
    $email_penyedia  = $_POST['email_penyedia'];
    $no_penyedia     = $_POST['no_penyedia'];
    $alamat_penyedia = $_POST['alamat_penyedia'];

    mysqli_query($koneksi, "INSERT INTO penyedia_barang (nama_penyedia, email_penyedia, no_penyedia, alamat_penyedia, tanggal_terdaftar) 
                VALUES('$nama_penyedia','$email_penyedia','$no_penyedia', '$alamat_penyedia', NOW())");

    echo '<script>alert("Simpan data Berhasil")</script>';
    echo '<script>window.location="index.php?page=disbekal/list_penyedia.php"</script>';

?>