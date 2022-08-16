<?php 
    include 'database.php';
    include_once('helper.php');

    $id_penyedia = isset($_GET['id_penyedia']) ? $_GET['id_penyedia'] : false;
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div style="margin-left:300px; margin-top:15px;">
        <h4>Input data barang penyedia</h4>
        <p>Masukan form dibawah ini</p>
        <form action="<?php echo BASE_URL."index.php?page=disbekal/daftar_penyedia/insert_barang_penyedia.php" ?>" method="POST">
            <div style="margin-top:20px">
                <div class="form-floating mb-3">
                    <input type="text" name="id_penyedia" class="form-control" style="width:97%;" id="floatingInput" value="<?php echo $id_penyedia?>" placeholder=" " required readonly>
                    <label for="floatingInput">ID Penyedia</label>
                    <small>Auto-generate</small>
                </div>
                <div class="form-floating mb-3">
                    <select id="kelas_bekal" name="kelas_bekal"  class="form-control select2" required>
                    <option readonly value="">--Pilih Kelas Bekal--</option>
                            <?php 
                                include 'database.php';
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori_bekal");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?> 
                                    <option value="<?php echo $r['kelas_bekal']?>-<?php echo $r['nama_kategori_bekal']?>"><?php echo $r['kelas_bekal'] ?>-<?php echo $r['nama_kategori_bekal']?></option>
                                <?php } ?>
                    </select>
                <label for="floatingInput">Kelas Bekal:</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <select id="nama_kategori_bekal" name="nama_kategori_bekal" class="form-control select2">
                        <option>--Pilih Jenis Bekal--</option>
                    </select>
                    <label for="floatingInput">Jenis Bekal</label>
                </div> -->
                <div class="form-floating mb-3">
                    <input type="text" name="nama_bekal" class="form-control" style="width:97%;" id="floatingInput" placeholder=" " required>
                    <label for="floatingInput">Nama Bekal</label>
                </div>
                
                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input type="text" name="id_bekal" class="form-control" style="width:97%;" id="floatingInput" placeholder=" "  disabled>
                    <label for="floatingInput">ID Bekal</label>
                    <small>Auto-generate</small>
                </div>
                <!-- <div class="form-floating mb-3" style="margin-top:15px;">
                    <input type="text" name="harga" class="form-control" style="width:97%;" id="floatingInput" placeholder=" ">
                    <label for="floatingInput">Harga</label>
                </div>                    
                <div class="form-floating mb-3">
                    <input type="text" name="stok_bekal" class="form-control" style="width:97%;" id="floatingInput" placeholder=" " required>
                    <label for="floatingInput">Stok Bekal</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tahun" class="form-control" style="width:97%;" id="floatingInput" placeholder=" " required>
                    <label for="floatingInput">Tahun</label>
                </div> -->
                <div class="form-floating mb-3">
                <select class="form-control" name="nama_gudang" id="kelas_bekal" class="form-floating mb-3">
                    <option readonly value="">--Pilih Gudang--</option>
                            <?php 
                                include 'database.php';
                                $gudang = mysqli_query($koneksi, "SELECT * FROM gudang");
                                while ($r = mysqli_fetch_array($gudang)) {
                                ?> 
                                <?php if($gudang != $gudang)?>
                                    <option value="<?php echo $r['nama_gudang']?>"><?php echo $r['nama_gudang'] ?></option>
                                <?php } ?>
                </select>
                    <label for="floatingInput">Gudang</label>
                </div>
            </div>
        
            <input type="submit" name="submit" value="Simpan" class="btn btn-success">
        </form>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.chained.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#kelas_bekal').on('change', function(){
                var kelas_bekal = $(this).val();

                $.ajax({
                    url : '<?php echo BASE_URL."disbekal/daftar_penyedia/data_controller.php"?>',
                    type : "POST",
                    data: {
                        modul:'nama_kategori_bekal',
                        kelas_bekal:kelas_bekal,
                    },
                    success: function(respond){
                        $('#nama_kategori_bekal').html(respond)
                    },
                    error:function(){
                        alert("Gagal mengambil data")
                    }
                })
            })
            $('#nama_kategori_bekal').on('change', function(){
                var kelas_bekal = $(this).val();
                var nama_bekal = $(this).val();

                $.ajax({
                    url : '<?php echo BASE_URL."disbekal/daftar_penyedia/data_controller.php"?>',
                    type : "POST",
                    data: {
                        modul:'jenis_bekal',
                        id_penyedia:id_penyedia,
                        kelas_bekal:kelas_bekal,
                    },
                    success: function(respond){
                        console.log(kelas_bekal)
                        $('#jenis_bekal').html(respond)
                    },
                    error:function(){
                        alert("Gagal mengambil data")
                    }
                })
            })
        });
    </script>
</body>
</html>