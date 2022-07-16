<?php 
    include 'database.php';
    include_once("helper.php");


    date_default_timezone_set('Asia/Jakarta');

    $nama = $_POST['nama_user'];
    $notelp = $_POST['no_hp'];
    $email = $_POST['email_user'];
    $password = $_POST['password_user'];
    $role = "User";

    $register = mysqli_query($koneksi, "INSERT INTO users(nama_user, no_hp, email_user, password_user, role)
                VALUES('$nama','$notelp', '$email', '$password','$role')");
    // Now we check if the data was submitted, isset() function will check if the data exists.
    $cek_email = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM users WHERE email_user = '$email'"));
    if ($cek_email>0) {
        // Could not get the data that should have been sent.
        echo '<script>alert("Email sudah terdaftar")</script>';
        echo '<script>window.location="register.php"</script>';
    }else {
        echo '<script>window.location="login-user.php"</script>';
    }
?>