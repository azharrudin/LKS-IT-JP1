<?php
    include("./../abris.php");
    $b = new Abris();
    $msg="";
    $cari="";
    $carinis="";

    if(isset($_COOKIE["guser"]) && isset($_COOKIE["gpass"])){

    $test = $b->loginguru($_COOKIE["guser"], $_COOKIE["gpass"]);
    if($test < 1){
        header("Location: /login_guru.php");
    }
 
    if(isset($_GET["cari"])){
$cari = $_GET["cari"];
    }
    
    if(isset($_GET["tanggapi"])){
        $b->m->query("UPDATE laporan SET readed=1 WHERE id LIKE ".$_GET["tanggapi"]);
            }
    if(isset($_GET["carinis"])){
        $carinis = $_GET["carinis"];
            }
            if(isset($_GET["logout"])){
                setcookie("guser", null, -1, "/");
                setcookie("gpass", null, -1, "/");

                    }
    }
    else {
        header("Location: /login_guru.php");

    }
?>
<html>
    <head>
        <title>ABRIS ADMIN</title>
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
          <a class="nav-link active" aria-current="page" href="#">Main Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontak Guru</a>
        </li>
     
      </ul>
      <form class="d-flex mt-1 mb-1">
        <button class="btn btn-danger" name="logout" value=1>Logout</button>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
               
                    <li>
                        <a href="#" class="nav-link text-dark py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <i class="bi-table fs-1"></i>
                        </a>
                    </li>
                  
                    <li>
                        <a href="listsiswa.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="bi-people fs-1"></i>
                        </a>
                    </li>
                    <li>
                    <a href="#" class="nav-link py-3 px-2" >
                        <i class="bi-person-circle h2"></i>
                    </a>
                    </li>
                </ul>
                
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <div class="alert alert-success">Dashboard Guru > Laporan Siswa</div>
            <h4 class="mt-3 mb-3">Laporan Siswa</h4>
            <div class="d-flex justify-content-end mb-3">
                <input class="form-control me-2 w-25" id="cari" placeholder="Cari berdasarkan Deskripsi">
                <input class="form-control me-2 " style="width: 200px;" id="carinis" placeholder="Cari berdasarkan Pelapor">
                <button class="btn btn-success" onclick="cari()">
                    <i class="bi-search"></i>
</button>
            </div>
            <div>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Pelapor</th>
                        <th>NISN</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Foto</th>
                        <th>Tanggapi</th>
                        
                    </tr>
                    <?php
                    $v  = $b->m->query("SELECT *
                    FROM laporan
                    INNER JOIN siswa
                    ON laporan.nisn = siswa.nisn WHERE laporan.deskripsi LIKE ".$b->quote("%".$cari."%")." AND (siswa.nama LIKE ".$b->quote("%".$carinis."%").") ORDER BY id desc")->fetchAll();
                    foreach($v as $val):
                    ?>
<tr>
                        <td><?= $val["id_laporan"] ?></td>
                        <td><?= $val["anonim"] ? "<i>ANONIM</i>":$val["nama"] ?></td>
                        <td><?= $val["anonim"] ? "<i>ANONIM</i>":$val["nisn"] ?></td>
                        <td><?= htmlspecialchars($val["deskripsi"]); ?></td>
                        <td><?= $val["tgl"] ?></td>

                        <td><a href="/foto/<?= $val["foto"]?>">Click Here</a></td>
                        <td><?= $val["readed"] ? "<button class='btn btn-danger'>Batalkan</button>":"<a class='btn btn-success' href='?tanggapi=".$val["id"]."'>Tanggapi</a>" ?></td>
                        
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tabel>
            </div>
        </div>
    </div>
</div>
<div class="w-100 fixed-bottom text-center bg-dark text-white">Anti Bullying Reporting Software (ABRIS)</div>

<script>
    function cari(){ window.location="?cari="+document.getElementById("cari").value+"&carinis="+document.getElementById("carinis").value }
</script>
    </body>
</html>