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
	$kategori = mysqli_query($koneksi, "SELECT * FROM kategori_bekal WHERE id_kategori ='".$_GET['id']."' ");
	if(mysqli_num_rows($kategori)==0){
		echo '<script>window.location="databekal.php"</script>';
	}
	$row = mysqli_fetch_object($kategori);

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
                                                    <h1 align="center">Update Bekal</h1>
                                                        <form class="" method="post">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" name="kelas_bekal" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $row->kelas_bekal ?>" required>
                                                                <label for="floatingInput">Jenis Bekal</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" name="nama_kategori_bekal" class="form-control" id="floatingInput" placeholder=" " value="<?php echo $row->nama_kategori_bekal ?>" required>
                                                                <label for="floatingInput">Jenis Bekal</label>
                                                            </div>
                                                            <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                                        </form>
                                        <?php
                                            // Check If form submitted, insert form data into users table.
                                            if(isset($_POST['submit'])) {
                                                $idbekal    = $_POST['kelas_bekal'];
                                                $namabekal   = $_POST['nama_kategori_bekal'];
                                                
                                                
                                                // include database connection file
                                                include 'database.php';
                                                        
                                                // Insert user data into table
                                                $update = mysqli_query($koneksi, "UPDATE kategori_bekal SET
                                                            kelas_bekal             = '".$idbekal."',   
                                                            nama_kategori_bekal     = '".$namabekal."'
                                                            WHERE id_kategori  = '".$row->id_kategori."'");
                                                
                                                if ($update){
                                                    //jika data berhasil disimpan
                                                    echo '<script>alert("Ubah data Berhasil")</script>';
                                                    if ($_SESSION['role'] == "Disbekal"){
                                                        echo '<script>window.location="index.php?page=disbekal/kategori_bekal/databekal.php"</script>';
                                                    } elseif ($_SESSION['role'] == "Kadopus"){
                                                        echo '<script>window.location="index.php?page=kadopus/kategori_bekal/databekal.php"</script>';
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
        </div>
    </div>
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