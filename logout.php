<?php 
	
	session_destroy();
	
	if($_SESSION['role'] == "User" || $_SESSION['role'] == "Penyedia"){
		session_start();
		echo '<script>window.location="login-user.php"</script>';
	}elseif ($_SESSION['role'] == "Disbekal"){
		session_start();
		echo '<script>window.location="login.php"</script>';
	}
?>