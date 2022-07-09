<body>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h1 align="center">Registrasi Barang</h1>
								<form class="" action="registbarang.php" method="post">
									<div class="form-floating mb-3">
										<input name="id_barang" class="form-control" id="getUID" placeholder=" " required>
										<label for="getUID">ID Produk (Scan RFID to display ID)</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Nama Barang</label>
									</div>
									
									<div class="form-floating mb-3">
										<input type="text" name="jenis_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Brand</label>
									</div>
									
									<div class="form-floating mb-3">
										<input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Harga</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Stok</label>
									</div>
									<input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                </form>
                                <?php
                                // Check If form submitted, insert form data into users table.
                                if(isset($_POST['submit'])) {
                                    $idbarang = $_POST['id_barang'];
                                    $namabarang = $_POST['nama_barang'];
                                    $jenis = $_POST['jenis_barang'];
                                    $harga = $_POST['harga_barang'];
                                    $stok = $_POST['jumlah_barang'];
                                    
                                    // include database connection file
                                    include_once("database.php");
                                            
                                    // Insert user data into table
                                    $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,nama_barang,jenis_barang, harga_barang, jumlah_barang) VALUES('$idbarang','$namabarang','$jenis','$harga','$stok')");
                                    
                                    if ($result){
                                        //jika data berhasil disimpan
                                        echo '<script>alert("Simpan data Berhasil")</script>';
                                        echo '<script>window.location="databarang.php"</script>';
                                    }else{
                                        echo 'gagal'.mysqli_error($koneksi);
                                    }
                                    header("Location: index.php?page=databarang.php");
                                }
                                ?>
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