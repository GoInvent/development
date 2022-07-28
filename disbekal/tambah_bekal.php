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
                    <h1 text-align="center" style="margin:2% 0% 2% 0%">Registrasi Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4>Tambah Kategori</h4>
                                <form class="" action="" method="POST">
                                <div class="form-floating mb-3">
                                        <input type="text" name="jenis_komoditi" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Kode Bekal</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="jenis_komoditi" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Jenis Bekal</label>
                                    </div>
                                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
if(isset($_POST['submit'])){
    $jenisbekal = $_POST['jenis_komoditi'];
    $insert = mysqli_query($koneksi, "INSERT INTO komoditi VALUES (null,'".$jenisbekal."')"); 

    if ($insert) {
        echo '<script>alert("Simpan data Berhasil")</script>';
        echo '<script>window.location="index.php?page=disbekal/databekal.php"</script>';
    }else{
        echo 'gagal'.mysqli_error($koneksi);

    }
}
?>

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