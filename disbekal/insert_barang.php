<?php 
    include 'database.php';
    include_once('helper.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
    date_default_timezone_set('Asia/Jakarta');

    $idbarang       = rand();
    $idpenyedia     = $_POST['id_penyedia'];
    $kelasbekal     = $_POST['kelas_bekal'];
    // $namabekal      = $_POST['nama_bekal'];
    $hargabekal     = $_POST['harga_bekal'];
    $stok           = $_POST['jumlah_bekal'];
    $tahun          = $_POST['tahun_produksi'];
    $gudang         = $_POST['nama_gudang'];
    $nokontrak      = rand();
    $statusbarang   = $_POST['status']; 
    $status         = 1;
    $exp_date = $_POST['exp_date'];

    // jadi nanti ada 2 approval - yang pertama barang ketika dikirim.
    // dan kedua ketika barang masuk gudang.

    // ada kondisi dimana barang, akan update status aja ketika status 'menunggu persetujuan - 1' menjadi 'menunggu persetujuan - 2',
    // ketika status barang di 'menunggu persetujuan - 2', maka akan insert ke gudang bekal dan status menjadi approved.
    
    if($statusbarang == 'pending'){
        mysqli_query($koneksi, "UPDATE pemasukan SET status = 'sent'  WHERE id_request = '".$_GET['id_request']."'");
        
        echo '<script>alert("Update data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/home.php"</script>';

    }else{
        //jika data berhasil disimpan
        $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_penyedia,nama_gudang,kelas_bekal, harga_bekal, jumlah_bekal, tahun_produksi, no_kontrak, status_barang, status, exp_date, created_at, updated_at) 
        VALUES($idbarang,'$idpenyedia','$gudang','$kelasbekal', '$hargabekal','$stok','$tahun','$nokontrak','$statusbarang','$status', '$exp_date',NOW(), NOW())");

        if($result){
            mysqli_query($koneksi, "UPDATE pemasukan SET status='Approved', status_request ='Approved',no_kontrak = $nokontrak WHERE id_request = '".$_GET['id_request']."'");

            echo '<script>alert("Simpan data Berhasil")</script>';
            echo '<script>window.location="index.php?page=disbekal/home.php"</script>';
        }elseif(!$result){
            echo "Error: " . mysqli_error($koneksi);
            
        }    
    }

    // =================================================================================================
?>