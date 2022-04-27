<?php $title = "Connexion" ; ?>
<?php include("includes/const.php"); ?>
<?php include("partials/_header.php"); ?>

<?php
session_start();
include("config/database.php");
if(isset($_POST["connexion"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = $con->prepare("SELECT * FROM user WHERE email= '$email' AND password= '$password'");
    $select->execute(array($email, $password));

    if($select->rowCount() ==1){
        $_SESSION['email'] = $email;
        header('location:home.php');
    }
    else{
        echo "<div class='alert alert-success' role='alert'>Adresse email ou mot de passe incorrect!</div>";
    }
}
      
?>
<?php include("views/connexion.view.php"); ?>
<?php
    include("partials/_footer.php");?>