<?php 
    include 'database.php';
    include_once('helper.php');

    $id_user = isset($_GET['id_user']) ? $_GET['id_user']:false;

    $sql = mysqli_query($koneksi, "SELECT * FROM users LEFT JOIN log_penyedia USING(id_user) WHERE id_user = '".$_GET['id_user']."'");
    $row = mysqli_fetch_assoc($sql);
    

?>

<!DOCTYPE html>
<html lang="en">
<body>
    <div style="margin-left:300px; margin-top:15px;">
        <h4>Profile Kamu</h4>
        <p>Biodata lengkap profile</p>
        <div class="border-profile"></div>
        <form action="<?php echo BASE_URL."index.php?page=disbekal/approve_profile.php&id_user=$id_user" ?>" method="POST">
            <div style="margin-top:20px">
                <h6>ID Pengguna : <?php echo $id_user; ?></h6>
                <div class="form-floating mb-3">
                    <input type="text" name="nama_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  value = <?php echo $row['nama_user']; ?> required readonly>
                    <label for="floatingInput">Nama Pengguna</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="role_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  value = <?php echo $row['role']; ?> required readonly>
                    <label for="floatingInput">Role Pengguna</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="email_user" class="form-control" style="width:97%;" id="floatingInput" placeholder=""  value = <?php echo $row['email_user']; ?> required readonly>
                    <label for="floatingInput">Email Pengguna</label>
                </div>
            </div>
        
            <input type="submit" name="submit" value="Setujui" class="btn btn-success">
        </form>
    </div>
</body>
</html>