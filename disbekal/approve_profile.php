<?php
    include 'database.php';
    include_once('helper.php');
    
    $id_user = isset($_GET['id_user']) ? $_GET['id_user']: false;

    $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '".$_GET['id_user']."'");
    $row = mysqli_fetch_assoc($sql);

    $role = 'Penyedia';
    $login = 1;

    mysqli_query($koneksi, "UPDATE users SET role = $role, created_at = NOW(), login = $login WHERE id_user = '".$_GET['id_user']."'");

    // if($update) {
    //     mysqli_query($koneksi, "UPDATE log_penyedia SET created_at = $now, status = 'approved' $login WHERE id_user = '".$_GET['id_user']."'");

    //     echo '<script>alert("Simpan data Berhasil")</script>';
    //     echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';    
    // }

?>