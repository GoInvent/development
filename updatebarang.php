<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

    error_reporting(0);
	session_start();
	require 'database.php';
	// cek apakah yang mengakses halaman ini sudah login
	if(!$_SESSION['role']=="disbekal"){
	header("location:login.php?pesan=gagal");
	}	
	$produk = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='".$_GET['id']."' ");
	if(mysqli_num_rows($produk)==0){
		echo '<script>window.location="databarang.php"</script>';
	}
	$p = mysqli_fetch_object($produk);

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Flexy Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://kit.fontawesome.com/64c79ef594.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
				<ul id="sidebarnav">
                                    <?php if ($_SESSION['role'] == "disbekal") : ?>  <!--session disbekal -->
                                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=disbekal/home.php" aria-expanded="false"><i class="mdi mdi-view-dashboard">
                                        </i><span class="hide-menu">Beranda</span></a></li>
                                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=disbekal/databarang.php" aria-expanded="false"><i class="mdi mdi-account-network"></i>
                                            <span class="hide-menu">Produk</span></a></li>
                                    <?php elseif ($_SESSION['role'] == "kadopus") : ?> <!--session kodapus -->
                                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=kadopus/home.php" aria-expanded="false"><i class="mdi mdi-view-dashboard">
                                        </i><span class="hide-menu">Beranda</span></a></li>
                                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=kadopus/databarang.php" aria-expanded="false"><i class="mdi mdi-account-network"></i>
                                            <span class="hide-menu">Produk</span></a></li> 
                                    <?php endif; ?>
                                    
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=registbarang.php" aria-expanded="false"><i class="mdi mdi-border-all"></i>
                                            <span class="hide-menu">Registrasi Barang</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=pengiriman.php" aria-expanded="false"><i class="fa-solid fa-truck-fast"></i></i>
                                            <span class="hide-menu">Pengiriman</span></a></li>          
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="index.php?page=lihat_data.php" aria-expanded="false"><i class="mdi mdi-file"></i>
                                            <span class="hide-menu">Read RFID</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                                            href="<?php echo BASE_URL."index.php?page=logout.php"?>" onclick="return confirm('Ingin Logout?')"><i class="fa-solid fa-right-from-bracket"></i>
                                            <span class="hide-menu">Logout</span></i></a> 
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                                        <tbody>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h1 align="center">Update Barang</h1>
                                                        <form class="" method="post">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" name="id_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->id_barang ?>" required disabled>
                                                                <label for="floatingInput">Nama Barang</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <select name="id_komoditi" class="form-control" required>
                                                                    <option value="">--Pilih Kategori--</option>
                                                                    <?php 
                                                                        include 'database.php';
                                                                        $komoditi = mysqli_query($koneksi, "SELECT * FROM komoditi ORDER BY id_komoditi DESC");
                                                                        while ($r = mysqli_fetch_array($komoditi)) {
                                                                    ?> 
                                                                        <option value="<?php echo $r['id_komoditi'] ?>" <?php echo ($r['id_komoditi']==$p->id_komoditi)?'selected':''; ?>><?php echo $r['jenis_komoditi'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                    <label for="floatingInput">Kategori</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->nama_barang ?>" required>
                                                                <label for="floatingInput">Nama Barang</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="volume_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->volume_barang ?>" required>
                                                                <label for="floatingInput">Volume</label>
                                                            </div>     
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->harga_barang ?>" required>
                                                                <label for="floatingInput">Harga</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->jumlah_barang ?>"required>
                                                                <label for="floatingInput">Stok</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->tahun_produksi ?>"required>
                                                                <label for="floatingInput">Tahun</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->no_kontrak ?>"required>
                                                                <label for="floatingInput">No Kontrak</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <select class="form-control" name="status_barang">
                                                                    <option value="">--Pilih--</option>
                                                                    <option value="1" <?php echo ($p->status_barang == 1)?'selected':'';?>>Approved</option>
                                                                    <option value="0" <?php echo ($p->status_barang == 0)?'selected':'';?>>Pending</option>
                                                                </select>
                                                            </div>
                                                            <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                                        </form>
                                        <?php
                                            // Check If form submitted, insert form data into users table.
                                            if(isset($_POST['submit'])) {
                                                $kategori   = $_POST['id_komoditi'];
                                                $namabarang = $_POST['nama_barang'];
                                                $volume     = $_POST['volume_barang'];
                                                $harga      = $_POST['harga_barang'];
                                                $stok       = $_POST['jumlah_barang'];
                                                $tahun      = $_POST['tahun_produksi'];
                                                $nokontrak  = $_POST['no_kontrak'];
                                                $status     = $_POST['status_barang'];
                                                
                                                // include database connection file
                                                include 'database.php';
                                                        
                                                // Insert user data into table
                                                $update = mysqli_query($koneksi, "UPDATE barang SET
                                                            id_komoditi     = '".$kategori."',
                                                            nama_barang     = '".$namabarang."',
                                                            volume_barang   = '".$volume."', 
                                                            harga_barang    = '".$harga."', 
                                                            jumlah_barang   = '".$stok."',
                                                            tahun_produksi  = '".$tahun."',
                                                            no_kontrak      = '".$nokontrak."',
                                                            status_barang   = '".$status."'
                                                            WHERE id_barang = '".$p->id_barang."'");
                                                
                                                if ($update){
                                                    //jika data berhasil disimpan
                                                    echo '<script>alert("Ubah data Berhasil")</script>';
                                                    if ($_SESSION['role'] == "disbekal"){
                                                        echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
                                                    } elseif ($_SESSION['role'] == "kadopus"){
                                                        echo '<script>window.location="index.php?page=kadopus/databarang.php"</script>';
                                                    }
                                                }else{
                                                    echo 'gagal'.mysqli_error($koneksi);
                                                }

                                            }
                                            ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
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
</body>

</html>