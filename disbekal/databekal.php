<?php 

include 'database.php';
include_once('helper.php');

// $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
// $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

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
                    <h1 text-align="center" style="margin:2% 0% 2% 0%;">List kategori</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                    
                                <h4>Daftar barang bekal</h4>
                                
                                <!-- Laman untuk melihat informasi menyeluruh barang yang ada digudang -->
                                <a href="<?php echo BASE_URL."index.php?page=disbekal/tambah_kategori_bekal.php" ?>" class="btn btn-info" style="margin:5px 0px 15px 0px;color:white;">Tambah Kategori Bekal</a>

                                <table class="table mb-0 table-hover align-middle text-nowrap">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th style="color:white; text-align:center;">No.</th>
                                            <th style="color:white; text-align:center;">Kategori bekal</th>
                                            <th style="color:white; text-align:center;">Kelas Bekal</th>
                                            <th style="color:white; text-align:center;">Tanggal dibuat</th>
                                            <th style="color:white; text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include 'database.php';
                                            $no = 1;
                                            $sql = mysqli_query($koneksi,"SELECT * FROM kategori_bekal");
                                            if (mysqli_num_rows($sql) > 0 ) {
                                            while ($row = mysqli_fetch_array($sql)){
                                        ?>
                                            <tr>
                                            <td style="text-align:center"><?php echo $no++ ?></td>
                                            <td style="text-align:center"><?php echo $row['nama_kategori_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['kelas_bekal']?></td>
                                            <td style="text-align:center"><?php echo $row['created_at']?></td>
                                            <td style="text-align:center"><a class="btn btn-success" href="index.php?page=updatebekal.php&id=<?php echo $row['id_kategori'] ?>">Edit</a> 
                                            <a class="btn btn-danger" onclick="return confirm('Ingin Hapus?')" href="proseshapus.php?id_bekal=<?php echo $row['id_kategori'] ?>">Delete</a>
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
</body>

</html>