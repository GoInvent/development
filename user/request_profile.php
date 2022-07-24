<!-- Laman request user menjadi penyedia -->
<!-- Ketika user setuju dengan syarat dan mengisi beberapa form -->
<!-- maka user akan klik button ajukan sebagai penyedia -->
<!-- dan tb user pada database ter-update pada column role 'user' menjadi 'penyedia'  -->

<?php 
    $id_user = isset($_GET['id_user']) ? $_GET['id_user']: false;

    if($id_user){
        $sql = mysqli_query($koneksi, "SELECT * FROM users");
        $row = mysqli_fetch_assoc($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div style="margin-left:300px">
    <h6><?php echo $id_user?></h6>
        <form action="#">
            
            <a href="#" class="btn btn-success">Ajukan Sebagai Penyedia</a>
        </form>
    </div>
</body>
</html>