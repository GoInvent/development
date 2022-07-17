<?php 
    include 'database.php';
    include_once('helper.php');

    date_default_timezone_set('Asia/Jakarta');

    $idbarang       = $_POST['id_barang'];
    $kategori       = $_POST['id_komoditi'];
    $namabarang     = $_POST['nama_barang'];
    $harga          = $_POST['harga_barang'];
    $stok           = $_POST['jumlah_barang'];
    $tahun          = $_POST['tahun_produksi'];
    $nokontrak      = $_POST['no_kontrak'];
    $created_at     = date('d-m-y h:i:s');
    $update_at      = date('d-m-y h:i:s');
    $statusbarang   = "Approved";

    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $row = mysqli_fetch_assoc($barang);
    $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_komoditi,nama_barang, harga_barang, jumlah_barang, tahun_produksi, no_kontrak, status_barang, created_at, updated_at) 
                VALUES('$idbarang','$kategori','$namabarang','$harga','$stok','$tahun','$nokontrak','$statusbarang', '$created_at', '$update_at')");
    
    if ($result){
        //jika data berhasil disimpan
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
    }else if($namabarang == $row['nama_barang']){
        echo '<script>alert("Gagal, Nama barang sudah ada")</script>';
        echo '<script>window.location="index.php?page=disbekal/home.php"</script>';
    }else{
        echo 'gagal'.mysqli_error($koneksi);
    } 
// echo 'test 2jojdpoqwe12iepqowjdpoajd';

    // header("location:".BASE_URL."index.php?page=disbekal/databarang.php");
?>