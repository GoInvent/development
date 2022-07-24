<?php
    include 'database.php';
    include_once('helper.php');
    
    $id_user = isset($_GET['id_user']) ? $_GET['id_user']: false;

    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '".$_GET['id_user']."'");
    $row = mysqli_fetch_assoc($sql);

    $id_user = $row['id_user'];
    $status = 'pending';

    mysqli_query($koneksi, "INSERT INTO log_penyedia(id_user, created_at, status) VALUES('$id_user', NOW(), '$status') ");

    echo '<script>alert("Simpan data Berhasil")</script>';
    echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
    
?>