<?php 
    include 'database.php';
    include_once('helper.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
    date_default_timezone_set('Asia/Jakarta');


    // $idbarang       = $_POST['id_barang'];
    $idpenyedia     = $_POST['id_penyedia'];
    $jenisbekal     = $_POST['jenis_bekal'];
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
        $result = mysqli_query($koneksi, "INSERT INTO pemasukan (id_penyedia,nama_kelas,nama_gudang,nama_bekal, harga_bekal,jumlah_bekal,  tahun_produksi,tgl_request, no_kontrak, status , status_request) 
                VALUES('$idpenyedia','$jenisbekal','Dopusbekbar','$namabekal', '$hargabekal','$stok','$tahun',NOW(),'$nokontrak','$statusbarang', $status)");

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