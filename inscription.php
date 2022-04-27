


<?php $title = "Inscription" ; ?>
<?php include("includes/const.php"); ?>
<?php include("partials/_header.php"); ?>
<?php include ('config/database.php'); ?>


<?php
if (isset($_POST["sub"])){
    $nom =$_POST["nom"];
    $prenom = $_POST ["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    
    $ready = $con->prepare("SELECT user_id FROM user where email = '$email'");
    $ready->execute(array($email));
    if($ready->rowCount() > 0){
        echo "<div class='alert alert-success' role='alert'>
        Adresse email déja utilisée!
      </div>";
    }
    elseif(strlen($password) <6){
        echo "<div class='alert alert-success' role='alert'>Mot de passe trop courte!</div>";
    }
    
    else if($password != $confirm_password){
        echo "<div class='alert alert-success' role='alert'>Mot de passe incorrect</div>";
    }
    
    else{
        $inscrit = $con->prepare("INSERT INTO user (nom,prenom,email,password,confirm_password) VALUES('$nom','$prenom', '$email',  '$password','$confirm_password')");
        $inscrit->execute(array($nom, $prenom, $email, $password, $confirm_password));
        echo "member added successfully. ";
        header("location: connexion.php"); 
    }
}
?>
<?php include("views/inscription.view.php"); ?>
<?php
    include("partials/_footer.php"); ?>

