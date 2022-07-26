<?php 
	
	session_destroy();
	if($_SESSION['role'] == "User" || "Penyedia"){
	session_start();
	echo '<script>window.location="login-user.php"</script>';
	}else{
	session_start();
	echo '<script>window.location="login.php"</script>';
	}
?>