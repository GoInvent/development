<?php 
    include 'database.php';
    include_once('helper.php');

    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user']:false;

    $nama_user = isset($_SESSION['nama_user']) ? $_SESSION['nama_user']:false;
    $role = isset($_SESSION['role']) ? $_SESSION['role']: false;
    $email_user = isset($_SESSION['email_user']) ? $_SESSION['email_user'] : false;

    $sql = mysqli_query($koneksi, "SELECT * FROM log_penyedia");
    $row = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div style="margin-left:300px; margin-top:15px;">
        <h4>Profile Kamu</h4>
        <p>Biodata lengkap profile</p>
        <div class="border-profile"></div>
        <form action="<?php echo BASE_URL."index.php?page=user/request_profile.php&id_user=$id_user" ?>" method="POST">
            <div style="margin-top:20px">
                <div class="form-floating mb-3">
                    <input type="text" name="nama_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  value = <?php echo $nama_user ?> required readonly>
                    <label for="floatingInput">Nama Pengguna</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="role_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  value = <?php echo $role ?> required readonly>
                    <label for="floatingInput">Role Pengguna</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="email_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  value = <?php echo $email_user ?> required readonly>
                    <label for="floatingInput">Email Pengguna</label>
                </div>
            </div>
            
            <div style="border: 1px solid gray;width:97%;margin:20px 0px 20px 0px;"></div>
            <p class="text-profile">
                    Daftarkan akun profile-mu sebagai penyedia, untuk kamu bisa menyimpan dan memasukan barang<br/>
                    ke gudang kami.<a href="#"> Lihat Detail</a>
            </p>
            <?php if($row['id_admin'] == $id_user) : ?>
                <p style="font-weight: bold;">Anda telah mengajukan permintaan sebagai penyedia</p>
                <p style="font-weight: bold; margin-top:-13px;">Mohon tunggu, permintaan sebagai penyedia sedang kami proses</p>
            <?php else : ?>
                <!-- kasih action yang mana update dari role user menjadi penyedia pada table users kolom role -->
                <!-- muncul pop yang sebagai warning untuk user, menyetujui menjadi penyedia -->
                <!-- ketiak user setuju maka role akan insert ke tb_log_penyedia -->
                <input type="submit" name="submit" value="Ajukan Porfile Sebagai Penyedia" class="btn btn-success">
                
                <div style="margin-top:10px;">
                    <input type="checkbox" id="aggre_" name="aggre_form" value="aggre">
                    <label for="aggre"> Menyetujui syarat dan ketentuan yang berlaku</label><br>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>