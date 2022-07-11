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
                    <h1 style="margin:2% 0% 2% 0%">Log Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h4 text-align="left">Riwayat Barang</h4>
                                <p>Riwayat keluar masuk data barang</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Barang</th>
                                            <th>Nama</th>
                                            <th>Stok</th>
                                            <th>Waktu Eksekusi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,'SELECT * FROM log LEFT JOIN barang USING(id_barang) ORDER BY id_log DESC');
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['id_barang']?></td>
                                            <td><?php echo $row['nama_barang']?></td>
                                            <td><?php echo $row['jumlah_barang']?></td>
                                            <td><?php echo $row['updated_at']?></td>    
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