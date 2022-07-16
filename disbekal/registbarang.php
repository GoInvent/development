<?php
    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

    if ($id_request){
        $sql_pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan LEFT JOIN komoditi ON komoditi.id_komoditi = pemasukan.id_komoditi WHERE id_request = '".$_GET['id_request']."'");
        $row = mysqli_fetch_assoc($sql_pemasukan);

        $nama_penyedia = $row['nama_penyedia'];
        $komoditi = $row['id_komoditi'];
        $jenis_komoditi = $row['jenis_komoditi'];
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
                            <?php if($id_request):?>
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/insert_barang.php" ?>" method="POST">
                                    <div class="form-floating mb-3">
                                        <input name="id_barang" class="form-control" id="getUID" placeholder=" ">
                                        <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                    </div>

                                    <!-- <div class="form-floating mb-3">
                                        <input type="text" name="id_komoditi" class="form-control" id="floatingInput" placeholder=""  value = <?php echo $jenis_komoditi ?> required readonly>
                                        <label for="floatingInput">Kategori Barang</label>
                                    </div> -->

                                    <div class="form-floating mb-3">
                                        <select name="id_komoditi" class="form-control" required>
                                            <option readonly value="<?php echo $komoditi ?>"><?php echo $jenis_komoditi ?></option>
                                            <?php 
                                                include 'database.php';
                                                $komoditi = mysqli_query($koneksi, "SELECT * FROM komoditi ORDER BY id_komoditi DESC");
                                                while ($r = mysqli_fetch_array($komoditi)) {
                                            ?> 
                                            <?php if($komoditi != $komoditi)?>
                                                <option value="<?php echo $r['id_komoditi'] ?>"><?php echo $r['jenis_komoditi'] ?></option>
                                            <?php } ?>
                                        </select>
                                            <label for="floatingInput">Kategori</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=""  value = <?php echo $nama_barang ?> required readonly>
                                        <label for="floatingInput">Nama Barang</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $harga_barang ?> readonly>
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $jumlah_barang ?> readonly>
                                        <label for="floatingInput">Stok</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $tahun_produksi ?> readonly>
                                        <label for="floatingInput">Tahun</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " required value=<?php echo $no_kontrak; ?> readonly> 
                                        <label for="floatingInput">No.Kontrak</label>
                                    </div>
                                    <input type="submit" name="submit" value="Setujui Barang" class="btn btn-success">
                                </form>
                            <?php else: ?>
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/insert_barang.php" ?>" method="post">
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
                                        <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " readonly> 
                                        <label for="floatingInput">No.Kontrak</label>
                                    </div>
                                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                </form>
                            <?php endif; ?>
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