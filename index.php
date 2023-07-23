<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./library/bootstrap/css/bootstrap.min.css">
        <script src="./library/swal.js">
    </head>
    <body>
<button class="btn btn-danger">
<?php
try {
    # MS SQL Server and Sybase with PDO_DBLIB 
    # MySQL with PDO_MYSQL 
    $DBH = new PDO("mysql:host=127.0.0.1;dbname=udinstore", "root", "");
  }
  catch(PDOException $e) {
      echo $e->getMessage();
  }
?>
</button>
<?php
$STH = $DBH->prepare("select * from migrations");
$STH->execute();
# showing the results 
var_dump($STH->fetchAll());
?>
    </body>
</html>
