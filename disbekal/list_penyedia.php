<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

$id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;

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
                    <h1 class="mb-0 fw-bold">Daftar Penyedia</h1> 
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
                                    <h4 class="card-title">Penyedia pemasokan bekal</h4>
                                    <p>Daftar penyedia yang terdaftar</p>
                                </div>
                            </div>
                            <!-- title -->
                            <a href="<?php echo BASE_URL."index.php?page=disbekal/regist_penyedia.php" ?>" class="btn btn-info" style="margin:5px 0px 15px 0px;color:white;">Daftarkan Penyedia</a>
                
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0" style="color:white; text-align:center;">No</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">ID Penyedia</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Nama Penyedia</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Email Penyedia</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Tanggal Terdafrtar</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Detail Penyedia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            include 'database.php';

                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM penyedia_barang");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td style="text-align:center"><?php echo $no++ ?></td>
                                            <td style="text-align:center"><?php echo $row['id_penyedia']?></td>
                                            <td style="text-align:center"><?php echo $row['nama_penyedia']?></td>
                                            <td style="text-align:center"><?php echo $row['email_penyedia']?></td>
                                            <td style="text-align:center"><?php echo $row['tanggal_terdaftar']?></td>
                                            <td style="text-align:center">
                                                <a class="btn btn-success" href="<?php echo BASE_URL."index.php?page=disbekal/detail_penyedia.php&id_penyedia=$row[id_penyedia]" ?>">Lihat Detail</a>
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