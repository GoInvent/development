<?php

    $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : false;
    // $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;
    
    if($id_barang){
        $sql_pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan LEFT JOIN komoditi ON komoditi.id_komoditi = pemasukan.id_komoditi WHERE id_barang = '".$_GET['id_barang']."'");
        $row = mysqli_fetch_assoc($sql_pemasukan);

        $nama_penyedia = $row['nama_penyedia'];
        $komoditi = $row['id_komoditi'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $nama_barang = $row['nama_barang'];
        $jumlah_barang = $row['jumlah_barang'];
        $harga_barang = $row['harga_barang'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request = $row['tgl_request'];
        $no_kontrak = rand();
    }

?>

<!DOCTYPE html>
<html lang="en">
<body>
<div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 text-align="center" style="margin:2% 0% 2% 0%">Tambah Barang</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4>Input tambah data barang</h4>
                            <p>Pendataan tambah barang sebelum masuk gudang</p>
                            <form action="#">
                                <div class="form-floating mb-3">
                                    <input name="id_barang" class="form-control" id="id_barang" placeholder=" " value="<?php echo $id_barang ?>" required disabled>
                                    <label for="id_barang">ID Barang</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input name="nama_barang" class="form-control" id="nama_barang" placeholder=" " value="<?php echo $nama_barang ?>" required disabled>
                                    <label for="nama_barang">Nama Barang</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input name="jumlah_barang" class="form-control" id="jumlah_barang" placeholder=" " value="<?php echo $jumlah_barang ?>" required disabled>
                                    <label for="jumlah_barang">Jumlah Barang di Gudang</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type = "number" name="tambah_barang" class="form-control" id="tambah_barang" placeholder=" ">
                                    <label for="jumlah_barang">Tambah Barang</label>
                                </div>

                                <input type="submit" name="submit" value="Tambah Barang" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>