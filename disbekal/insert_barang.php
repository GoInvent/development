<?php 
    include 'database.php';
    include_once('helper.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    date_default_timezone_set('Asia/Jakarta');

    $idbarang       = $_POST['id_barang'];
    $kategori       = $_POST['id_komoditi'];
    $namabarang     = $_POST['nama_barang'];
    $harga          = $_POST['harga_barang'];
    $stok           = $_POST['jumlah_barang'];
    $tahun          = $_POST['tahun_produksi'];
    $nokontrak      = $_POST['no_kontrak'];
    $statusbarang   = "Approved";

    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $row = mysqli_fetch_assoc($barang);
    $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_komoditi,nama_barang, harga_barang, jumlah_barang, tahun_produksi, no_kontrak, status_barang, created_at, updated_at) 
                VALUES('$idbarang','$kategori','$namabarang','$harga','$stok','$tahun','$nokontrak','$statusbarang', NOW(), NOW())");
    $update = mysqli_query($koneksi, "UPDATE pemasukan SET status_request = 1 WHERE id_request = '".$_GET['id_request']."'");
    if ($result){
        //jika data berhasil disimpan
        if($idbarang == $row['id_barang'] && $stok != 0){
            echo '<script>alert("Simpan data Berhasil")</script>';
            echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
        }else{
            echo '<script>alert("Simpan data Berhasil")</script>';
            echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
        }
    }else if($idbarang == $row['id_barang']){
        echo '<script>alert("Gagal, ID Barang sudah ada")</script>';
        echo '<script>window.location="index.php?page=disbekal/home.php"</script>';
    }else if($update){
        echo '<script>alert("Simpan data Berhasil")</script>';
    }else {
        echo 'gagal'.mysqli_error($koneksi);
    }
// echo 'test 2jojdpoqwe12iepqowjdpoajd';

    // header("location:".BASE_URL."index.php?page=disbekal/databarang.php");
?>