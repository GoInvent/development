<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Flexy Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64c79ef594.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login-regist.css">
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
  <section>
    <div class="container-fluid h-custom" style="margin-top:7%; width:80%;">
      <div class="row d-flex justify-content-center align-items-center h-100">
        
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="assets/images/image.webp" class="img-fluid" style="width:95%;" alt="Sample image">
        </div>
             
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <h2 style="text-align: center">Buat Akun</h2>
            <p style="text-align: center">Isi biodata dibawah ini dengan benar</p>
            <div class="border-regist"></div>
            <form action="cek_register.php" method="POST">

                <div class="form-outline mb-4">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama_user" id="nama_user" class="form-control form-control-lg" placeholder="Masukan nama lengkap" required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat_user" id="alamat_user" class="form-control form-control-lg" placeholder="Masukan nama lengkap" required/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label">No.Handphone</label>
                    <input type="number" name="no_hp" id="no_hp" class="form-control form-control-lg" placeholder="Masukan No Handphone" required />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email_user" id="email_user" class="form-control form-control-lg" placeholder="Masukan email" required/>
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label">Password</label>
                   <input type="password" name="password_user" id="pass_user" class="form-control form-control-lg" placeholder="Masukan Pasword" required/>
                </div>


                <div class="text-center text-lg-start mt-4 pt-2">
                    <input type="submit" name="submit" value="Register"  class="btn btn-primary btn-lg" style="padding-left: 2rem; padding-right: 2rem; font-size:14px; width:100%;">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Sudah memiliki akun? <a href="login-user.php" style="color:#1499DC;">Login</a></p>
                </div>

            </form>
        </div>

      </div>
    </div>
  </section>
</body>