<?php
     
    require 'database.php';
 
    if (isset($_POST['submit'])) {
        // keep track post values
		$idbarang = $_POST['id_barang']?? '';
        $namabarang = $_POST['nama_barang'] ?? '';
		$jenis = $_POST['jenis_barang']?? '';
        $harga = $_POST['harga_barang']?? '';
        $stok = $_POST['jumlah_barang']?? '';
        
		// insert data
		$insert = "INSERT INTO 'barang' (id_barang,nama_barang,jenis_barang,harga_barang,jumlah_barang) values(?, ?, ?, ?, ?)";
		if ($insert){
			//jika data berhasil disimpan
			echo '<script>alert("Simpan data Berhasil")</script>';
			echo '<script>window.location="databarang.php"</script>';
		}else{
			echo 'gagal'.mysqli_error($koneksi);
		}
		header("Location: databarang.php");
    }
?>