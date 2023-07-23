
<?php
class Abris {
    public $m;
    function __construct(){
        try {
            # MS SQL Server and Sybase with PDO_DBLIB 
            # MySQL with PDO_MYSQL 
            $this->m = new PDO("mysql:host=127.0.0.1;dbname=AZHAR_679012", "root", "");
          }
          catch(PDOException $e) {
              echo $e->getMessage();
          }
    }
    function quote($r){
        return $this->m->quote($r);
    }
    function loginsiswa($u, $p){
        $c = $this->m->query("SELECT * FROM siswa WHERE nisn LIKE ".$this->quote($u)." and password LIKE ".$this->quote($p));
        return $c->fetchAll();
       
        
    }
    function registersiswa($u, $p, $n){
        try {

        $c = $this->m->query("INSERT INTO siswa VALUES (".$this->quote($u).",".$this->quote($n).",".$this->quote($p).")");
        return true;
    } catch(\PDOException $e){
        return false;
    }
    }
    function loginguru($u, $p){
        $c = $this->m->query("SELECT * FROM admin WHERE email LIKE ".$this->quote($u)." AND password LIKE ".$this->quote($p));
        if(count($c->fetchAll())  > 0) return 1;
        
    }
    function insertlaporan($deskripsi, $tanggal, $nisn, $anon){
        $fname=uniqid("IMG-", 5).".png";
        if(isset($_FILES["foto"])){
            if($_FILES["foto"]["type"] == "image/png" || $_FILES["foto"]["type"] == "image/jpeg"){
                    move_uploaded_file($_FILES["foto"]["tmp_name"], dirname(__FILE__)."/foto/".$fname );
                    $deskripsi = $this->quote($deskripsi);
                    $tanggal = $this->quote($tanggal);
                    $nisn = $this->quote($nisn);
                    $anon = $anon ? 1:0;
                    $id=uniqid("", 5);
                    $c = $this->m->query("INSERT INTO `laporan`(`id_laporan`, `nisn`, `foto`, `deskripsi`, `anonim`) VALUES ('$id', $nisn, '$fname', $deskripsi, $anon)");

                    return $c->fetchAll();
            }
        }
        return false;
    }
}