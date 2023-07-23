<?php
include("./abris.php");
$b = new Abris();
$msg="";
if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["nama"])){
  $test = $b->registersiswa($_POST["user"], $_POST["pass"],$_POST["nama"]);
  if($test == true){
    $msg = "<div class='alert alert-success'>Berhasil didaftarkan silahkan login</div>";
  }
  else {
    $msg = "<div class='alert alert-danger'>User telah terdaftar</div>";
  }
}
?>
<html>
    <head>
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
        <a class="btn btn-success" type="submit" href="/">Masuk</a>
      </form>
    </div>
  </div>
</nav>
<div class="d-flex justify-content-center">
<div class="mt-5 p-5 " style="box-shadow: 1px 1px 10px #ccc;border: 1px solid #ccc">
<h3>Anti Bullying Reporting Software</h3>
<span class="text-muted">Register Siswa</span>
<form class="mt-3" method="POST">
  <?=$msg;?>
  <span class="text-muted">NISN</span>
<input class="form-control mt-2" name="user">
<span class="text-muted">Nama</span>
<input class="form-control mt-2" name="nama">
<span class="text-muted">Password</span>
<input class="form-control mt-2" name="pass" type="password">
<button class="w-100 btn btn-success mt-3">Daftar</button>
</form>
</div>
</div>
    </body>
</html>