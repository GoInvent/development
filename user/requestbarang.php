<?php
    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

    $produk = mysqli_query($koneksi, "SELECT * FROM barang LEFT JOIN komoditi ON komoditi.id_komoditi = barang.id_komoditi WHERE id_barang ='".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
    if ($id_request){
        $barang = mysqli_query($koneksi, "SELECT * FROM barang LEFT JOIN komoditi USING(id_komoditi) ORDER BY id_barang DESC");
        $row = mysqli_fetch_assoc($barang);

        $nama_penyedia = $row['nama_penyedia'];
        $nama_barang = $row['nama_barang'];
        $jumlah_barang = $row['jumlah_barang'];
        $harga_barang = $row['harga_barang'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request = $row['tgl_request'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $no_kontrak = rand();
    }
?>


<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%">Registrasi Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4>Input data barang</h4>
                            <p>Pendataan barang sebelum masuk gudang</p>
                                <form class="" action="" method="POST">
                                <div class="form-floating mb-3">
										<input name="id_admin" class="form-control" id="id_admin" placeholder=" " value="<?php echo $_SESSION['id_user'] ?>" required disabled>
										<label for="id_admin">ID Admin</label>
									</div>
                                    <div class="form-floating mb-3">
										<input name="nama_penyedia" class="form-control" id="nama_penyedia" placeholder=" " value="<?php echo $_SESSION['nama_user'] ?>" required disabled>
										<label for="nama_penyedia">Nama</label>
									</div>
                                    <div class="form-floating mb-3">
										<input name="alamat_user" class="form-control" id="alamat_user" placeholder=" " required>
										<label for="alamat_user">Alamat</label>
									</div>
                                    <div class="form-floating mb-3">
                                        <input name="id_barang" class="form-control" id="getUID" placeholder=" " value ="<?php echo $p->id_barang ?>" required readonly>
                                        <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                    <select name="id_komoditi" class="form-control" required readonly>
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
                                        <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=""  value="<?php echo $p->nama_barang ?>" required readonly>
                                        <label for="floatingInput">Nama Barang</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " required value ="<?php echo $p->harga_barang ?>" readonly>
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" Masukkan Jumlah Barang " required>
                                        <label for="floatingInput">Jumlah Barang</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " required value ="<?php echo $p->tahun_produksi ?>" readonly>
                                        <label for="floatingInput">Tahun</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " required value ="<?php echo $p->no_kontrak ?>" readonly> 
                                        <label for="floatingInput">No.Kontrak</label>
                                    </div>
                                    <input type="submit" name="submit" value="Setujui Barang" class="btn btn-success">
                                </form>
                            <?php
                            // Check If form submitted, insert form data into users table.
                            if(isset($_POST['submit'])) {
                                $iduser         = $_POST['id_user'] = $_SESSION['id_user'];
                                $namauser       = $_POST['nama_user'] = $_SESSION['nama_user'];
                                $alamat         = $_POST['alamat_user'];
                                $idbarang       = $_POST['id_barang'];  
                                $kategori       = $_POST['id_komoditi'];    
                                $namabarang     = $_POST['nama_barang'];
                                $stok           = $_POST['jumlah_barang'];
                                $harga          = $_POST['harga_barang'];
                                $tahun          = $_POST['tahun_produksi'];
                                $nokontrak      = $_POST['no_kontrak'];
                                
                                
                                // include database connection file
                                include_once("database.php");
                                        
                                // Insert user data into table
                                $result = mysqli_query($koneksi, "INSERT INTO pengeluaran (id_user,nama_user,alamat_user,id_barang,id_komoditi,nama_barang ,jumlah_barang,harga_barang, tahun_produksi, no_kontrak) VALUES('$iduser','$namauser','$alamat','$idbarang','$kategori','$namabarang','$stok','$harga','$tahun','$nokontrak')");
                                
                                if ($result){
                                    //jika data berhasil disimpan
                                    echo '<script>alert("Simpan data Berhasil")</script>';
                                    echo '<script>window.location="index.php?page=user/home.php"</script>';
                                }else{
                                    echo 'gagal'.mysqli_error($koneksi);
                                }
                                header("Location: index.php?page=user/databarang.php");
                            }
                            ?>
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