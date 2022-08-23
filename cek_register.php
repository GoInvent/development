<?php 
    include 'database.php';
    include_once("helper.php");


    date_default_timezone_set('Asia/Jakarta');

    $nama = $_POST['nama_user'];
    $alamat = $_POST['alamat_user'];
    $notelp = $_POST['no_hp'];
    $email = $_POST['email_user'];
    $password = $_POST['password_user'];
    $role = "User";

    $cek_email = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM users WHERE email_user = '$email'"));
    
    if ($cek_email>0) {
        // Could not get the data that should have been sent.
        echo '<script>alert("Email sudah terdaftar")</script>';
        echo '<script>window.location="register.php"</script>';
    }else {
        $register = mysqli_query($koneksi, "INSERT INTO users(nama_user,alamat_user, no_hp, email_user, password_user, role)
                VALUES('$nama','$alamat','$notelp', '$email', '$password','$role')");
        echo '<script>alert("Registrasi Berhasil")</script>';
        echo '<script>window.location="login-user.php"</script>';
    }
?>