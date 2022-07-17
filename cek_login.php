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
// $login_user =  mysqli_query($koneksi,"SELECT * FROM users WHERE email_user='$email' AND password_user='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	$_SESSION['id_admin'] = $data['id_admin'];
	$idadmin = $_SESSION['id_admin'];
	$result = mysqli_query($koneksi, "UPDATE admin SET last_login = NOW() WHERE id_admin = $idadmin");
	// cek jika user login sebagai admin
	if($data['role']=="disbekal"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Disbekal";
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		$_SESSION['login'] = 1;
		// alihkan ke halaman dashboard admin
		header("location:index.php?page=disbekal/home.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="kadopus"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Kadopus";
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		$_SESSION['login'] = 1;
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?page=kadopus/home.php");
	}else if($data['role']=="penyedia"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "Penyedia";
		$_SESSION['id_admin'] = $data['id_admin'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		$_SESSION['login'] = 1;
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?page=penyedia/home.php");
	}else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	echo '<script>alert("Email dan Password SALAH!")</script>';
	echo '<script>window.location="login.php"</script>';
}

?>