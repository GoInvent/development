<?php
    
    $id_bekal_penyedia = isset($_GET['id_bekal_penyedia']) ? $_GET['id_bekal_penyedia'] : false;
    $id_penyedia = isset($_POST['id_penyedia']) ? $_POST['id_penyedia'] : false;
    $query_bekal_penyedia = mysqli_query($koneksi,"SELECT * FROM bekal_penyedia WHERE id_bekal_penyedia = '".$_GET['id_bekal_penyedia']."'");    
    $row = mysqli_fetch_object($query_bekal_penyedia);
    // Check If form submitted, insert form data into users table.
        $kelasbekal = $_POST['kelas_bekal'];
        $namabekal  = $_POST['nama_bekal'];
        $gudang     = $_POST['nama_gudang'];
                                                
        // include database connection file
        include 'database.php';
        // Insert user data into table
        $update = mysqli_query($koneksi, "UPDATE bekal_penyedia SET
        kelas_bekal     = '".$kelasbekal."',
        nama_bekal      = '".$namabekal."', 
        nama_gudang     = '".$gudang."'
        WHERE id_bekal_penyedia = '".$row->id_bekal_penyedia."'");
                                                
        if ($update){
        //jika data berhasil disimpan
            echo '<script>alert("Ubah data Berhasil")</script>';
            echo '<script>window.location="index.php?page=disbekal/daftar_penyedia/detail_penyedia.php&id_penyedia='.$id_penyedia.'"</script>';
        }else{
            echo 'gagal'.mysqli_error($koneksi);
        }
?>