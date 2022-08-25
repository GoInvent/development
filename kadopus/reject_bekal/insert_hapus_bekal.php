<?php 
    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $pemasukam = mysqli_query($koneksi, "SELECT * FROM pemasukan");
    $row = mysqli_fetch_assoc($barang);
    date_default_timezone_set('Asia/Jakarta');

    // $idbarang       = $_POST['id_barang'];
    $nama_penyedia  = $_POST['nama_penyedia'];
    $nama_bekal     = $_POST['nama_bekal'];
    $nama_gudang    = $_POST['nama_gudang'];
    $hapus_bekal    = $_POST['harga_bekal'];
    $bekal_gudang = $row['jumlah_bekal'];
    $jumlah_bekal = 5;

    //jika data berhasil disimpan
        $result = mysqli_query($koneksi, "UPDATE pemasukan SET jumlah_bekal = '$jumlah_bekal' WHERE id_request = '".$_GET['id_request']."'");

            if($result){
                // mysqli_query($koneksi, "UPDATE pemasukan SET status_request = 1, no_kontrak = $nokontrak, id_barang = $idbarang WHERE id_request = '".$_GET['id_request']."'");
                echo '<script>alert("Simpan data Berhasil")</script>';
                echo '<script>window.location="index.php?page=disbekal/home.php"</script>';
            }elseif(!$result){
                echo '<script>alert("Simpan data Gagal")</script>';
                echo "Error: " . mysqli_error($koneksi);
            }
    
    // =================================================================================================
    // echo 'test 2jojdpoqwe12iepqowjdpoajd';

    // header("location:".BASE_URL."index.php?page=disbekal/databarang.php");
?>