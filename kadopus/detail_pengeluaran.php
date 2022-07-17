<?php
    include 'database.php';
    include_once('helper.php');

    $id_kirim = isset($_GET['id_kirim']) ? $_GET['id_kirim'] : false;

    
    if ($id_kirim){
        $sql_pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran LEFT JOIN komoditi ON komoditi.id_komoditi = pengeluaran.id_komoditi WHERE id_kirim = '".$_GET['id_kirim']."'");
        $row = mysqli_fetch_assoc($sql_pengeluaran);
        $sql_admin = mysqli_query($koneksi, "SELECT * FROM pengeluaran LEFT JOIN users ON users.id_user = pengeluaran.id_user WHERE id_kirim = '".$_GET['id_kirim']."'");
        $produk = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_kirim ='".$_GET['id_kirim']."' ");
	    $p = mysqli_fetch_object($produk);
        $data = mysqli_fetch_assoc($sql_admin);
        $idbarang           = $row['id_barang'];
        $nama_user          = $row['nama_user'];
        $nama_barang        = $row['nama_barang'];
        $jumlah_barang      = $row['jumlah_barang'];
        $harga_barang       = $row['harga_barang'];
        $tahun_produksi     = $row['tahun_produksi'];
        $tgl_request        = $row['tgl_request'];
        $jenis_komoditi     = $row['jenis_komoditi'];
        $iduser             = $data['id_user'];
        $notelp             = $data['no_hp'];
        $alamat             = $row['alamat_user'];
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
        
        <div class="card" style="width: 65rem; border:1px solid black">
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
                            <label for="floatingInput">Tanggal Request</label>
                    </div>
                </ul>
                </div>
            <div class="card-header" style="text-align: center;">
                <h5>Informasi Barang</h3> 
            </div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <div class="form-floating mb-3">
                            <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=""  value ="<?php echo $idbarang ?>" required readonly>
                            <label for="floatingInput">Nama Barang</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder=""  value ="<?php echo $nama_barang ?>" required readonly>
                            <label for="floatingInput">Nama Barang</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="jenis_komoditi" class="form-control" id="floatingInput" placeholder=""  value = "<?php echo $jenis_komoditi ?>" required readonly>
                            <label for="floatingInput">Jenis Komoditi</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=""  value = "<?php echo $jumlah_barang ?>" required readonly>
                            <label for="floatingInput">Jumlah</label>
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
                <div class="card-body" style="margin-bottom:20px;">
                    <h6 class="form-penyedia"></h6>
                    <h6 class="form-penyedia"> </h6>
                    <h6 class="form-penyedia"> </h6>
                    <h6 class="form-penyedia"></h6>
                    <h6 class="form-penyedia"></h6>
                </div>
        </div>
        <input type="submit" name="submit" value="Kirim Barang" class="btn btn-success" onclick="return confirm('Apakah data sudah benar?')">
        <a class="btn btn-danger"  href="<?php echo BASE_URL."index.php?page=disbekal/pengeluaran.php" ?>">Cancel</a>
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
                                                        echo '<script>window.location="index.php?page=kadopus/pengeluaran.php"</script>';
                                                    }
                                                }else{
                                                    echo 'gagal'.mysqli_error($koneksi);
                                                }

                                            }
                                            ?>
</body>
</html>