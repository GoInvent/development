<?php 
    include 'database.php';
    include_once("helper.php");


    date_default_timezone_set('Asia/Jakarta');

    $nama_user = $_POST['nama_user'];
    $email = $_POST['email_user'];
    $password = $_POST['password_user'];
    $re_password = $_POST['re_password_user'];
    $role = "user";
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    mysqli_query($koneksi, "INSERT INTO users(nama_user, email_user, password, re_password, created_at, updated_at, role )
                VALUES('$nama_user', '$email', '$password', '$re_password', '$created_at', '$updated_at','$role')");

    header("location:login.php");