<?php
    include 'database.php';
    include_once('helper.php');

    $id_request = isset($_GET['id_request']) ? $_GET['id_request'] : false;

    if ($id_request){
        $sql_pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan LEFT JOIN komoditi ON komoditi.id_komoditi = pemasukan.id_komoditi WHERE id_request = '".$_GET['id_request']."'");
        $row = mysqli_fetch_assoc($sql_pemasukan);
        $sql_admin = mysqli_query($koneksi, "SELECT * FROM pemasukan LEFT JOIN admin ON admin.id_admin = pemasukan.id_admin WHERE id_request = '".$_GET['id_request']."'");
        $data = mysqli_fetch_assoc($sql_admin);
        $nama_penyedia  = $row['nama_penyedia'];
        $nama_barang    = $row['nama_barang'];
        $jumlah_barang  = $row['jumlah_barang'];
        $harga_barang   = $row['harga_barang'];
        $tahun_produksi = $row['tahun_produksi'];
        $tgl_request    = $row['tgl_request'];
        $jenis_komoditi = $row['jenis_komoditi'];
        $idadmin        = $data['id_admin'];
        $email          = $data['email'];
    }
?>

<!DOCTYPE html><html lang="en">
<body>
    <div class="container-fluid" style="margin-left:280px; margin-top:20px;">
            <h3>Pengajuan Pemasukan Barang</h3>
            <p>Detail barang</p>
            <div class="border-persetujuan"></div>
            <?php
                
            ?>
            <h6>ID Request : <?php echo $id_request?></h6>
        
        <div class="card" style="width: 65rem; border:1px solid black">
            <div class="card-header" style="text-align: center;">
                <h5>Informasi Penyedia</h3>
            </div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID   : <?php echo $idadmin ?></li>
                    <li class="list-group-item">Nama Penyedia : <?php echo $nama_penyedia ?></li>
                    <li class="list-group-item">Email  : <?php echo $email ?></li>
                    <li class="list-group-item">Tanggal Pengajuan : <?php echo $tgl_request ?></li>
                </ul>
                </div>
            <div class="card-header" style="text-align: center;">
                <h5>Informasi Barang</h3> 
            </div>
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama Barang : <?php echo $nama_barang?></li>
                    <li class="list-group-item">Jenis Barang : <?php echo  $jenis_komoditi ?></li>
                    <li class="list-group-item">Jumlah Barang : <?php echo $jumlah_barang?></li>
                    <li class="list-group-item">Harga Barang : <?php echo $harga_barang?> </li>
                    <li class="list-group-item">Tahun Produksi : <?php echo $tahun_produksi?> </li>
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
        <a class="btn btn-success" href="<?php echo BASE_URL."index.php?page=disbekal/registbarang.php&id_request=$row[id_request]" ?>">Registrasi Barang</a>
    </div>
    
</body>
</html>