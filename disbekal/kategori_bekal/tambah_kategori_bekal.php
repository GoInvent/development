<?php
    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;

?>

<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%">Registrasi Bekal Kategori</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4>Tambah Kategori Bekal</h4>
                            <p>Laman registrasi kategori bekal</p>
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/kategori_bekal/insert_tambah_bekal.php" ?>" method="POST">
                                    
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_kategori_bekal" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Nama Kategori Bekal</label>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input type="text" name="kelas_bekal" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">ID Kelas Bekal</label>
                                        <small>ex: BK.1</small>
                                    </div>
                                    <input type="submit" name="submit" value="Simpan" style="margin-top:10px;" class="btn btn-success">
                                </form>
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