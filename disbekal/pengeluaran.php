<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

$id_barang = isset($_GET['id']) ? $_GET['id'] : false;

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
                    <h1 class="mb-0 fw-bold">Persediaan Barang</h1> 
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
                                <div>
                                    <h4 class="card-title">Pengeluaran Bekal</h4>
                                    <p>Daftar Permintaan Bekal Keluar</p>
                                </div>
                            </div>
                            <!-- title -->
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap" >
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0;" style="color:white;">No</th>
                                            <th class="border-top-0;" style="color:white;">Nama User</th>
                                            <th class="border-top-0;" style="color:white;">Kategori</th>
                                            <th class="border-top-0;" style="color:white;">Jumlah</th>
                                            <th class="border-top-0;" style="color:white;">Harga</th>
                                            <th class="border-top-0;" style="color:white;">Tahun</th>
                                            <th class="border-top-0;" style="color:white;">No. Kontrak</th>
                                            <th class="border-top-0;" style="color:white;">Tanggal Permintaan</th>
                                            <th class="border-top-0;" style="color:white;">Status</th>
                                            <th class="border-top-0;" style="color:white;">Persetujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,'SELECT * FROM pengeluaran LEFT JOIN penyedia_barang ON penyedia_barang.id_penyedia = pengeluaran.id_penyedia ORDER BY id_kirim DESC');
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['nama_penyedia']?></td>
                                            <td><?php echo $row['kelas_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['jumlah_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['harga_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['tahun_produksi']?></td>
                                            <td style="text-align:center"><?php echo $row['no_kontrak']?></td>
                                            <td><?php echo $row['tgl_request']?></td>
                                            <td style="text-align:center"><?php echo ($row['status_request'] == 0)?'Processed':'Sent'; ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL."index.php?page=disbekal/detail_pengeluaran.php&id_kirim=$row[id_kirim]" ?>">Lihat Detail</a>
                                                <!-- <input type="button" name="persetujuan" value="disetujui"> -->
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