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
                        <h1 text-align="center" style="margin:2% 0% 2% 0%">Registrasi Barang</h1>
                        <div class="card">
                            <div class="card-body">
                                <h4>Input data barang</h4>
                                <p>Pendataan barang sebelum masuk gudang</p>
								<form class="" action="" method="post">
                                <div class="form-floating mb-3">
										<input name="id_admin" class="form-control" id="id_admin" placeholder=" " value="<?php echo $_SESSION['id_admin'] ?>" required disabled>
										<label for="id_admin">ID Admin</label>
									</div>
                                    <div class="form-floating mb-3">
										<input name="nama_penyedia" class="form-control" id="nama_penyedia" placeholder=" " value="<?php echo $_SESSION['nama_admin'] ?>" required disabled>
										<label for="nama_penyedia">Nama</label>
									</div>
									<div class="form-floating mb-3">
										<input name="role" class="form-control" id="role" placeholder=" " value="<?php echo $_SESSION['role']?>" required disabled>
										<label for="role">Role</label>
									</div>
                                    <!-- <div class="form-floating mb-3">
										<input name="notelp" class="form-control" id="notelp" placeholder=" " value="<?php echo $_SESSION['email']?>" required disabled>
										<label for="notelp">Notelp</label>
									</div> -->
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
									<input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                </form>
                                <?php
                                // Check If form submitted, insert form data into users table.
                                if(isset($_POST['submit'])) {
                                    $idadmin        = $_POST['id_admin'] = $_SESSION['id_admin'];
                                    $namaadmin      = $_POST['nama_admin'] = $_SESSION['nama_admin'];
                                    $roleadmin      = $_POST['role'] = $_SESSION['role'];
                                    $kategori       = $_POST['id_komoditi'];    
                                    $namabarang     = $_POST['nama_barang'];
                                    $stok           = $_POST['jumlah_barang'];
                                    $harga          = $_POST['harga_barang'];
                                    $tahun          = $_POST['tahun_produksi'];
                                    
                                    // include database connection file
                                    include_once("database.php");
                                            
                                    // Insert user data into table
                                    $result = mysqli_query($koneksi, "INSERT INTO pemasukan (id_admin, nama_penyedia, role,id_komoditi,nama_barang ,jumlah_barang,harga_barang, tahun_produksi, status_request) VALUES('$idadmin','$namaadmin','$roleadmin','$kategori','$namabarang','$stok','$harga','$tahun',0)");

                                    
                                    if ($result){
                                        //jika data berhasil disimpan
                                        echo '<script>alert("Simpan data Berhasil")</script>';
                                        echo '<script>window.location="index.php?page=penyedia/databarang.php"</script>';
                                    }else{
                                        echo 'gagal'.mysqli_error($koneksi);
                                    }
                                    header("Location: index.php?page=penyedia/registbarang.php");
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