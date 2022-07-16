<?php 
	
	session_destroy();
	if($_SESSION['role'] == "User"){
	session_start();
	echo '<script>window.location="login-user.php"</script>';
	}else{
	session_start();
	echo '<script>window.location="login.php"</script>';
	}
?>