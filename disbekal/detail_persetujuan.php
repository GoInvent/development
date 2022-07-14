<?php
    include 'database.php';
    include_once('helper.php');

?>

<!DOCTYPE html><html lang="en">
<body>
    <div class="container" style="margin-left:280px; margin-top:20px;">
        <h3>Pengajuan masuk barang</h3>
        <p>Detail lengkap persetujuan masuk-nya barang ke gudang</p>
        <div class="border-persetujuan"></div>
        <!-- Ambil data barang dari tb-penyediaan-barang -->
        <?php
            $sql_barang = mysqli_query($koneksi, 'SELECT * FROM persetujuan LEFT JOIN komoditi USING(id_komoditi)')
        ?>
        <h6 style="margin-bottom:20px;">Id permintaan masuk barang : </h6>
        
        <div>
            <div class='informasi-penyedia'>
                <h6 class="form-penyedia">Id Penyedia : </h6>
                <h6 class="form-penyedia">Nama Penyedia : </h6>
                <h6 class="form-penyedia">No Hp : </h6>
                <h6 class="form-penyedia">Email Aktif :</h6>
                <h6 class="form-penyedia">Tanggal Pengajuan : </h6>
            </div>
            <div class="informasi-pengajuan-barang">
                <h6 class="form-penyedia">Nama Barang :</h6>
                <h6 class="form-penyedia">Jenis Barang : </h6>
                <h6 class="form-penyedia">Jumlah Barang : </h6>
                <h6 class="form-penyedia">Volume Barang : </h6>
            </div>
            
            <input class="submit-persetujuan" type="submit" value="Registrasi Barang" style="margin-top:2%;">
        </div>


    </div>
</body>
</html>