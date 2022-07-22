<?php 
    include_once('helper.php');
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
    

?>

<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%;">List Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h4>Riwayat barang di Gudang</h4>
                                <p>Semua informasi data keluar masuk barang ter-tracking secara otomatis</p>
                                <table class="table">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th style="color:white; text-align:center;">No.</th>
                                            <th style="color:white; text-align:center;">ID Barang</th>
                                            <th style="color:white; text-align:center;">Kategori</th>
                                            <th style="color:white; text-align:center;">Nama</th>
                                            <th style="color:white; text-align:center;">Harga</th>
                                            <th style="color:white; text-align:center;">Stok</th>
                                            <th style="color:white; text-align:center;">Tahun</th>
                                            <th style="color:white; text-align:center;">No.Kontrak</th>
                                            <th style="color:white; text-align:center;">Status</th>
                                            <!-- <th>Tambah Barang</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,'SELECT * FROM pemasukan LEFT JOIN komoditi USING(id_komoditi) ORDER BY id_barang DESC');
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td style="text-align:center;"><?php echo $no++ ?></td>
                                            <td style="text-align:center;">
                                                <?php 
                                                    if($row['id_barang'] == NULL){
                                                        echo 'menunggu verifikasi';
                                                    }else{
                                                        echo $row['id_barang'];
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align:center;"><?php echo $row['jenis_komoditi']?></td>
                                            <td style="text-align:center;"><?php echo $row['nama_barang']?></td>
                                            <td style="text-align:center;"><?php echo rupiah ($row['harga_barang'])?></td>
                                            <td style="text-align:center;"><?php echo $row['jumlah_barang']?></td>
                                            <td style="text-align:center;"><?php echo $row['tahun_produksi']?></td>
                                            <td style="text-align:center;">
                                                <?php 
                                                 if($row['no_kontrak'] == 0){
                                                    echo 'belum tersedia';
                                                 }else{
                                                    echo $row['no_kontrak'];
                                                 }
                                                ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php 
                                                    if($row['status_request'] == 0){
                                                        echo 'menunggu verifikasi';
                                                    }else{
                                                        echo 'terverifikasi';
                                                    }
                                                ?>
                                            </td>
                                            <!-- <td><a class="btn btn-success" href="<?php echo BASE_URL."index.php?page=penyedia/tambah_barang.php&id_barang=$row[id_barang]" ?>">Tambah Barang</a> -->
                                            </tr>
                                        <?php }
                                        }else { ?>
                                            <tr>
                                                <td colspan="9">Data belum terverifikasi</td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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