<?php 

    include 'database.php';
    include_once('helper.php');

    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] :false;
    // $jumlah_barang_awal = isset($_POST['jumlah_barang']) ? $_POST['jumlah_barang'] :false;

    // $namabarang     = $_POST['nama_barang'];
    $tambah_barang  = $_POST['jumlah_barang'];
    // $statusbarang   = 0;

    //select tb_barang
    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $row = mysqli_fetch_assoc($barang);
    
    $id_admin = $row['id_admin'];
    // $nama_penyedia = $row['nama_penyedia'];
    // $role = $row['role'];
    $id_komoditi = $row['id_komoditi'];
    $nama_barang = $row['nama_barang'];
    $harga_barang = $row['harga_barang'];
    $tahun_produksi = $row['tahun_produksi'];
    $no_kontrak = $row['no_kontrak'];

    $jumlah_barang_awal = $row['jumlah_barang'];
    $jumlah_barang = $tambah_barang + $jumlah_barang_awal;

    $result = mysqli_query($koneksi, "INSERT INTO pemasukan (id_admin, nama_penyedia, role, id_komoditi, id_barang, nama_barang, jumlah_barang, harga_barang, tahun_produksi, tgl_request, no_kontrak, status, status_request )
                VALUES('$id_admin', 'kosong', '$role', '$id_komoditi', '$id_barang', '$nama_barang', '$jumlah_barang', '$harga_barang', '$tahun_produksi', NOW(), '$no_kontrak', 'Penambahan $tambah_barang barang masuk', 0) ");
    
    if($result){
        mysqli_query($koneksi, "UPDATE barang SET jumlah_barang = $jumlah_barang, updated_at = NOW() WHERE id_barang = '".$_GET['id_barang']."'");

        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=user/penyedia/databarang.php"</script>';
    }else{
        echo '<script>alert("Simpan data gagal")</script>';
        echo '<script>window.location="index.php?page=user/penyedia/databarang.php"</script>';
    }

?>