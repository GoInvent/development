<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'database.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM admin WHERE email='$email' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	$_SESSION['id_admin'] = $data['admin_id'];

	// cek jika user login sebagai admin
	if($data['role']=="disbekal"){
		$d = mysqli_fetch_object($login);
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "disbekal";
		$_SESSION['id_admin'] = $data['admin_id'];
		// alihkan ke halaman dashboard admin
		header("location:index.php?page=disbekal/home.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="kadopus"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "kadopus";
		$_SESSION['id_admin'] = $data['admin_id'];
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?page=home.php");
	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	echo '<script>alert("Email dan Password SALAH!")</script>';
	echo '<script>window.location="login.php"</script>';
}

?>