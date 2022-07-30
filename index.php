<?php
    include_once("helper.php");
    // echo BASE_URL;
    $page = isset($_GET['page']) ? $_GET['page'] : false;
    
    $Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
    file_put_contents('UIDContainer.php',$Write);
    include 'database.php';
    session_start();
    if($_SESSION['login']==0){
		header("location:login.php");
	} else if ($_SESSION['role']=="User"){
        $nama_user = $_SESSION['nama_user'];
        $role = $_SESSION['role'];
    }else if ($_SESSION['role']=="Penyedia"){
        $nama_user = $_SESSION['nama_user'];
        $role = $_SESSION['role'];
    }else {
        $nama_admin = $_SESSION['nama_admin'];
        $role = $_SESSION['role'];
        $id_admin = $_SESSION['id_admin'];
    }
    
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>iLogi - Manage Your Warehouse</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64c79ef594.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="css/style-detail-persetujuan.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <script src="http://cdn.static.w3big.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
		$(document).ready(function(){
				$("#getUID").load("UIDContainer.php");
				setInterval(function() {
				$("#getUID").load("UIDContainer.php");	
		}, 500);
		});
	</script>
    
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                
            <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img src="assets/images/logo.png" alt="homepage" class="dark-logo" />

                            <img src="assets/images/logo.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <img src="assets/images/logo-text-ilogi.png" alt="homepage" class="dark-logo" />
                            <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>
                </div>
                
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                </div>

                <div style="margin:2% 1% 0% 0%;">
                    <?php 
                    if ($_SESSION['role']=="User") {
                       echo "Hi Selamat datang, <b>$nama_user</b>";
                    }else if($_SESSION['role']=="Penyedia"){
                        echo "Hi Selamat datang, <b>$nama_user</b>";
                    }else {
                       echo "Hi Selamat datang, <b>$nama_admin</b>";
                    }
                    
                    ?>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">  
                        <div style="margin-bottom:8%; border:1px solid #DFDFDF; border-radius:5px; padding:8px;">
                            <?php echo "<b>Laman $role</b>"?>
                        </div>
   
                        <?php if ($_SESSION['role'] == "Disbekal") : ?>  <!--session disbekal -->
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL .'index.php?page=disbekal/databarang.php'?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Bekal di Gudang</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL .'index.php?page=disbekal/home.php'?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Pengajuan Bekal</span></a>
                            </li> 
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=disbekal/pengeluaran.php"?>" aria-expanded="false">
                                <i class="fa-solid fa-truck-fast"></i>
                                <span class="hide-menu">Pengeluaran Bekal</span>
                                </a>
                            </li>                        
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=lihat_data.php"?>" aria-expanded="false">
                                <i class="mdi mdi-file"></i>
                                <span class="hide-menu">Read RFID</span></a>
                            </li>
                        <?php elseif ($_SESSION['role'] == "Kadopus") : ?> <!--session kadopus -->
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL .'index.php?page=kadopus/home.php'?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Beranda</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=kadopus/databarang.php"?>" aria-expanded="false">
                                <i class="mdi mdi-account-network"> </i>
                                <span class="hide-menu">Barang</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=kadopus/registbarang.php"?>" aria-expanded="false">
                                <i class="mdi mdi-border-all"></i>
                                <span class="hide-menu">Registrasi Barang</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=kadopus/pengeluaran.php"?>" aria-expanded="false">
                                <i class="fa-solid fa-truck-fast"></i>
                                <span class="hide-menu">Pengeluaran</span>
                                </a>
                            </li>
                        <?php elseif ($_SESSION['role'] == "Penyedia") : ?> <!--session kadopus -->
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL.'index.php?page=user/profile.php'?>" aria-expanded="false">
                                <i class="mdi mdi-border-all"></i>
                                <span class="hide-menu">Profile</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL .'index.php?page=user/home.php'?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Status Daftar Bekal</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL .'index.php?page=user/penyedia/home.php'?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Bekal di Gudang</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=user/penyedia/databarang.php"?>" aria-expanded="false">
                                <i class="mdi mdi-account-network"> </i>
                                <span class="hide-menu">Log Barang</span></a>
                            </li> 
                        <?php elseif ($_SESSION['role'] == "User") : ?> <!--session kadopus -->
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL.'index.php?page=user/profile.php'?>" aria-expanded="false">
                                <i class="mdi mdi-border-all"></i>
                                <span class="hide-menu">Profile</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL .'index.php?page=user/home.php'?>" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Beranda</span></a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=user/databarang.php"?>" aria-expanded="false">
                                <i class="mdi mdi-border-all"></i>
                                <span class="hide-menu">Permintaan Barang</span></a>
                            </li>
                        <?php endif; ?>                            
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo BASE_URL."index.php?page=logout.php"?>" onclick="return confirm('Ingin Logout?')">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="hide-menu">Logout</span></a>
                            </li>        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

    <!-- ============================================================== -->
    <!-- Konten Dinamis -->
    <!-- Semua laman akan terinput disini -->
    <!-- ============================================================== -->
    <div class="content">
        <?php 
            $filename = $page;
            // echo $filename;

            if(file_exists($filename)){
                include_once($filename);
            }else{
                echo "Maaf, laman tidak ditemukan";
            }
        ?>
    </div>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>