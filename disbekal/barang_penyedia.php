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
        <form action="<?php echo BASE_URL."index.php?page=disbekal/insert_barang_penyedia.php" ?>" method="POST">
            <div style="margin-top:20px">
                <div class="form-floating mb-3">
                <select class="form-control" name="kelas_bekal" id="kelas_bekal" class="form-floating mb-3">
                    <option readonly value="">--Pilih Kelas Bekal--</option>
                            <?php 
                                include 'database.php';
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori_bekal ORDER BY kelas_bekal ASC");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?> 
                                <?php if($kategori != $kategori)?>
                                    <option value="<?php echo $r['kelas_bekal']?>-<?php echo $r['nama_kategori_bekal']?>"><?php echo $r['nama_kategori_bekal'] ?></option>
                                <?php } ?>
                </select>
                <label for="floatingInput">Pilih Kelas Bekal:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="id_penyedia" class="form-control" style="width:97%;" id="floatingInput" value="<?php echo $id_penyedia?>" placeholder=" " required>
                    <label for="floatingInput">ID Penyedia</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nama_bekal" class="form-control" style="width:97%;" id="floatingInput" placeholder=" " required>
                    <label for="floatingInput">Nama Bekal</label>
                </div>
                
                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input type="text" name="id_bekal" class="form-control" style="width:97%;" id="floatingInput" placeholder=" "  disabled>
                    <label for="floatingInput">ID Bekal</label>
                    <small>Generate by system</small>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="stok_bekal" class="form-control" style="width:97%;" id="floatingInput" placeholder=" " required>
                    <label for="floatingInput">Stok Bekal</label>
                </div>
            </div>
        
            <input type="submit" name="submit" value="Simpan" class="btn btn-success">
        </form>
    </div>
</body>
</html>