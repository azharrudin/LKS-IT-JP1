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
if(isset($_GET["logout"])){
    setcookie("user", null, -1, "/");
    setcookie("pass", null, -1, "/");
    setcookie("nama", null, -1, "/");

header("listreport.php");
}

}
else {
    header("location: /login_siswa.php");
    echo 0;
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./../library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./../library/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="./../library/style.css">

    </head>
    <body>
    <title>ABRIS List Laporan</title>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ABRiS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="report.php">Laporkan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Laporan Saya</a>
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
<div class="mt-2 p-5 w-75" style="box-shadow: 1px 1px 10px #ccc;border: 1px solid #ccc">
<h4>List Laporan Anda</h4>
<table class="table table-hover table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Pelapor</th>
                        <th>NISN</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Status</th>
                        
                    </tr>
                    <?php
                    $v  = $b->m->query("SELECT *
                    FROM laporan
                    INNER JOIN siswa
                    ON laporan.nisn = siswa.nisn WHERE laporan.nisn LIKE ".$b->quote($_COOKIE["user"]).";")->fetchAll();
                    foreach($v as $val):
                    ?>
<tr>
                        <td><?= $val["id_laporan"] ?></td>
                        <td><?= $val["anonim"] ? "<i>ANONIM</i>":$val["nama"] ?></td>
                        <td><?= $val["anonim"] ? "<i>ANONIM</i>":$val["nisn"] ?></td>
                        <td><?= $val["tgl"]  ?></td>
                        <td><?= $val["deskripsi"] ?></td>
                        <td><img src="/foto/<?= $val["foto"]?>" width=100 height=100></td>
                        <td><?= $val["readed"] ? "<span class='text-success'>Ditanggapi</span>":"<span class='text-danger'>Belum ditanggapi</span>" ?></td>
                        
                    </tr>
                    <?php
                    endforeach;
                    ?>
</div>
<div class="w-100 fixed-bottom text-center bg-dark text-white">Anti Bullying Reporting Software (ABRIS)</div>

    </body>
</html>