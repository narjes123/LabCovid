<!DOCTYPE html>
<?php
session_start();


if(!isset($_SESSION['email'])){
    header('location:index.php');
}
?>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="reseau social">
    <meta name="author" content="narjes">
    
    <title> <?= WebSite_Name; ?></title>

  
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/index.css">
  </head>
  <body>
 <?php include("partials/_nav2.php");?>
  