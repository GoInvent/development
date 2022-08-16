<?php
    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;

    if ($id_request){
        $sql_pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_request = '".$_GET['id_request']."'");
        $row = mysqli_fetch_assoc($sql_pemasukan);
        // $sql_admin = mysqli_query($koneksi, "SELECT * FROM pemasukan LEFT JOIN admin ON admin.id_admin = pemasukan.id_admin WHERE id_request = '".$_GET['id_request']."'");
        // $data = mysqli_fetch_assoc($sql_admin);
        
        $id_penyedia    = $row['id_penyedia'];
        $nama_bekal    = $row['nama_bekal'];
        $jumlah_bekal  = $row['jumlah_bekal'];
        $nama_kelas     = $row['nama_kelas']; 
        $harga_bekal   = $row['harga_bekal'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request    = $row['tgl_request'];   
        $no_kontrak     = $row['no_kontrak'];
        $nama_gudang    = $row['nama_gudang'];
    }

?>

<!DOCTYPE html><html lang="en">
<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%">Registrasi Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4>Input data barang</h4>
                            <p>Pendataan barang sebelum masuk gudang</p>
                            <?php if($id_request):?>
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/insert_barang.php&id_request=$row[id_request]" ?>" method="POST">

        
                                        <div class="form-floating mb-3">
                                            <input name="id_barang" class="form-control" id="getUID" placeholder=" " readonly>
                                            <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                        </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="id_penyedia" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $id_penyedia ?> readonly>
                                        <label for="floatingInput">Penyedia</label>
                                    </div>  

                                    <div class="form-floating mb-3">
                                    <input name="kelas_bekal" class="form-control" id="floatingInput" placeholder=" " required value ="<?php echo $nama_kelas ?>" readonly>
                                        <label for="floatingInput">Kelas Bekal</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <input name="nama_gudang" class="form-control" id="floatingInput" placeholder=" " required value ="<?php echo $nama_gudang ?>" readonly>
                                        <label for="floatingInput">Nama Gudang</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="harga_bekal" class="form-control" id="harga_bekal" placeholder="floatingInput" placeholder=" " required value = <?php echo $harga_bekal ?>>
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="jumlah_bekal" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $jumlah_bekal ?>>
                                        <label for="floatingInput">Stok</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " required value = <?php echo $tahun_produksi ?>>
                                        <label for="floatingInput">Tahun</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " required value=<?php echo $no_kontrak; ?> readonly> 
                                        <label for="floatingInput">No.Kontrak</label>
                                    </div>
                                    <input type="submit" name="submit" value="Setujui Barang" class="btn btn-success">
                                </form>
                                <?php else: ?>
                                <form class="" action="<?php echo BASE_URL."index.php?page=disbekal/insert_barang.php&id_request=$row[id_request]" ?>" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="id_barang" class="form-control" id="getUID" placeholder=" " required>
                                        <label for="getUID">ID Produk (Scan RFID to display ID)</label>
                                    </div>
                                    
                                    <!-- ambil data nilai penyedia barang -->
                                    <div class="form-floating mb-3">
                                        <select id="id_penyedia" name="id_penyedia" class="form-control select2" required>
                                            <option readonly value="">--Pilih Penyedia--</option>
                                            <?php 
                                                include 'database.php';
                                                $penyedia = mysqli_query($koneksi, "SELECT * FROM penyedia_barang");
                                                while ($r = mysqli_fetch_array($penyedia)) {
                                            ?>
                                                <option value="<?php echo $r['id_penyedia'] ?>"><?php echo $r['nama_penyedia'] ?></option>
                                            <?php }?>
                                        </select>
                                        <label for="floatingInput">Penyedia</label>
                                    </div>
                                    
                                    <!-- dilakukan inner join dengan pada tb bekal penyedia dengan penyedia barang. -->
                                    <div class="form-floating mb-3">
                                        <select id="jenis_bekal" name="jenis_bekal" class="form-control select2">
                                            <option>--Pilih jenis Bekal--</option>
                                        </select>
                                        <label for="floatingInput">Jenis Bekal</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_bekal" class="form-control" id="nama_bekal" placeholder="" required>
                                        <label for="floatingInput">Nama</label>
                                    </div>
                                    
                                     <!-- dilakukan inner join dengan pada tb bekal penyedia dengan penyedia barang. -->
                                    <!-- <div class="form-floating mb-3">
                                        <select id="jenis_bekal" name="jenis_bekal" class="form-control select2">
                                            <option>--Pilih Bekal--</option>
                                        </select>
                                        <label for="floatingInput">Jenis Bekal</label>
                                    </div> -->

                                    <div class="form-floating mb-3">
                                        <input type="number" name="harga_bekal" class="form-control" id="harga_bekal" placeholder="" required>
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="jumlah_barang" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Stok</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="tahun_produksi" class="form-control" id="floatingInput" placeholder=" " required>
                                        <label for="floatingInput">Tahun</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="no_kontrak" class="form-control" id="floatingInput" placeholder=" " readonly> 
                                        <label for="floatingInput">No.Kontrak</label>
                                    </div>
                                    <input type="submit" name="submit" value="Simpan" class="btn btn-success">
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>