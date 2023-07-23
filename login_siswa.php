<?php
include("./abris.php");
$b = new Abris();
$msg="";
if(isset($_POST["user"]) && isset($_POST["pass"])){
  $test = $b->loginsiswa($_POST["user"], $_POST["pass"]);
  if(count($test) > 0){
    setcookie("user", $_POST["user"], 0 );
    setcookie("nama", $test[0]["nama"], 0 );
    setcookie("pass", $_POST["pass"], 0);
    header("location: /siswa/report.php");
  }
  else {
    $msg = "<div class='alert alert-danger'>Silahkan periksa kembali username/password anda</div>";
  }
}
?>
<html>
    <head>
    <title>ABRIS Login Siswa</title>
        <link rel="stylesheet" type="text/css" href="./library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./library/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="./library/style.css">

    </head>
    <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ABRiS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontak Guru</a>
        </li>
        
      </ul>
      <form class="d-flex mt-1 mb-1">
        <button class="btn btn-outline-success" type="submit">Masuk</button>
      </form>
    </div>
  </div>
</nav>
<div class="d-flex justify-content-center">
<div class="mt-5 p-5 " style="box-shadow: 1px 1px 10px #ccc;border: 1px solid #ccc">
<h3>Anti Bullying Reporting Software</h3>
<form class="mt-3" method="POST">
  <?=$msg;?>
  <span class="text-muted">Username</span>
<input class="form-control mt-2" name="user">
<span class="text-muted">Password</span>
<input class="form-control mt-2" name="pass" type="password">
<button class="w-100 btn btn-success mt-3">Login</button>
<div class="mt-3 text-center">
 Belum punya akun siswa? <a href="/register_siswa.php" class="text-primary" style="text-decoration: none;">Daftar</a>
<hr>
<a class="btn btn-primary w-100" href="/login_guru.php">Login Sebagai Guru</a>
</div>
</form>
</div>
</div>
    </body>
</html>