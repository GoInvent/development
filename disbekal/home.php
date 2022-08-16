<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

$id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;

// $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
// $data_perhalaman = 5;
// $mulai_dari = ($pagination -1)* $data_perhalaman;

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
                    <h1 class="mb-0 fw-bold">Persediaan Bekal</h1> 
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
                                    <h4 class="card-title">Pemasukan Bekal</h4>
                                    <p>Daftar Permintaan Bekal Masuk</p>
                                </div>
                            </div>
                            <!-- title -->
                            <a href="<?php echo BASE_URL."index.php?page=disbekal/ajukan_bekal/registbarang.php" ?>" class="btn btn-info" style="margin:5px 0px 15px 0px;color:white;">Input Barang</a>
                            <a href="<?php echo BASE_URL."index.php?page=disbekal/daftar_penyedia/list_penyedia.php" ?>" class="btn btn-success" style="margin:5px 0px 15px 0px;color:white;">Daftar Penyedia</a>

                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0" style="color:white; text-align:center;">No</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Nama Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Gudang</th>
                                            <!-- <th class="border-top-0" style="color:white; text-align:center;">Nama Barang</th> -->
                                            <th class="border-top-0" style="color:white; text-align:center;">Jumlah Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Harga</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Tahun</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Tanggal Permintaan</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Status Persetujuan</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Status</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM pemasukan");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td style="text-align:center"><?php echo $no++ ?></td>
                                                <td style="text-align:center"><?php echo $row['nama_kelas'] ?></td>
                                                <td style="text-align:center"><?php echo $row['nama_gudang'] ?></td>
                                                <!-- <td style="text-align:center"><?php echo $row['nama_bekal']?></td> -->
                                                <td style="text-align:center"><?php echo $row['jumlah_bekal']?></td>
                                                <td style="text-align:center"><?php echo rupiah ($row['harga_bekal'])?></td>
                                                <td style="text-align:center"><?php echo $row['tahun_produksi']?></td>
                                                <td><?php echo $row['tgl_request']?></td>
                                                <td style="text-align:center"><?php echo $row['status'] ?></td>
                                                <td style="text-align:center"><?php echo $row['status_request'] ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="<?php echo BASE_URL."index.php?page=disbekal/detail_persetujuan.php&id_request=$row[id_request]" ?>">Setujui Bekal</a>
                                                    <!-- <input type="button" name="persetujuan" value="disetujui"> -->
                                                    <a href="<?php echo BASE_URL."index.php?page=disbekal/reject_bekal/hapus_bekal.php&id_request=$row[id_request]" ?>" class="btn btn-danger" style="text-align:center">Hapus Bekal</a>
                                                </td>
                                                <td>
                                                    
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
                                
                                <?php 
                                    // $sqlPagination = mysqli_query($koneksi,"SELECT * FROM pemasukan LEFT JOIN komoditi USING(id_komoditi)");
                                    // pagination($sqlPagination, $data_perhalaman, $pagination, "index.php?page=disbekal/home.php")
                                ?>

                            </div>
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
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>