<?php

    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;

    if ($id_request){
        $sql_pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_request = '".$_GET['id_request']."'");
        $row = mysqli_fetch_assoc($sql_pemasukan);
       
        $id_barang = $row['id_barang'];
        $id_penyedia = $row['id_penyedia'];
        $nama_kelas = $row['nama_kelas'];
        $nama_gudang = $row['nama_gudang'];
        $nama_bekal = $row['nama_bekal'];
        $harga_bekal = $row['harga_bekal'];
        $jumlah_bekal = $row['jumlah_bekal'];
        $harga_bekal = $row['harga_bekal'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request = $row['tgl_request'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $no_kontrak = rand();
        $rfid = $row['id_barang'];
    }

?>

<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Tolak bekal masuk gudang</h4>
                            <p>Laman ini untuk menghapus bekal yang tidak sesuai kriteria</p>
                            <!-- <h6><?php echo $id_request ?></h6> -->
                            <form action="<?php echo BASE_URL."index.php?page=disbekal/ajukan_bekal/insert_hapus_bekal.php&id_request=$row[id_request]" ?>" method="POST">

                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_penyedia" class="form-control" id="floatingInput" placeholder=""  value = <?php echo $id_penyedia ?> required readonly>
                                    <label for="floatingInput">Nama Penyedia</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_bekal" class="form-control" id="floatingInput" placeholder=""  value = <?php echo $nama_kelas ?> required readonly>
                                    <label for="floatingInput">Nama Bekal</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="nama_gudang" class="form-control" id="floatingInput" placeholder=""  value = <?php echo $nama_gudang ?> required readonly>
                                    <label for="floatingInput">Penyimpanan gudang</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="hapus_bekal" class="form-control" id="floatingInput" placeholder=" " required>
                                    <label for="floatingInput">Hapus Bekal</label>
                                </div>

                                <input type="submit" name="submit" value="Hapus Bekal" class="btn btn-danger">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>