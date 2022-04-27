<?php

include('time.php');

function insererPost(){
if(isset($_POST['publier'])){
    global $con;
    global $user_id;

	$statut = $_POST['posts'];
	$img = $_FILES['upload_img']['name'];
	$img_temp = $_FILES['upload_img']['tmp_name'];
	

	if(strlen($img) >= 1 && strlen($statut) >= 1){
		move_uploaded_file($img_temp, "uploaded/$img");
		$con->exec("INSERT INTO post (user_id, post, upload_img, date) VALUES ('$user_id','$statut','$img',NOW() )");
		echo "<div class='alert alert-success' role='alert'>Votre statut est mise à jour! </div>";
		
	}
	elseif ($statut == '' && $img == ''){
		echo "<div class='alert alert-success' role='alert'>
		Erreur!
	  </div>";
	}
	elseif ($statut == ''){
			move_uploaded_file($img_temp, "uploaded/$img");
			$con->exec("INSERT INTO post (user_id, post, upload_img, date) VALUES ('$user_id','No', '$img',NOW() )");
			echo "<div class='alert alert-success' role='alert'>Votre statut est mise à jour! </div>";
		
		}
		else{
			$con->exec("INSERT INTO post (user_id, post, date) VALUES ('$user_id','$statut', NOW() )");
			echo "<div class='alert alert-success' role='alert'>Votre statut est mise à jour! </div>";
	
		}
	}
}


function affPost(){

	global $con;
	$get_posts = $con->query("SELECT * from post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC");
while($tab_posts = $get_posts->fetch()){
    $posted_by = ucwords($tab_posts['nom']." ".$tab_posts['prenom']);
    $upload_img = $tab_posts['upload_img'];
    $profile_img = $tab_posts['user_img'];
    $statut=$tab_posts['post']; 
    $post_id = $tab_posts['post_id'];
    $user_id = $tab_posts['user_id'];
    $date = $tab_posts['date'];
	
    if($statut == 'No' && strlen($upload_img) >= 1){
        echo
        "<div class='container row'>
        <div class='col-md-2'></div>
        <div class='col-md-10'>
		<div class='status-media'>
        <div class='media'>
            
       <img src='profile_img/$profile_img' alt='prof' class='img-circle' width='70px' height='70px'>
            
       <div class='media-body'>
            <a href=profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$posted_by</h5></a>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
  <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
  <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
</svg>".' '.$date."</div>
       <div >
       <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
       </div><br>
       
       <a href='posts/view_post.php?post_id=$post_id' style='float: right;'><button class='btn btn-secondary'>Voir commentaires</button></a><br>
       </div><br>
       </div>
       </div>
       </div>";    
  }
    elseif( strlen($statut) >= 1 && strlen($upload_img) >= 1){
        echo
        "<div class='container row'>
        <div class='col-md-2'></div>
        <div class='col-md-10'>
		<div class='status-media'>
        <div class='media'>
            
                <img src='profile_img/$profile_img' alt='prof' class='img-circle' width='70px' height='70px'>
            
       <div class='media-body'>
            <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$posted_by</h5></a>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
  <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
  <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
</svg>".' '.$date."</div>
       <div >
       <p>$statut</p>
       <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
       </div><br>
       <a href='posts/view_post.php?post_id=$post_id' style='float: right;'><button class='btn btn-secondary'>Voir commentaires</button></a><br>
       </div><br>
       </div>
       </div>
       </div>";
       
   }else{  
        echo
        "<div class='container row'>
        <div class='col-md-2'></div>
        <div class='col-md-10'>
		<div class='status-media'>
        <div class='media'>
            
                <img src='profile_img/$profile_img' alt='prof' class='img-circle' width='70px' height='70px'>
            
       <div class='media-body'>
            <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$posted_by</h5></a>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
  <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
  <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
</svg>".' '.$date."</div>
       <div >
       <p>$statut</p>
       </div><br>
       <a href='comment.php?post_id=$post_id' style='float: right;'><button class='btn btn-secondary'>Voir commentaires</button></a><br>
       </div><br>
       </div>
       </div>
       </div>";
      
    
   }
}
}
	
        
							
?>