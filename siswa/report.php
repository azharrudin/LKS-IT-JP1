<?php
include("./../abris.php");
$b = new Abris();
$msg="";
if(isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
  $test = $b->loginsiswa($_COOKIE["user"], $_COOKIE["pass"]);
  if(count($test) < 1){
    header("location: /login_siswa.php");
    echo 0;
  }
  if(isset($_FILES["foto"]) && strlen($_FILES["foto"]["name"]) > 0 && $_POST["deskripsi"]){
   $b->insertlaporan( $_POST["deskripsi"],  "2005",  $_COOKIE["user"], isset($_POST["anon"]) ? true:false);
   $msg="<div class='alert alert-success'>Laporan telah submit, lihat list laporan anda</div>";
  }
  if(isset($_GET["logout"])){
    setcookie("user", null, -1, "/");
    setcookie("pass", null, -1, "/");
header("report.php");
}

}
else {
    header("location: /login_siswa.php");
    echo 0;
}
?>
<html>
    <head>
    <title>ABRIS Laporkan</title>
        <link rel="stylesheet" type="text/css" href="./../library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./../library/bootstrap-icons/font/bootstrap-icons.css">
        
        <link rel="stylesheet" type="text/css" href="./../library/style.css">

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
          <a class="nav-link active" aria-current="page" href="#">Laporkan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listreport.php">Laporan Saya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontak Guru</a>
        </li>
    
      </ul>
      <form class="d-flex mt-1 mb-1" form method="GET">
        <button class="btn btn-danger" name="logout" value="true">Logout</button>
      </form>
    </div>
  </div>
</nav>
<div class="d-flex justify-content-center pt-4">
<div class="mt-5 p-5 pt-3 " style="box-shadow: 1px 1px 10px #ccc;border: 1px solid #ccc">
<form method="POST" enctype="multipart/form-data" action="#">
  <h3 class="text-center text-muted">Form Pelaporan</h3>
  <?=$msg;?>

  <div class="form-group mb-2">
    <label>NISN</label>
    <input class="form-control mb-2" id="exampleInputPassword1"  value="<?= $_COOKIE["nama"] ?>" disabled>
    <input class="form-control" id="exampleInputPassword1"  value="<?= $_COOKIE["user"] ?>" disabled>
    <small id="emailHelp" class="form-text text-muted">Nama dan NISN Anda</small>

  </div>
  <div class="form-group mb-3">
    <label>Foto</label>
    <input type="file" class="form-control"  name="foto">
    <small id="emailHelp" class="form-text text-muted">Tidak boleh lebih dari 5mb</small>
  </div>
  <div class="form-group mb-2">
    <label>Deskripsi</label>
    <textarea class="form-control" id="exampleInputPassword1" style="height: 25%;" name="deskripsi"></textarea>
    <small id="emailHelp" class="form-text text-muted">Harus jelas dan singkat</small>

  </div>
  <div class="form-check mt-2 mb-1">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="on" name="anon">
    <label class="form-check-label" for="exampleCheck1">Laporkan Secara Anonim</label>
  </div>
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
</div>
</div>
<div class="w-100 fixed-bottom text-center bg-dark text-white">Anti Bullying Reporting Software (ABRIS)</div>

    </body>
</html>