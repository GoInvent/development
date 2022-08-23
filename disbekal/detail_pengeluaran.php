<?php
    include 'database.php';
    include_once('helper.php');

    $id_kirim = isset($_GET['id_kirim']) ? $_GET['id_kirim'] : false;

    
    if ($id_kirim){
        $sql_pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_kirim = '".$_GET['id_kirim']."'");
        $row_pengeluaran = mysqli_fetch_assoc($sql_pengeluaran);
        
        $sql_user = mysqli_query($koneksi, "SELECT * FROM pengeluaran LEFT JOIN users ON users.id_user = pengeluaran.id_user WHERE id_kirim = '".$_GET['id_kirim']."'");
        $row_user = mysqli_fetch_assoc($sql_user);
        
        $idbarang           = $row_pengeluaran['id_barang'];
        $nama_user          = $row_user['nama_user'];
        $nama_barang        = $row_pengeluaran['kelas_bekal'];
        $jumlah_barang      = $row_pengeluaran['jumlah_bekal'];
        $harga_barang       = $row_pengeluaran['harga_bekal'];
        $tahun_produksi     = $row_pengeluaran['tahun_produksi'];
        $tgl_request        = $row_pengeluaran['tgl_request'];
        $iduser             = $row_user['id_user'];
        $notelp             = $row_user['no_hp'];
        $alamat             = $row_user['alamat_user'];
    }
?>

<!DOCTYPE html><html lang="en">
<body>
<form class="" action="" method="POST">
    <div class="container-fluid" style="margin-left:280px; margin-top:20px;" method="post">
            <h3>Pengajuan Pengeluaran Barang</h3>
            <p>Detail barang</p>
            <div class="border-persetujuan"></div>
            <?php
                
            ?>
            <h6>ID Request : <?php echo $id_kirim?></h6>
        
        <div class="card" style="width: 65rem; border:1px solid gray;">
            <div class="card-header" style="text-align: center;">
                <h5>Informasi Pengguna</h3>
            </div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <div class="form-floating mb-3">
                            <input name="id_barang" class="form-control" id="getUID" placeholder=" " value="<?php echo $iduser ?>" required readonly>
                            <label for="getUID">ID User</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="nama_user" class="form-control" id="floatingInput" placeholder=""  value = "<?php echo $nama_user ?>" required readonly>
                            <label for="floatingInput">Nama User</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="alamat_user" class="form-control" id="floatingInput" placeholder=""  value = "<?php echo $alamat ?>"required readonly>
                            <label for="floatingInput">Alamat</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="no_telp" class="form-control" id="floatingInput" placeholder=""  value ="<?php echo $notelp ?>" required readonly>
                            <label for="floatingInput">No. Telp</label>
                        </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="timestamp" class="form-control" id="floatingInput" placeholder=""  value ="<?php echo $tgl_request ?>" required readonly>
                            <label for="floatingInput">Tanggal Permintaan</label>
                    </div>
                </ul>
                </div>
            <div class="card-header" style="text-align: center;">
                <h5>Informasi Barang</h3> 
            </div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <div class="form-floating mb-3">
                            <input type="text" name="id_barang" class="form-control" id="floatingInput" placeholder=""  value ="<?php echo $idbarang ?>" required readonly>
                            <label for="floatingInput">ID Barang</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=""  value ="<?php echo $nama_barang ?>" required readonly>
                            <label for="floatingInput">Nama Barang</label>
                    </div>

                    <!-- setiap gudang timur dan barang memiliki stok bekal yang berbeda untuk barang yang sama -->
                    
                    <div>
                        <h6 style="font-style:italic">Ketersedian bekal di gudang <?php echo $jumlah_barang ?></h6>
                    </div>

                    <div class="form-floating mb-3">
                            <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder="" min="0" max="<?php echo $jumlah_barang ?>" required>
                            <label for="floatingInput">Jumlah Bekal di kirim</label>
                    </div>

                    <div class="form-floating mb-3">
                            <input type="text" name="harga_barang" class="form-control" id="floatingInput" placeholder=""  value = "<?php echo $harga_barang ?>" required readonly>
                            <label for="floatingInput">Harga Barang</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=""  value = "<?php echo $tahun_produksi ?>" required readonly>
                            <label for="floatingInput">Tahun</label>
                    </div>
                </ul>
                </div>
        </div>
        <input type="submit" name="submit" value="Kirim Barang" class="btn btn-success" style="margin-bottom:20px;" onclick="return confirm('Apakah data sudah benar?')">
        <a href="#" class="btn btn-info" style="margin-bottom:20px;color:white;">Cek Ketersedian Barang</a>
        <!-- <a class="btn btn-danger"  href="<?php echo BASE_URL."index.php?page=disbekal/pengeluaran.php" ?>" style="margin-bottom:20px;">Reject </a> -->
    </div>
</form>
    <?php
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['submit'])) {
                $created_at     = date('d-m-y h:i:s');
                $update_at      = date('d-m-y h:i:s');
                $statusrequest   = 1;
                // include database connection file
                include 'database.php';
                // Insert user data into table
                $update = mysqli_query($koneksi, "UPDATE pengeluaran SET
                                                status_request   = '".$statusrequest."',
                                                tgl_kirim        = NOW()
                                                WHERE id_kirim = '".$p->id_kirim."'");
                                                
                                                if ($update){
                                                    //jika data berhasil disimpan
                                                    echo '<script>alert("Success")</script>';
                                                    if ($_SESSION['role'] == "Disbekal"){
                                                        echo '<script>window.location="index.php?page=disbekal/pengeluaran.php"</script>';
                                                    } elseif ($_SESSION['role'] == "Kadopus"){
                                                        echo '<script>window.location="index.php?page=kadopus/databarang.php"</script>';
                                                    }
                                                }else{
                                                    echo 'gagal'.mysqli_error($koneksi);
                                                }

                                            }
                                            ?>
</body>
</html>