<?php 

include 'database.php';
include_once('helper.php');

$id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

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
                    <h1 text-align="center" style="margin:2% 0% 2% 0%;">List Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                    
                                <h4>Daftar barang di Gudang</h4>
                                <p>Semua informasi data barang ter-tracking secara otomatis</p>
                                
                                <!-- Laman untuk melihat informasi menyeluruh barang yang ada digudang -->
                            
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th style="color:white; text-align:center;">No.</th>
                                            <th style="color:white; text-align:center;">ID Barang</th>
                                            <th style="color:white; text-align:center;">Nama Penyedia</th>
                                            <th style="color:white; text-align:center;">Gudang</th>
                                            <th style="color:white; text-align:center;">Jenis Bekal</th>
                                            <!-- <th style="color:white; text-align:center;">Nama</th> -->
                                            <th style="color:white; text-align:center;">Harga</th>
                                            <th style="color:white; text-align:center;">Stok</th>
                                            <th style="color:white; text-align:center;">Tahun</th>
                                            <th style="color:white; text-align:center;">No.Kontrak</th>
                                            <th style="color:white; text-align:center;">Status</th>
                                            <th style="color:white; text-align:center;">Tanggal Approve</th>
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
                                                <td style="text-align:center"><?php echo $no++ ?></td>
                                                <td style="text-align:center"><?php echo $row['id_barang']?></td>
                                                <td style="text-align:center"><?php echo $row['nama_penyedia']?></td>
                                                <td style="text-align:center"><?php echo $row['nama_gudang']?></td>
                                                <td style="text-align:center"><?php echo $row['kelas_bekal']?></td>
                                                <!-- <td style="text-align:center"><?php echo $row['nama_bekal']?></td> -->
                                                <td style="text-align:center"><?php echo rupiah($row['harga_bekal'])?></td>
                                                <td style="text-align:center"><?php echo $row['jumlah_bekal']?></td>
                                                <td style="text-align:center"><?php echo $row['tahun_produksi']?></td>
                                                <td style="text-align:center"><?php echo $row['no_kontrak']?></td>
                                                <td style="text-align:center"><?php echo ($row['status_barang'] == 0)?'Pending':'Approved'; ?></td>
                                                <td style="text-align:center"><?php echo $row['created_at']?></td>
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
</body>

</html>