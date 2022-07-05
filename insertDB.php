<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
		$ProductID = $_POST['id_barang']?? '';
        $ProductName = $_POST['nama_barang'] ?? '';
		$brand = $_POST['jenis_barang']?? '';
        $price = $_POST['harga_barang']?? '';
        $quantity = $_POST['jumlah_barang']?? '';
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO barang (id_barang,nama_barang,jenis_barang,harga_barang,jumlah_barang) values(?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($ProductID,$ProductName,$brand,$price,$quantity));
		Database::disconnect();
		header("Location: databarang.php");
    }
?>