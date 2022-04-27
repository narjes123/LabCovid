<?php $title = "Profile" ; 
 include("includes/const.php"); 
 include("partials/_header2.php"); 
 include('time.php');
?>
<div class="row ">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div >
       <img src="assets/cov.jpg" alt="" class="img-rounded" height="400px" width="100%">
       </div>
       <?php
      
       echo
       "<div id='profile-img'>
           
           <img src='profile_img/$user_img' alt='profile' class='img-circle' width='180px' height='185px'>
           <form action='profile.php?id=$user_id' method='post' enctype='multipart/form-data'>
           <label id='update-profile'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-camera' viewBox='0 0 16 16'>
           <path d='M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z'/>
           <path d='M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z'/>
         </svg>
           <input type='file' name='profile' size='60'>
           </label><br><br>
           <button name='update' class='btn btn-secondary' id='button_profile'>Changer profil</button>
           </form>
       </div><br>"
       ?>
       <?php
       if(isset($_POST['update'])){
           $user_img = $_FILES['profile']['name'];
           $img_tmp = $_FILES['profile']['tmp_name'];
           
           if($user_img == ''){
               echo "<div class='alert alert-success' role='alert'>
                Choisissez votre profile!
             </div>";
           }
           else{
               move_uploaded_file($img_tmp, "profile_img/$user_img");
               $con->exec("UPDATE user set user_img= '$user_img' where user_id='$user_id'");
               header("location:profile.php?user_id=$user_id");
           }
       }
       ?>
    </div>
</div><br><br><br>
<div class="row">
<div class="col-md-1 "></div>
<div class="col-md-2 ">
    
    <div style='background-color:#e6e6e6;'>
        <h2>A propos </h2>


        <img class='img-circle' src="profile_img/<?php echo $user_img ?>" width='150' height='150'>
        <br><br>
        <ul class='list-group'>
        <li class='list-group-item'><strong style='color:grey;'><?php echo ucwords($user_fname)." ".ucwords($user_lname); ?> </strong></li> 
	<li class='list-group-item'<strong><i style="color:grey;">actif <?php time_stamp($temp)?></i></strong></li>
	<li class='list-group-item'<strong>Adresse email: </strong><?php echo $user?></li>
	</ul>

</div>
</div>
<div class="col-md-8">
    <?php
    global $con;
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    $posts = $con->query("SELECT * FROM post where user_id= '$user_id' order by post_id desc");
    while($row_posts = $posts->fetch()){
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $statut = $row_posts['post'];
        $upload_img = $row_posts['upload_img'];
        $date = $row_posts['date'];

        $user = $con->query("SELECT * FROM user where user_id= $user_id");
        $row_users =$user->fetch();
        $profile_img = $row_users['user_img'];
        $user_name = ucwords($row_users['nom']).' '.ucwords($row_users['prenom']);

        if($statut == 'No' && strlen($upload_img) >= 1){
            echo
            "<div class='container row'>
           
            <div class='col-md-10'>
            <div class='status-media'>
            <div class='media'>
                
                    <img src='profile_img/$profile_img' alt='prof' class='img-circle' width='70px' height='70px'>
                
           <div class='media-body'>
                <a href='profile.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
           </div>
           </div><br>
           <a href='posts/delete_post.php?post_id=$post_id' style='float:right; ' ><button class='btn btn-secondary'>Supprimer</button></a><br><br>
           </div>
           </div>
           </div>";
        }
        elseif( strlen($statut) >= 1 && strlen($upload_img) >= 1){
            echo
            "<div class='container row'>
           
            <div class='col-md-10'>
            <div class='status-media'>
            <div class='media'>
                
                    <img src='profile_img/$profile_img' alt='prof' class='img-circle' width='70px' height='70px'>
                
           <div class='media-body'>
                <a href='profile.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <p>$statut</p>
           <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
           </div>
           </div><br>
           <a href='posts/delete_post.php?post_id=$post_id' style='float:right; ' ><button class='btn btn-secondary'>Supprimer</button></a><br><br>
           </div>
           </div>
           </div>";
           
       }else{  
            echo
            "<div class='container row'>
            
            <div class='col-md-10'>
            <div class='status-media'>
            <div class='media'>
                
                    <img src='profile_img/$profile_img' alt='prof' class='img-circle' width='70px' height='70px'>
                
           <div class='media-body'>
                <a href='profile.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <p>$statut</p>
           </div>
           </div><br>
           <a href='posts/delete_post.php?post_id=$post_id' style='float:right; ' ><button class='btn btn-secondary'>Supprimer</button></a><br><br>
           
           </div>
           </div>
           </div>";
           
        
       }
        

    }
    
    ?>
    </div>
</div>


<?php
    include("partials/_footer.php");?>