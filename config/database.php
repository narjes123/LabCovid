<?php
  //$con = mysqli_connect("localhost", "root", "", "prj");
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'prj');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
  
  try{
    $con = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME , DB_USERNAME , DB_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
     

} catch(PDOException $e){
      die( 'Erreur: '.$e->getMessage());
 }
  
  ?>