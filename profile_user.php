<?php $title = 'Profile';
 include("includes/const.php"); 

 include("partials/_header2.php"); 
 
 include('time.php');
 if(isset($_GET['user_id'])){
    
     $user_id = $_GET['user_id'];
    $select = $con->query("SELECT * FROM user where user_id=$user_id");
    $row = $select->fetch();
    $user_name = ucwords($row['prenom']).' '.ucwords($row['nom']);
    $user_image = $row['user_img'];
    $email = $row['email'];
    $temp = $row['tmp_conn'];

 }
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
           
           <img src='profile_img/$user_image' alt='profile' class='img-circle' width='180px' height='185px'>
           
       </div><br>"
       ?>
       

    </div>
</div><br><br><br>
<div class="row">
<div class="col-md-1 "></div>
<div class="col-md-2 left1">
    <br>
    <center><h2 style="color: grey;"><strong>A propos</strong></h2></center>
    <center><h4><strong><?php echo $user_name ?></strong></h4></center><br>
    <p><strong><i style="color:grey;">actif <?php time_stamp($temp)?></i></strong></p><br>
    <p><strong>Adresse email: </strong><?php echo $email?></p>
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
                <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
           </div>
           </div><br>
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
                <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <p>$statut</p>
           <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
           </div>
           </div><br>
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
                <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <p>$statut</p>
           </div>
           </div><br>
           
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