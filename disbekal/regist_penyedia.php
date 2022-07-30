<?php
    include 'database.php';
    include_once('helper.php');

?>

<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%">Registrasi Penyediaan Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4>Input data penyediaan barang</h4>
                            <p>Registrasi penyediaan barang</p>
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/insert_peneydia.php" ?>" method="POST">
                                    
                                    <!-- Generate random -->
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_penyedia" class="form-control" id="floatingInput" placeholder=""  required>
                                        <label for="floatingInput">Nama Penyedia</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="email_penyedia" class="form-control" id="floatingInput" placeholder=""  required>
                                        <label for="floatingInput">Email Penyedia</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="no_penyedia" class="form-control" id="floatingInput" placeholder=""  required>
                                        <label for="floatingInput">No Aktif Penyedia</label>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input type="text" name="alamat_penyedia" class="form-control" id="floatingInput" placeholder=""  required>
                                        <label for="floatingInput">Alamat Penyedia</label>
                                    </div>

                                    <div style="margin-bottom:10px; font-style:italic;">
                                        <a href="#">Syarat dan Ketentuan terkait penyedia</a>
                                    </div>
                                    
                                    <input type="submit" name="submit" value="Registrasi Penyedia" class="btn btn-success">
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