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
        $id_admin = $row['id_admin'];
        $jumlah_barang = $row['jumlah_barang'];
        $harga_barang = $row['harga_barang'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request = $row['tgl_request'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $no_kontrak = rand();
        $rfid = $row['id_barang'];
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
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/ajukan_bekal/insert_barang.php&id_request=$row[id_request]" ?>" method="POST">

                                    <div class="form-floating mb-3">
                                        <input type="text" name="id_admin" class="form-control" id="floatingInput" placeholder=""  value = <?php echo $id_admin ?> required readonly>
                                        <label for="floatingInput">Id Penyedia</label>
                                    </div>

                                    <?php if($rfid != NULL):?>
                                        <div class="form-floating mb-3">
                                            <input name="id_barang" class="form-control" id="getUID" placeholder="" value = <?php echo $rfid?> readonly>
                                            <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-floating mb-3">
                                            <input name="id_barang" class="form-control" id="getUID" placeholder=" " >
                                            <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                        </div>
                                    <?php endif;?>  
                                    <div class="form-floating mb-3">
                                        <select name="id_penyedia" id="penyedia" class="form-control" required>
                                            <option readonly value="">--Pilih Penyedia--</option>
                                            <?php 
                                                include 'database.php';
                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM penyedia_barang ORDER BY id_penyedia DESC");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?> 
                                            <?php if($penyedia != $penyedia)?>
                                                <option value="<?php echo $r['id_penyedia'] ?>"><?php echo $r['nama_penyedia'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingInput">Penyedia</label>
                                    </div>  
                                    <div class="form-floating mb-3">
                                    <select id="kelas_bekal" class="form-control select2">
                                        <option value="">--Pilih Kelas Bekal--</option>
                                    </select>
                                    <label for="floatingInput">Kelas Bekal</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <select id="nama_bekal" class="form-control select2">
                                        <option value="">--Pilih Bekal--</option>
                                    </select>
                                    <label for="floatingInput">Nama Bekal</label>
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
                                        <select id="penyedia" name="id_penyedia" class="form-control select2" required>
                                            <option readonly value="">--Pilih Penyedia--</option>
                                            <?php 
                                                include 'database.php';
                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM penyedia_barang ORDER BY id_penyedia DESC");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?> 
                                            <?php if($penyedia != $penyedia)?>
                                                <option value="<?php echo $r['id_penyedia'] ?>"><?php echo $r['nama_penyedia'] ?></option>
                                            <?php } ?>
                                        </select>
                                            <label for="floatingInput">Penyedia</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select id="bekalpenyedia" name="bekal_penyedia" class="form-control select2" required>
                                            <option readonly value="">--Pilih Bekal--</option>
                                            <?php 
                                                include 'database.php';
                                                $bekalpenyedia = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia INNER JOIN penyedia_barang ON penyedia_barang.id_penyedia = bekal_penyedia.id_penyedia");
                                                while ($r = mysqli_fetch_array($bekalpenyedia)) {
                                            ?> 
                                            <?php if($bekalpenyedia != $bekalpenyedia)?>
                                                <option value="<?php echo $r['id_penyedia'] ?>"><?php echo $r['kelas_bekal'] ?></option>
                                            <?php } ?>
                                        </select>
                                            <label for="floatingInput">Bekal Penyedia</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <select id="kelas_bekal" class="form-control select2">
                                        <option value="">--Pilih Kelas Bekal--</option>
                                    </select>
                                    <label for="floatingInput">Kelas Bekal</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <select id="nama_bekal" class="form-control select2">
                                        <option value="">--Pilih Bekal--</option>
                                    </select>
                                    <label for="floatingInput">Nama Bekal</label>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.chained.min.js"></script>
    <!-- <script>
        $("#penyedia").chained("#bekalpenyedia").;
    </script> -->
    <!-- <script>
            $(document).ready(function() {
                $('.select2').select2()
            });
            $("#penyedia").change(function() {
                var postForm = {
                        'id': document.getElementById("penyedia").value,
                        'op': 1
                };
                $.ajax({
                    type: "POST",
                    url: "http://localhost/ilogi/disbekal/select.php",
                    data: postForm,
                    success: function(data) {
                        $("#kelas_bekal").html(data);
                    }
                });
            });
            $("#kelas_bekal").change(function() {
                var postForm = {
                        'id': document.getElementById("kelas_bekal").value,
                        'op': 2
                };
                $.ajax({
                    type: "POST",
                    url: "http://localhost/ilogi/disbekal/select.php",
                    data: postForm,
                    success: function(data) {
                        $("#nama_bekal").html(data);
                    }
                });
            });
        </script> -->
</body>

</html>