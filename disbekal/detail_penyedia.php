<?php 

include 'database.php';
include_once ('helper.php');

$id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;

if($id_penyedia){
    $query_penyedia = mysqli_query($koneksi,"SELECT * FROM penyedia_barang WHERE id_penyedia = '".$_GET['id_penyedia']."'");    
    $row = mysqli_fetch_assoc($query_penyedia);

    $nama_penyedia = $row['nama_penyedia'];
    $email_penyedia = $row['email_penyedia'];
    $no_penyedia = $row['no_penyedia'];
    $alamat_penyedia = $row['alamat_penyedia'];
}

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
                    <h1 class="mb-0 fw-bold">Detail Penyedia</h1> 
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
                                    <p>Informasi detail penyediaan barang</p>
                                </div>
                            </div>
                            <!-- title -->
                            <div style="border:4px solid;border-radius:7px;"></div>
                            <div style="margin-top:10px;">
                                <h5 style="margin-bottom:20px;">Nama Penyedia  : <?php echo $nama_penyedia ?> </h5>
                                <h5 style="margin-bottom:20px;">Email Penyedia : <?php echo $email_penyedia ?></h5>
                                <h5 style="margin-bottom:20px;">Nomor Penyedia : <?php echo $no_penyedia ?></h5>
                                <h5>Alamat Penyedia : <?php echo $alamat_penyedia ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex">
                                <div>
                                    <h4 class="card-title">Bekal Penyedia</h4>
                                    <p>Informasi detail bekal penyediaan barang</p>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <a href="<?php echo BASE_URL."index.php?page=disbekal/insert_barang_penyedia.php" ?>" class="btn btn-success" style="margin-bottom:10px;">Tambah bekal</a>
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0" style="color:white; text-align:center;">No</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Kategori Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">ID Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Nama Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Stok Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Riwayat Bekal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        
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