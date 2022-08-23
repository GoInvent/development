<?php
    include_once('helper.php');
    if(isset($_GET['gudang'])){
        $cari = $_GET['gudang'];

        //ambil data dari database, dimana pencarian sesuai dengan variabel cari
        $data = mysqli_query($koneksi, "SELECT * FROM gudang where id_gudang = '$cari'");
		
        }else{

        //tapi jika jurusan belum diset, maka jangan tampilkan apapun
        $data = [];		
    }
?>

<body>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- Container fluid  -->
        <!-- ============================================================== -->
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
                                <!-- Filter kategori barang -->
                                <!-- <div style="display:flex;margin-bottom:10px;">
                                    <div style="margin-right:10px;">
                                        <select id="nama_gudang" name="nama_gudang" class="sb-user">
                                            <option>--Pilih Gudang Bekal--</option>
                                            <?php 
                                                include 'database.php';
                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM gudang");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?>
                                                <option value="<?php echo $r['nama_gudang'] ?>"><?php echo $r['nama_gudang'] ?></option>
                                            <?php }?> 
                                        </select>
                                    </div>

                                    <div>
                                        <select id="kategori_bekal" name="kategori_bekal" class="sb-user">
                                            <option>--Pilih Kategori Bekal--</option>
                                            <?php 
                                                include 'database.php';
                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM kategori_bekal");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?>
                                                <option value="<?php echo $r['kelas_bekal'] ?>"><?php echo $r['kelas_bekal'] ?></option>
                                            <?php }?> 
                                        </select>
                                    </div>
                                </div> -->

                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="cari berdasarkan jenis bekal.." title="Type in a name" class="seacrh-bekal">

                                <!-- ---------------------- -->
                                <table class="table mb-0 table-hover align-middle text-nowrap" id="myTable">
                                    <thead style="background-color:#1a9bfc;">
                                        <tr>
                                            <th style="color:white; text-align:center;">Jenis Bekal</th>
                                            <th style="color:white; text-align:center;">ID Barang</th>
                                            <th style="color:white; text-align:center;">Nama Penyedia</th>
                                            <th style="color:white; text-align:center;">Nama gudang</th>
                                            <th style="color:white; text-align:center;">Harga</th>
                                            <th style="color:white; text-align:center;">Stok</th>
                                            <th style="color:white; text-align:center;">Tahun</th>
                                            <th style="color:white; text-align:center;">No.Kontrak</th>
                                            <th style="color:white; text-align:center;">Aksi</th>
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
                                                <td style="text-align:center;"><?php echo $row['kelas_bekal']?></td>
                                                <td style="text-align:center;"><?php echo $row['id_barang']?></td>
                                                <td style="text-align:center;"><?php echo $row['nama_penyedia']?></td>
                                                <td style="text-align:center;"><?php echo $row['nama_gudang']?></td>
                                                <td style="text-align:center;"><?php echo rupiah ($row['harga_bekal'])?></td>
                                                <td style="text-align:center;"><?php echo $row['jumlah_bekal']?></td>
                                                <td style="text-align:center;"><?php echo $row['tahun_produksi']?></td>
                                                <td style="text-align:center;"><?php echo $row['no_kontrak']?></td>
                                                <td style="text-align:center;"><a class="btn btn-success" href="index.php?page=user/ajukan_bekal/requestbarang.php&id=<?php echo $row['id_barang'] ?>">Request</a>
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
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
    </script>
  

    
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