<?php 
    include 'database.php';
    include_once('helper.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
    date_default_timezone_set('Asia/Jakarta');

    $idbarang       = rand();
    $idpenyedia     = $_POST['id_penyedia'];
    $kelasbekal     = $_POST['kelas_bekal'];
    $namabekal      = $_POST['nama_bekal'];
    $hargabekal     = $_POST['harga_bekal'];
    $stok           = $_POST['jumlah_bekal'];
    $tahun          = $_POST['tahun_produksi'];
    $nokontrak      = rand();
    $statusbarang   = "Pending"; 
    $status         = 1;

    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
    $row = mysqli_fetch_assoc($barang);

        //jika data berhasil disimpan
        $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_penyedia,kelas_bekal, nama_bekal, harga_bekal, jumlah_bekal, tahun_produksi, no_kontrak, status_barang,status, created_at, updated_at) 
                VALUES($idbarang,'$idpenyedia','$kelasbekal', '$namabekal', '$hargabekal','$stok','$tahun','$nokontrak','$statusbarang','$status', NOW(), NOW())");

                if($result){
                    // mysqli_query($koneksi, "UPDATE pemasukan SET status_request = 1, no_kontrak = $nokontrak, id_barang = $idbarang WHERE id_request = '".$_GET['id_request']."'");

                    echo '<script>alert("Simpan data Berhasil")</script>';
                    echo '<script>window.location="index.php?page=disbekal/home.php"</script>';
                }elseif(!$result){
                    echo "Error: " . mysqli_error($koneksi);
                    
                }
    
    // =================================================================================================
    // echo 'test 2jojdpoqwe12iepqowjdpoajd';

    // header("location:".BASE_URL."index.php?page=disbekal/databarang.php");
?>