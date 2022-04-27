<?php $title = "Accueil" ; ?>
<?php include("includes/const.php"); ?>
<?php include("partials/_header.php"); ?>
    <div class="container pad">
      <div class="row">
        <div class="col-md-6 ">
          <h1><?= WebSite_Name; ?></h1>
          <p class="lead"><?= WebSite_Name?> est le réseau social des chercheurs.<br> Grace à ce site vous avez la possibilité de tisser des liens d'amitié avec d'autres chercheurs , échanger vos recherches et bien plus encore!<br> Alors n'hésitez plus et <a href="inscription.php">rejoignez dés maintenant notre communité</a>! </p>
          <a href="inscription.php" class="btn btn-primary btn-plg">Créer un compte</a>
        </div>
        <div class="col-md-6">
          <img src="assets/img1.jpg" alt="" height="400">
        </div>
      </div>
    </div>
<?php
    include("partials/_footer.php");?>


    