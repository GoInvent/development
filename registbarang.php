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
                                    <select name="id_komoditi" class="form-control" required>
                                        <option value="">--Pilih Kategori--</option>
                                        <?php 
                                            include 'database.php';
                                            $komoditi = mysqli_query($koneksi, "SELECT * FROM komoditi ORDER BY id_komoditi DESC");
                                            while ($r = mysqli_fetch_array($komoditi)) {
                                        ?> 
                                            <option value="<?php echo $r['id_komoditi'] ?>"><?php echo $r['jenis_komoditi'] ?></option>
                                        <?php } ?>
                                    </select>
										<label for="floatingInput">Kategori</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Nama Barang</label>
									</div>
                                    <div class="form-floating mb-3">
										<input type="number" name="volume_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Volume</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Harga</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Stok</label>
									</div>
                                    <div class="form-floating mb-3">
										<input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Tahun</label>
									</div>
                                    <div class="form-floating mb-3">
										<input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">No.Kontrak</label>
									</div>
									<input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                </form>
                                <?php
                                // Check If form submitted, insert form data into users table.
                                if(isset($_POST['submit'])) {
                                    $idbarang = $_POST['id_barang'];
                                    $kategori = $_POST['id_komoditi'];
                                    $namabarang = $_POST['nama_barang'];
                                    $volume = $_POST['volume_barang'];
                                    $harga = $_POST['harga_barang'];
                                    $stok = $_POST['jumlah_barang'];
                                    $tahun = $_POST['tahun_produksi'];
                                    $nokontrak = $_POST['no_kontrak'];
                                    
                                    // include database connection file
                                    include_once("database.php");
                                            
                                    // Insert user data into table
                                    $result = mysqli_query($koneksi, "INSERT INTO barang (id_barang,id_komoditi,nama_barang, volume_barang, harga_barang, jumlah_barang, tahun_produksi, no_kontrak) VALUES('$idbarang','$kategori','$namabarang','$volume','$harga','$stok','$tahun','$nokontrak')");
                                    
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