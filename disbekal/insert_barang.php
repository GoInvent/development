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


    mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_komoditi,nama_barang, harga_barang, jumlah_barang, tahun_produksi, no_kontrak, status_barang, created_at, updated_at) 
                VALUES('$idbarang','$kategori','$namabarang','$harga','$stok','$tahun','$nokontrak','$statusbarang', '$created_at', '$update_at')");

    // echo 'test 2jojdpoqwe12iepqowjdpoajd';

    // header("location:".BASE_URL."index.php?page=disbekal/databarang.php");
?>