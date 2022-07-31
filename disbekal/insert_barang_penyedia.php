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
        <form action="#" method="POST">
            <div style="margin-top:20px">
                <div class="form-floating mb-3">
                    <input type="text" name="nama_user" class="form-control" style="width:97%;" id="floatingInput" placeholder="" required>
                    <label for="floatingInput">Nama Bekal</label>
                </div>
                <div class="form-floating mb-3">
                
                <select class="form-control" name="kelas_bekal" id="kelas_bekal" class="form-floating mb-3">
                    <option value="BK.1">Bekal Kelas 1</option>
                    <option value="BK.2">Bekal Kelas 2</option>
                    <option value="BK.3">Bekal Kelas 3</option>
                    <option value="BK.4">Bekal Kelas 4</option>
                    <option value="BK.5">Bekal Kelas 5</option>
                    <option value="BK.6">Bekal Kelas 6</option>
                    <option value="BK.7">Bekal Kelas 7</option>
                    <option value="BK.8">Bekal Kelas 8</option>
                    <option value="BK.9">Bekal Kelas 9</option>
                    <option value="BK.10">Bekal Kelas 10</option>
                </select>
                <label for="floatingInput">Pilih Kelas Bekal:</label>
                </div>
                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input type="text" name="role_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  required>
                    <label for="floatingInput">ID Bekal</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="email_user" class="form-control" style="width:97%;" id="floatingInput" placeholder="" required>
                    <label for="floatingInput">Stok Bekal</label>
                </div>
            </div>
        
            <input type="submit" name="submit" value="Setujui" class="btn btn-success">
        </form>
    </div>
</body>
</html>