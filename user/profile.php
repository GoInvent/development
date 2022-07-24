<?php 
    include 'database.php';
    include_once('helper.php');

    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user']:false;

    $nama_user = isset($_SESSION['nama_user']) ? $_SESSION['nama_user']:false;
    $role = isset($_SESSION['role']) ? $_SESSION['role']: false;
    $email_user = isset($_SESSION['email_user']) ? $_SESSION['email_user'] : false;

?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div style="margin-left:300px; margin-top:15px;">
        <h4>Profile Kamu</h4>
        <p>Biodata lengkap profile</p>
        <div class="border-profile"></div>

        <div style="margin-top:20px">
            <h5 style="margin-top:15px;">Nama  : <?php echo $nama_user ?></h5>
            <h5 style="margin-top:15px;">Role  : <?php echo $role ?></h5>
            <h5 style="margin-top:15px;">Email : <?php echo $email_user?></h5>
        </div>
        <div style="border: 1px solid gray;width:95%;margin:20px 0px 20px 0px;"></div>

        <div>
            <p class="text-profile">
                Daftarkan akun profile-mu sebagai penyedia, untuk kamu bisa menyimpan dan memasukan barang<br/>
                ke gudang kami.<a href="#"> Lihat Detail</a>
            </p>

            <div>
                <div>
                    <!-- kasih action yang mana update dari role user menjadi penyedia pada table users kolom role -->
                    <a href="<?php echo BASE_URL."index.php?page=user/request_profile.php&id_user=$id_user" ?>" class="btn btn-success">Ajukan Profile Sebagai Penyedia</a>
                </div>
                <div style="margin-top:10px;">
                    <input type="checkbox" id="aggre_" name="aggre_form" value="aggre">
                    <label for="aggre"> Menyetujui syarat dan ketentuan yang berlaku</label><br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>