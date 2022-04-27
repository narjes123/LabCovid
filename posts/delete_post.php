<?php
include('../config/database.php');
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
   
    $con->exec("DELETE FROM post where post_id='$post_id'");
    echo "<div class='alert alert-success' role='alert'>Votre statut est supprimée!</div>";
    header("location:../profile.php");
}
?>