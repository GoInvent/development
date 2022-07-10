<?php 

if(isset($_GET['idb'])){
	require 'database.php';
	$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '".$_GET['idb']."'");
		echo '<script>alert("Hapus data Berhasil")</script>';
		echo '<script>window.location="index.php?page=databarang.php"</script>'; 
}


?>