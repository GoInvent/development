<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user']:false;

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

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <h1 class="mb-0 fw-bold">Dashboard</h1> 
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex">
                                <div style="margin-bottom:20px;">
                                    <h4>Daftar barang di Gudang</h4>
                                    <p>Semua informasi data barang ter-tracking secara otomatis</p>
                                </div>
                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0" style="text-align: center; color:white;">No</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">ID Barang</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">Jenis Komoditi</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">Nama Barang</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">Jumlah Barang</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">No Kontrak</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">Tanggal Masuk Barang</th>
                                            <th class="border-top-0" style="text-align: center; color:white;">Tanggal Perbaruan Barang</th>
                                            <th class="border-top-0" style="text-align:center; color:white;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                include 'database.php';

                                                $no = 1;
                                                $sql = mysqli_query($koneksi,"SELECT * FROM barang LEFT JOIN komoditi USING(id_komoditi)");
                                                if (mysqli_num_rows($sql) > 0 ) {
                                                while ($row = mysqli_fetch_array($sql)){
                                            ?>
                                                <tr>
                                                <td style="text-align:center";><?php echo $no++ ?></td>
                                                <td style="text-align:center";><?php echo $row['id_barang']?></td>
                                                <td style="text-align:center";><?php echo $row['jenis_komoditi']?></td>
                                                <td style="text-align:center";><?php echo $row['nama_barang']?></td>
                                                <td style="text-align:center";><?php echo $row['jumlah_barang']?></td>
                                                <td style="text-align:center";><?php echo $row['no_kontrak']?></td>
                                                <td style="text-align:center";><?php echo $row['created_at']?></td>
                                                <td style="text-align:center";><?php echo $row['updated_at']?></td>
                                                <div>
                                                    <td style="text-align:center";>
                                                        <a class="btn btn-success" href="<?php echo BASE_URL."index.php?page=user/penyedia/tambah_barang.php&id_barang=$row[id_barang]" ?>">Tambah Barang</a>
                                                        <a class="btn btn-info" style="color:white;" href="#">Lihat Detail</a>
                                                    </td>
                                                </div>
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