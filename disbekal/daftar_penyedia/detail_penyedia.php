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
                                <a href="<?php echo BASE_URL."index.php?page=disbekal/daftar_penyedia/barang_penyedia.php&id_penyedia=".$_GET['id_penyedia']."" ?>" class="btn btn-success" style="margin-bottom:10px;">Tambah bekal</a>
                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th class="border-top-0" style="color:white; text-align:center;">No</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Kelas Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Nama Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">ID Bekal</th>
                                            <!-- <th class="border-top-0" style="color:white; text-align:center;">Harga</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Stok Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Tahun</th> -->
                                            <th class="border-top-0" style="color:white; text-align:center;">Gudang</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Riwayat Bekal</th>
                                            <th class="border-top-0" style="color:white; text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM bekal_penyedia LEFT JOIN penyedia_barang USING(id_penyedia) WHERE id_penyedia = '".$_GET['id_penyedia']."'");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td style="text-align:center"><?php echo $no++ ?></td>
                                            <td style="text-align:center"><?php echo $row['kelas_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['nama_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['id_bekal']?></td>
                                            <!-- <td style="text-align:center"><?php echo $row['harga']?></td>
                                            <td style="text-align:center"><?php echo $row['stok_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['tahun']?></td> -->
                                            <td style="text-align:center"><?php echo $row['nama_gudang']?></td>
                                            <td style="text-align:center"><?php echo $row['updated_at']?></td>
                                            <td style="text-align:center">
                                                <a href="<?php echo BASE_URL."index.php?page=disbekal/daftar_penyedia/update_bekal.php&id_penyedia=".$_GET['id_penyedia']."&id_bekal_penyedia=$row[id_bekal_penyedia]" ?>" class="btn btn-warning">Perbarui Bekal</a>
                                                <a href="<?php echo BASE_URL."index.php?page=disbekal/daftar_penyedia/proseshapus.php&id_penyedia=".$_GET['id_penyedia']."&id_bekal_penyedia=$row[id_bekal_penyedia]" ?>" onclick="return confirm('Ingin Hapus?')" class="btn btn-danger">Hapus Bekal</a>
                                                <!-- <a class="btn btn-danger"  href="proseshapus.php?id_bekal_penyedia=<?php echo $row['id_bekal_penyedia'] ?>">Hapus Bekal</a> -->
                                            </td>
                                            <!-- <td style="text-align:center"><a class="btn btn-success" href="index.php?page=updatebekal.php&id=<?php echo $row['id_kategori'] ?>">Edit</a> 
                                            <a class="btn btn-danger" onclick="return confirm('Ingin Hapus?')" href="proseshapus.php?id_bekal_penyedia=<?php echo $row['id_kategori'] ?>">Delete</a>
                                            </td> -->
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