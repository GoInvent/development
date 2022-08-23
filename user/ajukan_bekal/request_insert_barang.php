<?php 
    include 'database.php';
    include_once('helper.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id']) ? $_GET['id'] : false;
    date_default_timezone_set('Asia/Jakarta');

    $iduser     = $_SESSION['id_user'] = $_POST['id_user'];
    $namauser   = $_SESSION['nama_user'] = $_POST['nama_user'];
    $alamat         = $_POST['alamat_user'];
    $idbarang       = $_POST['id_barang'];  
    $kelasbekal     = $_POST['kelas_bekal'];    
    // $namabarang     = $_POST['nama_barang'];
    $harga          = $_POST['harga_bekal'];
    $stok           = $_POST['jumlah_bekal'];
    $tahun          = $_POST['tahun_produksi'];
    $nokontrak      = $_POST['no_kontrak'];

    // jadi nanti ada 2 approval - yang pertama barang ketika dikirim.
    // dan kedua ketika barang masuk gudang.

    // ada kondisi dimana barang, akan update status aja ketika status 'menunggu persetujuan - 1' menjadi 'menunggu persetujuan - 2',
    // ketika status barang di 'menunggu persetujuan - 2', maka akan insert ke gudang bekal dan status menjadi approved.
    
    // include database connection file
    include_once("database.php");

    // Insert user data into table
    $result = mysqli_query($koneksi, "INSERT INTO pengeluaran (id_user,nama_user,alamat_user,id_barang,kelas_bekal ,jumlah_bekal,harga_bekal, tahun_produksi, no_kontrak, tgl_request, tgl_kirim,status_request) 
                    VALUES('$iduser','$namauser','$alamat','$idbarang','$kelasbekal','$stok','$harga','$tahun','$nokontrak',NOW(),NOW(),'')");
    
    if ($result){
        //jika data berhasil disimpan
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=user/home.php"</script>';
    }else{
        echo 'gagal'.mysqli_error($koneksi);
    }
    header("Location: index.php?page=user/home.php");

    // =================================================================================================
?>