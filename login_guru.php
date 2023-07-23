<?php
include("./abris.php");
$b = new Abris();
$msg="";
if(isset($_REQUEST["user"]) && isset($_REQUEST["pass"])){

    $test = $b->loginguru($_REQUEST["user"], $_REQUEST["pass"]);
  if($test > 0){
    setcookie("guser", $_REQUEST["user"], 0 );
    setcookie("gpass", $_REQUEST["pass"], 0);
    header("Location: /guru/main.php");

  }
  else {
    $msg = "<div class='alert alert-danger'>Silahkan periksa kembali username/password anda</div>";
  }
 

}
?>
<html>
    <head>
        <title>ABRIS Login Guru</title>
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
        <a class="btn btn-success" type="submit">Masuk</a>
      </form>
    </div>
  </div>
</nav>
<div class="d-flex justify-content-center">
<div class="mt-5 p-5 " style="box-shadow: 1px 1px 10px #ccc;border: 1px solid #ccc">
<h3>Anti Bullying Reporting Software</h3>
<h5  class="text-muted text-center">Login Sebagai Guru</h5>
<form class="mt-3" method="POST" action="#">
    <?= $msg; ?>
  <span class="text-muted mt-1">Username</span>
<input class="form-control mt-1" name="user">
<span class="text-muted mt-1">Password</span>
<input class="form-control mt-1" name="pass" type="password">
<button class="w-100 btn btn-success mt-3" type="submit">Login</button><br>
<div class="mt-3 text-center">
Kontak administrator untuk membuat akun guru</a>
<hr>
<a class="btn btn-primary w-100" href="/login_siswa.php">Login Sebagai Siswa</a>
</form>
</div>
</div>
    </body>
</html>