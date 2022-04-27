 
   
 <?php if($title == "Home"): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="assets/labo.png" alt="" width="120" height="120" class="d-inline-block ">
      <strong><?= WebSite_Name ?></strong>
    </a>
    <?php include("session.php"); ?>
    <ul class="navbar-nav flex-row d-none d-md-flex">
      
      <li class="nav-item">
      <a class="nav-link" href='profile.php?<?php echo "user_id=$user_id" ?>'><?php echo "<i>".ucwords($user_fname)."</i>" ?> </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


      <li class="nav-item">
        <a class="nav-link" href="home.php"><strong>Accueil</strong></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="chat.php?user_id=new" >Messagerie</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="databases.php" >Ressources</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="members.php" >Recherche</a>
      </li>
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <?php
        if(isset($_GET['logout']))
        {
          $con->exec("UPDATE user set tmp_conn= NOW()");
          session_destroy();
          header("location:index.php");
        }
        ?>
        <a class="nav-link" href="?logout">Déconnexion</a>
        
      </li>
    </ul>
    <form class="d-flex" action="" method="GET">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button type="submit"><i class="fa fa-search"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg></button>
    </form>
  </div>
</nav>
<?php elseif($title == "Chat"): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="assets/labo.png" alt="" width="120" height="120" class="d-inline-block ">
      <strong><?= WebSite_Name ?></strong>
    </a>
    <?php include("session.php"); ?>
    <ul class="navbar-nav flex-row d-none d-md-flex">
    
    <li class="nav-item">
      <a class="nav-link" href='profile.php?<?php echo "user_id=$user_id" ?>'><?php echo "<i>".ucwords($user_fname)."</i>" ?> </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    
      <li class="nav-item">
        <a class="nav-link " href="home.php">Accueil</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="chat.php?user_id=new" ><strong>Messagerie</strong></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="databases.php" >Ressources</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
      <li class="nav-item">
        <a class="nav-link" href="members.php" >Recherche</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <li class="nav-item">
      <?php
        if(isset($_GET['logout']))
        {
          $con->exec("UPDATE user set tmp_conn= NOW()");
          session_destroy();
          header("location:index.php");
        }
        ?>
        <a class="nav-link" href="?logout">Déconnexion</a>
        
      </li>
    </ul>
    <form class="d-flex" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button type="submit"><i class="fa fa-search"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg></button>
    </form>
  </div>
</nav>

<?php elseif($title == "Recherche"): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="assets/labo.png" alt="" width="120" height="120" class="d-inline-block ">
      <strong><?= WebSite_Name ?></strong>
    </a>
    <?php include("session.php"); ?>
    <ul class="navbar-nav flex-row d-none d-md-flex">
 
    <li class="nav-item">
      <a class="nav-link" href='profile.php?<?php echo "user_id=$user_id" ?>'><?php echo "<i>".ucwords($user_fname)."</i>" ?> </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    
      <li class="nav-item">
        <a class="nav-link " href="home.php">Accueil</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="chat.php?user_id=new" >Messagerie</strong></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="databases.php" >Ressources</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
      <li class="nav-item">
        <a class="nav-link" href="members.php" ><strong>Recherche</strong></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <li class="nav-item">
      <?php
        if(isset($_GET['logout']))
        {
          $con->exec("UPDATE user set tmp_conn= NOW()");
          session_destroy();
          header("location:index.php");
        }
        ?>
        <a class="nav-link" href="?logout">Déconnexion</a>
        
      </li>
    </ul>
    <form class="d-flex" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button type="submit"><i class="fa fa-search"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg></button>
    </form>
  </div>
</nav>
<?php elseif($title == "Databases"): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="assets/labo.png" alt="" width="120" height="120" class="d-inline-block ">
      <strong><?= WebSite_Name ?></strong>
    </a>
    <?php include("session.php"); ?>
    <ul class="navbar-nav flex-row d-none d-md-flex">
  
    <li class="nav-item">
      <a class="nav-link" href='profile.php?<?php echo "user_id=$user_id" ?>'><?php echo "<i>".ucwords($user_fname)."</i>" ?> </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <li class="nav-item">
        <a class="nav-link" href="home.php">Accueil</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="chat.php" >Messagerie</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="databases.php" ><strong>Ressources</strong></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
      <li class="nav-item">
        <a class="nav-link" href="members.php" >Recherche</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <li class="nav-item">
      <?php
        if(isset($_GET['logout']))
        {
          $con->exec("UPDATE user set tmp_conn= NOW()");
          session_destroy();
          header("location:index.php");
        }
        ?>
        <a class="nav-link" href="?logout">Déconnexion</a>
        
      </li>
    </ul>
    <form class="d-flex" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button type="submit"><i class="fa fa-search"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg></button>
    </form>
  </div>
</nav>
<?php elseif($title == "Profile"): ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
      <img src="assets/labo.png" alt="" width="120" height="120" class="d-inline-block ">
      <strong><?= WebSite_Name ?></strong>
    </a>
    <?php include("session.php"); ?>
    <ul class="navbar-nav flex-row d-none d-md-flex">
   
    <li class="nav-item">
      <a class="nav-link" href='profile.php?<?php echo "user_id=$user_id" ?>'><?php echo "<i><strong>".ucwords($user_fname)."</strong></i>" ?> </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <li class="nav-item">
        <a class="nav-link" href="home.php">Accueil</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="chat.php" >Messagerie</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="databases.php" >Ressources</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
      <li class="nav-item">
        <a class="nav-link" href="members.php" >Recherche</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <?php
        if(isset($_GET['logout']))
        {
          $con->exec("UPDATE user set tmp_conn= NOW()");
          session_destroy();
          header("location:index.php");
        }
        ?>
        <a class="nav-link" href="?logout">Déconnexion</a>
        
      </li>
    </ul>
    <form class="d-flex" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button type="submit"><i class="fa fa-search"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg></button>
    </form>
  </div>
</nav>
<?php endif; ?>