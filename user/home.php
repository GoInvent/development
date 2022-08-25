<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

$id_barang = isset($_GET['id']) ? $_GET['id'] : false;
// $produk = mysqli_query($koneksi, "SELECT * FROM barang LEFT JOIN penyedia_barang ON penyedia_barang.id_penyedia = barang.id_penyedia WHERE id_barang ='".$_GET['id']."' ");
// $p = mysqli_fetch_assoc($produk);
include_once('helper.php')

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
                    <h1 class="mb-0 fw-bold">Persediaan Barang</h1> 
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
                                    <h4 class="card-title">Pemasukan Barang</h4>
                                    <p>Daftar Permintaan Barang Masuk</p>
                                </div>
                            </div>
                            <!-- title -->
                            
                            <a href="<?php echo BASE_URL."index.php?page=user/databarang.php"?>" class="btn btn-success" style="margin:5px 0px 15px 0px;color:white;">Ajukan permintaan Bekal di Gudang</a>
                            <a href="#" class="btn btn-primary" style="margin:5px 0px 15px 0px;color:white;">Riwayat Bekal</a>
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead  style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0" style="color:white; text-align:center;">No</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Nama User</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Kategori</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Jumlah Barang</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Harga</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Tahun</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">No. Kontrak</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Tanggal Persetujuan</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Status Persetujuan</th>
                                        </tr>  
                                    </thead>
                                    <tbody>
                                     <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM pengeluaran ORDER BY id_kirim DESC");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td style="text-align:center"><?php echo $no++ ?></td>
                                            <td style="text-align:center"><?php echo $row['nama_user']?></td>
                                            <td style="text-align:center"><?php echo $row['kelas_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['jumlah_bekal']?></td>
                                            <td style="text-align:center"><?php echo rupiah ($row['harga_bekal'])?></td>
                                            <td style="text-align:center"><?php echo $row['tahun_produksi']?></td>
                                            <td style="text-align:center"><?php echo $row['no_kontrak']?></td>
                                            <td style="text-align:center"><?php echo $row['tgl_kirim']?></td>
                                            <td style="text-align:center"><?php echo ($row['status_request']== 0)?'Processed':'Sent'; ?></td>
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