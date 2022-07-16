<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);
	require 'database.php';
	// cek apakah yang mengakses halaman ini sudah login	
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
<script src="https://kit.fontawesome.com/64c79ef594.js" crossorigin="anonymous"></script>
</head>

<body>
        <div class="page-wrapper">
            <div class="container-fluid">
                                        <tbody>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h1 align="center">Request Barang</h1>
                                                        <form class="" method="post">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" name="id_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->id_barang ?>" required disabled>
                                                                <label for="floatingInput">ID Barang</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <select name="id_komoditi" class="form-control" required disabled> 
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
                                                                <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->nama_barang ?>" required disabled>
                                                                <label for="floatingInput">Nama Barang</label>
                                                            </div> 
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->harga_barang ?>" required disabled>
                                                                <label for="floatingInput">Harga</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->jumlah_barang ?>"required> 
                                                                <label for="floatingInput">Stok</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->tahun_produksi ?>"required disabled>
                                                                <label for="floatingInput">Tahun</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $p->no_kontrak ?>"required disabled>
                                                                <label for="floatingInput">No Kontrak</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <select class="form-control" name="status_barang" required readonly>
                                                                    <option value="">--Pilih--</option>
                                                                    <option value="1" <?php echo ($p->status_barang == 1)?'selected':'';?>>Approved</option>
                                                                    <option value="0" <?php echo ($p->status_barang == 0)?'selected':'';?>>Pending</option>
                                                                </select>
                                                            </div>
                                                            <input type="submit" name="submit" value="Request" class="btn btn-success">
                                                        </form>
                                        <?php
                                            // Check If form submitted, insert form data into users table.
                                            if(isset($_POST['submit'])) {
                                                $kategori   = $_POST['id_komoditi'];
                                                $namabarang = $_POST['nama_barang'];
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
                                                            harga_barang    = '".$harga."', 
                                                            jumlah_barang   = '".$stok."',
                                                            tahun_produksi  = '".$tahun."',
                                                            no_kontrak      = '".$nokontrak."',
                                                            status_barang   = '".$status."'
                                                            WHERE id_barang = '".$p->id_barang."'");
                                                
                                                if ($update){
                                                    //jika data berhasil disimpan
                                                    echo '<script>alert("Ubah data Berhasil")</script>';
                                                    if ($_SESSION['role'] == "Disbekal"){
                                                        echo '<script>window.location="index.php?page=disbekal/databarang.php"</script>';
                                                    } elseif ($_SESSION['role'] == "Kadopus"){
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