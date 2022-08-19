<?php
    include 'database.php';
    include_once('helper.php');
    // include_once('data_controller.php');
    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

    if ($id_request){
        $sql_pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan LEFT JOIN komoditi ON komoditi.id_komoditi = pemasukan.id_komoditi WHERE id_request = '".$_GET['id_request']."'");
        $row = mysqli_fetch_assoc($sql_pemasukan);
       
        $nama_penyedia = $row['nama_penyedia'];
        $komoditi = $row['id_komoditi'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $nama_bekal = $row['nama_bekal'];
        $id_admin = $row['id_admin'];
        $jumlah_bekal = $row['jumlah_bekal'];
        $harga_bekal = $row['harga_bekal'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request = $row['tgl_request'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $no_kontrak = rand();
        $rfid = $row['id_barang'];
    }
        // $data     = new DataController();
        // $penyedia = $data->getPenyedia();

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

                                    <!-- <?php if($rfid != NULL):?>
                                        <div class="form-floating mb-3">
                                            <input name="id_barang" class="form-control" id="getUID" placeholder="" value = <?php echo $rfid?> readonly>
                                            <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-floating mb-3">
                                            <input name="id_barang" class="form-control" id="getUID" placeholder=" " >
                                            <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                        </div>
                                    <?php endif;?>   -->

                                    <div class="form-floating mb-3">
                                        <select name="id_penyedia" id="penyedia" class="form-control" required>
                                            <option id="penyedia" readonly value="">--Pilih Penyedia--</option>
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
                                            <option value="">--Pilih Jenis Bekal--</option>
                                        </select>
                                        <label for="floatingInput">Nama Bekal</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="harga_barang" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $harga_bekal ?> readonly>
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $jumlah_bekal ?> readonly>
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
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/ajukan_bekal/insert_barang.php" ?>" method="post">
                                    <!-- <div class="form-floating mb-3">
                                        <input type="number" name="id_barang" class="form-control" id="getUID" placeholder=" " required>
                                        <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                    </div> -->
                                    
                                    <!-- ambil data nilai penyedia barang -->
                                    <div class="form-floating mb-3">
                                        <select id="id_penyedia" name="id_penyedia" class="form-control select2" required>
                                            <option readonly value="">--Pilih Penyedia--</option>
                                            
                                            <?php 
                                                include 'database.php';
                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM penyedia_barang");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?>
                                                <option value="<?php echo $r['id_penyedia'] ?>"><?php echo $r['nama_penyedia'] ?></option>
                                            <?php }?>
                                        </select>
                                        <label for="floatingInput">Penyedia</label>
                                    </div>
                                    
                                    <!-- dilakukan inner join dengan pada tb bekal penyedia dengan penyedia barang. -->

                                    <div class="form-floating mb-3">
                                        <select id="kategori_bekal" name="kategori_bekal" class="form-control select2" onchange="getSelectValue();">
                                            <option>--Kategori Bekal--</option>
                                        </select>
                                        <label for="floatingInput">Kategori Bekal</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select id="jenis_bekal" name="jenis_bekal" class="form-control select2">
                                            <option>--Pilih jenis Bekal--</option>
                                            <?php 
                                                include 'database.php';

                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM bekal_penyedia");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?>
                                                <option value="<?php echo $r['nama_bekal'] ?>"><?php echo $r['nama_bekal'] ?></option>
                                            <?php }?> 
                                        </select>
                                        <label for="floatingInput">Nama Bekal</label>
                                    </div>
                                    
                                     <!-- dilakukan inner join dengan pada tb bekal penyedia dengan penyedia barang. -->
                                    <!-- <div class="form-floating mb-3">
                                        <select id="jenis_bekal" name="jenis_bekal" class="form-control select2">
                                            <option>--Pilih Bekal--</option>
                                        </select>
                                        <label for="floatingInput">Jenis Bekal</label>
                                    </div> -->

                                    <!-- jika kelas bekal, ada di kelas bekal 1 maka tampilkan menu date exp -->
                                    
                                    <div id="exp_date" class="form-floating mb-3 show">
                                        <input type="date" id="exp_date" name="exp_date" class="form-control" id="harga_bekal" placeholder=" " required>
                                        <label for="floatingInput">Tanggal Kadaluarsa</label>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input type="number" name="harga_bekal" class="form-control" id="harga_bekal" placeholder=" " required>
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="jumlah_bekal" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Stok</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Tahun</label>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <select name="gudang_nama" id="gudang_nama" class="form-control">
                                            <option value="Dopusbekbar">Wilayah Barat</option>
                                            <option value="Dopusbektim">Wilayah Timur</option>
                                        </select>
                                        <label for="floatingInput">Gudang Penyimpanan</label>
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

    <script>
        $(document).ready(function(){
            $('#id_penyedia').on('change', function(){
                var id_penyedia = $(this).val();

                $.ajax({
                    url : '<?php echo BASE_URL."disbekal/ajukan_bekal/data_controller.php"?>',
                    type : "POST",
                    data: {
                        modul:'kategori_bekal',
                        id_penyedia: id_penyedia,
                    },
                    success: function(respond){
                        console.log(id_penyedia)
                        $('#kategori_bekal').html(respond)
                    },
                    error:function(){
                        alert("Gagal mengambil data")
                    }
                })
            })
        });
    </script>


    <script>
        function getSelectValue(){
            var selectedValue = document.getElementById("kategori_bekal").value;
            var id_penyedia = document.getElementById("id_penyedia").value;
            
            if(selectedValue == "BK.1"){
                console.log('test')
                $('#exp_date').removeClass('show')

                $.ajax({
                    url : '<?php echo BASE_URL."disbekal/ajukan_bekal/data_controller2.php"?>',
                    type : "POST",
                    data: {
                        modul:'jenis_bekal',
                        id_penyedia : id_penyedia,
                        kelas_bekal: selectedValue,
                    },
                    success: function(respond){
                        console.log(jenis_bekal)
                        console.log(id_penyedia)
                        $('#jenis_bekal').html(respond)
                    },
                    error:function(){
                        alert("Gagal mengambil data")
                    }
                })

            } else {
                console.log('test2')
                $('#exp_date').addClass('show')

                $.ajax({
                    url : '<?php echo BASE_URL."disbekal/ajukan_bekal/data_controller2.php"?>',
                    type : "POST",
                    data: {
                        modul:'jenis_bekal',
                        id_penyedia : id_penyedia,
                        kelas_bekal: selectedValue,
                    },
                    success: function(respond){
                        console.log(jenis_bekal)
                        console.log(id_penyedia)
                        $('#jenis_bekal').html(respond)
                    },
                    error:function(){
                        alert("Gagal mengambil data")
                    }
                })

            } 
        }
    </script>
</body>

</html>