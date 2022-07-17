<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'database.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM users WHERE email_user='$email' AND password_user='$password'");
// $login_user =  mysqli_query($koneksi,"SELECT * FROM users WHERE email_user='$email' AND password_user='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
	$_SESSION['email_user'] = $email;
    $_SESSION['nama_user'] = $data['nama_user'];
    $_SESSION['no_hp'] = $data['no_hp'];
    $_SESSION['id_user'] = $data['id_user'];
    $iduser = $_SESSION['id_user'];
    $_SESSION['login'] = 1;
    $_SESSION['role'] = "User";
    $result = mysqli_query($koneksi, "UPDATE users SET last_login = NOW() WHERE id_user = $iduser");
    
    header("location:index.php?page=user/home.php");
}else{
	echo '<script>alert("Email dan Password SALAH!")</script>';
    echo '<script>window.location="login-user.php"</script>';
}

?>