<?php
    include_once('helper.php');
    if(isset($_GET['gudang'])){
        $cari = $_GET['gudang'];

        //ambil data dari database, dimana pencarian sesuai dengan variabel cari
        $data = mysqli_query($koneksi, "SELECT * FROM gudang where id_gudang = '$cari'");
		
        }else{

        //tapi jika jurusan belum diset, maka jangan tampilkan apapun
        $data = [];		
    }
?>

<body>
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
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%;">List Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h4>Daftar barang di Gudang</h4>
                                <p>Semua informasi data barang ter-tracking secara otomatis</p>
                                <!-- Filter kategori barang -->
                                <form action="" method="GET" id="form_id" >
                                    <label for="komoditi">Filter by:</label> <br>
                                    <select name="gudang" id="gudang_dropdown"class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-bottom: 10px" onChange="document.getElementById('form_id').submit();">
                                        <option value="">Pilih Gudang</option>
                                        <?php 
                                            include 'database.php';
                                            $gudang = mysqli_query($koneksi, "SELECT * FROM gudang ORDER BY id_gudang ASC");
                                            while ($r = mysqli_fetch_array($gudang)) {
                                        ?> 
                                            <option value="<?php echo $r['id_gudang'] ?>"><?php echo $r['nama_gudang'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- <input type="submit" class= "btn btn-success"> -->
                                </form>
                                <!-- ---------------------- -->
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th style="color:white; text-align:center;">No.</th>
                                            <th style="color:white; text-align:center;">ID Barang</th>
                                            <th style="color:white; text-align:center;">Nama Penyedia</th>
                                            <th style="color:white; text-align:center;">Jenis Bekal</th>
                                            <th style="color:white; text-align:center;">Harga</th>
                                            <th style="color:white; text-align:center;">Stok</th>
                                            <th style="color:white; text-align:center;">Tahun</th>
                                            <th style="color:white; text-align:center;">No.Kontrak</th>
                                            <th style="color:white; text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM barang LEFT JOIN penyedia_barang ON penyedia_barang.id_penyedia = barang.id_penyedia ORDER BY created_at DESC");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $no++ ?></td>
                                                <td style="text-align:center;"><?php echo $row['id_barang']?></td>
                                                <td style="text-align:center;"><?php echo $row['nama_penyedia']?></td>
                                                <td style="text-align:center;"><?php echo $row['kelas_bekal']?></td>
                                                <td style="text-align:center;"><?php echo rupiah ($row['harga_bekal'])?></td>
                                                <td style="text-align:center;"><?php echo $row['jumlah_bekal']?></td>
                                                <td style="text-align:center;"><?php echo $row['tahun_produksi']?></td>
                                                <td style="text-align:center;"><?php echo $row['no_kontrak']?></td>
                                                <td style="text-align:center;"><a class="btn btn-success" href="index.php?page=user/requestbarang.php&id=<?php echo $row['id_barang'] ?>">Request</a>
                                                </td>
                                            </tr>
                                        <?php }
                                        }else { ?>
                                            <tr>
                                                <td colspan="9">Tidak ada data</td>
                                            </tr>
                                        <?php } ?>
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
  
    <script type="text/javascript">
        $(document).ready(function(){
            $("#gudang_dropdown").on('change',function() {
                var value = $(this).val();
                alert(value);
            })
        });
    </script>
    
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