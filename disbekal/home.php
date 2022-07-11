<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="mb-0 fw-bold">Peyedian Barang</h1> 
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex">
                                <div>
                                    <h4 class="card-title">Persetujuan Barang</h4>
                                    <p>Informasi permintaan penyediaan barang masuk</p>
                                </div>
                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">ID Penyedia</th>
                                            <th class="border-top-0">Nama Penyedia</th>
                                            <th class="border-top-0">Nama Barang</th>
                                            <th class="border-top-0">Jumlah Barang</th>
                                            <th class="border-top-0">Tanggal Permintaan</th>
                                            <th class="border-top-0">Status Persetujuan</th>
                                            <th class="border-top-0">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,'SELECT * FROM admin ORDER BY id_admin DESC');
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['nama_admin']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo ($row['status']== 0)?'Tidak Aktif':'Aktif'; ?></td>
                                            </tr>
                                        <?php }
                                        }else { ?>
                                            <tr>
                                                <td colspan="9">Tidak ada data</td>
                                            </tr>
                                        <?php } ?> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Flexy Admin. Designed and Developed by <a
                href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
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
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>