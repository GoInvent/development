<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

$id_barang = isset($_GET['id']) ? $_GET['id'] : false;

$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_perhalaman = 5;
$mulai_dari = ($pagination -1)* $data_perhalaman;

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
                                            <th class="border-top-0;" style="color:white;text-align:center;">No</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Nama User</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Kategori</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Jumlah</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Harga</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Tahun</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">No. Kontrak</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Tanggal Permintaan</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Status</th>
                                            <th class="border-top-0;" style="color:white;text-align:center;">Persetujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM pengeluaran ORDER BY id_kirim DESC LIMIT $mulai_dari, $data_perhalaman");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td style="text-align:center"><?php echo $no++ ?></td>
                                            <td style="text-align:center"><?php echo $row['nama_user']?></td>
                                            <td style="text-align:center"><?php echo $row['kelas_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['jumlah_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['harga_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['tahun_produksi']?></td>
                                            <td style="text-align:center"><?php echo $row['no_kontrak']?></td>
                                            <td style="text-align:center"><?php echo $row['tgl_request']?></td>
                                            <td style="text-align:center"><?php echo ($row['status_request'] == 0)?'Processed':'Sent'; ?></td>
                                            <td style="text-align:center">
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
                                
                                <?php 
                                    $sqlPagination = mysqli_query($koneksi,"SELECT * FROM pengeluaran ORDER BY id_kirim DESC");
                                    pagination($sqlPagination, $data_perhalaman, $pagination, "index.php?page=disbekal/pengeluaran.php")
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