<?php 

if(isset($_GET['idb'])){
	require 'database.php';
	$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '".$_GET['idb']."'");
		// echo '<script>alert("Hapus data Berhasil")</script>';
		// echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
		if ($hapus){
			//jika data berhasil disimpan
			echo '<script>alert("Hapus data Berhasil")</script>';
			echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
		}else{
			echo 'gagal'.mysqli_error($koneksi);
		} 
}


?>