<?php 

// if(isset($_GET['idb'])){
// 	require 'database.php';
// 	$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '".$_GET['idb']."'");
// 		// echo '<script>alert("Hapus data Berhasil")</script>';
// 		// echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
// 		if ($hapus){
// 			//jika data berhasil disimpan
// 			echo '<script>alert("Hapus data Berhasil")</script>';
// 			echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
// 		}else{
// 			echo 'gagal'.mysqli_error($koneksi);
// 		} 
// }
// if(isset($_GET['id_bekal'])){
// 	require 'database.php';
// 	$hapus = mysqli_query($koneksi, "DELETE FROM kategori_bekal WHERE id_kategori = '".$_GET['id_bekal']."'");
// 		// echo '<script>alert("Hapus data Berhasil")</script>';
// 		// echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
// 		if ($hapus){
// 			//jika data berhasil disimpan
// 			echo '<script>alert("Hapus data Berhasil")</script>';
// 			echo '<script>window.location="index.php?page=disbekal/kategori_bekal/databekal.php"</script>';
// 		}else{
// 			echo 'gagal'.mysqli_error($koneksi);
// 		} 
// }

include 'database.php';
include_once('helper.php');

// $sql = mysqli_query($koneksi,"SELECT * FROM penyedia_barang");
// $row = mysqli_fetch_assoc($sql);
// $id_penyedia = $row['id_penyedia'];
$id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;
if(isset($_GET['id_bekal_penyedia'])){
	
	$hapus = mysqli_query($koneksi, "DELETE FROM bekal_penyedia WHERE id_bekal_penyedia = '".$_GET['id_bekal_penyedia']."'");
	// $id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;
		// echo '<script>alert("Hapus data Berhasil")</script>';
		// echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
		if ($hapus){
			//jika data berhasil disimpan
			echo '<script>alert("Hapus data Berhasil")</script>';
			echo '<script>window.location="index.php?page=disbekal/daftar_penyedia/detail_penyedia.php&id_penyedia='.$id_penyedia.'"</script>';
		}else{
			echo 'gagal'.mysqli_error($koneksi);
		} 
}


?>