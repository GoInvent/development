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
	$_SESSION['id_admin'] = $data['admin_id'];
	$_SESSION['id_user'] = $data_user['id_user'];

	// cek jika user login sebagai admin
	if($data['role']=="disbekal"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "disbekal";
		$_SESSION['id_admin'] = $data['admin_id'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		// alihkan ke halaman dashboard admin
		header("location:index.php?page=disbekal/home.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="kadopus"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "kadopus";
		$_SESSION['id_admin'] = $data['admin_id'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?page=kadopus/home.php");
	}else if($data['role']=="penyedia"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "penyedia";
		$_SESSION['id_admin'] = $data['admin_id'];
		$_SESSION['nama_admin'] = $data['nama_admin'];
		// alihkan ke halaman dashboard pegawai
		header("location:index.php?page=penyedia/home.php");
	}else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	echo '<script>alert("Email dan Password SALAH!")</script>';
	// echo '<script>window.location="login.php"</script>';
}

?>