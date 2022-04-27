<?php
include('config/database.php');
$user =$_SESSION['email'];
$res = $con->query("SELECT * FROM user WHERE email = '$user'");
$tab = $res->fetch();

$user_id = $tab['user_id'];
$user_fname = $tab['prenom'];
$user_lname = $tab['nom'];
$user_img = $tab['user_img'];
$temp = $tab['tmp_conn'];
?>