<?php 

include 'database.php';
include_once('helper.php');

$id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_perhalaman = 5;
$mulai_dari = ($pagination -1)* $data_perhalaman;

?>

<body>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%;">Riwayat Bekal</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                    
                                <h4>Daftar riwayat bekal</h4>
                                <p>Semua informasi data riwayat kelaur masuk bekal di gudang</p>
                                
                                <!-- Laman untuk melihat informasi menyeluruh barang yang ada digudang -->
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th style="color:white; text-align:center;">No.</th>
                                            <th style="color:white; text-align:center;">ID Barang</th>
                                            <th style="color:white; text-align:center;">Nama Penyedia</th>
                                            <th style="color:white; text-align:center;">Jenis Bekal</th>
                                            <th style="color:white; text-align:center;">Gudang</th>
                                            <th style="color:white; text-align:center;">Stok</th>
                                            <th style="color:white; text-align:center;">No.Kontrak</th>
                                            <th style="color:white; text-align:center;">Status</th>
                                            <th style="color:white; text-align:center;">Tanggal Persetujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM log");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                                <td style="text-align:center"><?php echo $no++ ?></td>
                                                <td style="text-align:center"><?php echo $row['id_barang']?></td>
                                                <td style="text-align:center"><?php echo $row['nama_penyedia']?></td>
                                                <td style="text-align:center"><?php echo $row['jenis_bekal']?></td>
                                                <td style="text-align:center"><?php echo $row['nama_gudang']?></td>
                                                <td style="text-align:center"><?php echo $row['stok_bekal']?></td>
                                                <td style="text-align:center"><?php echo $row['no_kontrak']?></td>
                                                <td style="text-align:center"><?php echo $row['riwayat_status']?></td>
                                                <td style="text-align:center"><?php echo $row['tanggal_persetujuan']?></td>
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
                                    $sqlPagination = mysqli_query($koneksi,"SELECT * FROM log");
                                    pagination($sqlPagination, $data_perhalaman, $pagination, "index.php?page=disbekal/databarang.php")
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
</body>

</html>