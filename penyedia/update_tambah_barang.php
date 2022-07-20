<?php 

    include 'database.php';
    include_once('helper.php');

    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] :false;
    // $jumlah_barang_awal = isset($_POST['jumlah_barang']) ? $_POST['jumlah_barang'] :false;

    // $namabarang     = $_POST['nama_barang'];
    $tambah_barang  = $_POST['jumlah_barang'];
    $statusbarang   = 0;

    //select tb_barang
    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $row = mysqli_fetch_assoc($barang);
    $jumlah_barang_awal = $row['jumlah_barang'];
    $jumlah_barang = $tambah_barang + $jumlah_barang_awal;

    //update diganti sama push, masuk ke tb_pemasukan.
    mysqli_query($koneksi, "UPDATE barang SET jumlah_barang = $jumlah_barang WHERE id_barang = '".$_GET['id_barang']."'");

    echo '<script>alert("Simpan data Berhasil")</script>';

?>