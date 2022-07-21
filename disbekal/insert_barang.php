<?php 
    include 'database.php';
    include_once('helper.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
    date_default_timezone_set('Asia/Jakarta');

    $idbarang       = $_POST['id_barang'];
    $kategori       = $_POST['id_komoditi'];
    $namabarang     = $_POST['nama_barang'];
    $id_admin       = $_POST['id_admin'];
    $harga          = $_POST['harga_barang'];
    $stok           = $_POST['jumlah_barang'];
    $tahun          = $_POST['tahun_produksi'];
    $nokontrak      = $_POST['no_kontrak'];
    $statusbarang   = "Approved";

    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $row = mysqli_fetch_assoc($barang);
    // kasih kondisional kondisi
    $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_komoditi,nama_barang, id_admin, harga_barang, jumlah_barang, tahun_produksi, no_kontrak, status_barang, created_at, updated_at) 
                VALUES('$idbarang','$kategori','$namabarang', '$id_admin', '$harga','$stok','$tahun','$nokontrak','$statusbarang', NOW(), NOW())");

    $update = mysqli_query($koneksi, "UPDATE pemasukan SET status_request = 1, no_kontrak = $nokontrak, id_barang = $idbarang WHERE id_request = '".$_GET['id_request']."'");
    // $update_barang = mysqli_query($koneksi, "UPDATE barang SET jumlah_barang = $stok, updated_at = NOW() WHERE id_barang = '".$_GET['id_barang']."'");

    if ($result){
        //jika data berhasil disimpan
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
    }else if($idbarang == $row['id_barang']){
        print('data berhasil diperbarui');
        // echo '<script>alert("Simpan data Berhasil")</script>';
        // echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
    }else if($update){
        echo '<script>alert("Simpan data Berhasil")</script>';
    }else {
        echo 'gagal'.mysqli_error($koneksi);
    }
// echo 'test 2jojdpoqwe12iepqowjdpoajd';

    // header("location:".BASE_URL."index.php?page=disbekal/databarang.php");
?>