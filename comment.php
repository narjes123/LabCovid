
 <?php $title = "Home" ; 
include("includes/const.php"); 
include("partials/_header2.php");
?>
<center><h1 style="color: grey;">**** Commentaires ****</h1></center><br><br>
<?php
if(isset($_GET['post_id'])){
    global $con;
    $get_id = $_GET['post_id'];
    $select = $con->query("SELECT * FROM post where post_id=$get_id");
    $tab_post = $select->fetch();
    $post_id = $tab_post['post_id'];
    $user_id = $tab_post['user_id'];
    $statut = $tab_post['post'];
    $upload_img = $tab_post['upload_img'];
    $date = $tab_post['date'];

    $user = $con->query("SELECT * FROM user where user_id=$user_id");
    $users = $user->fetch();
    $user_name = ucwords($users['prenom']).' '.ucwords($users['nom']);
    $user_img = $users['user_img'];
    
    $user_com = $_SESSION['email'];
    $com = $con->query("SELECT * FROM user where email='$user_com'");
    $tab_com = $com->fetch();
    $com_id = $tab_com['user_id'];
    $com_name =  ucwords($tab_com['prenom']).' '.ucwords($tab_com['nom']);
    $author_img = $tab_com['user_img'];
    
    $get_posts = $con->query("SELECT post_id from post where post_id='$post_id'");
    $run = $con->query("SELECT * FROM post where post_id='$post_id'");
    $row = $run->fetch();
    $id = $row['post_id'];
    if($id != $post_id){
        echo "<div class='alert alert-success' role='alert'>
		Erreur!
	  </div>";
      header('location:comment.php');
    }
    else{
        if($statut == 'No' && strlen($upload_img) >= 1){
            echo
            "<div class='container row'>
            <div class='col-md-2'></div>
            <div class='col-md-10'>
            <div class='status-media'>
            <div class='media'>
                
           <img src='profile_img/$user_img' alt='prof' class='img-circle' width='70px' height='70px'>
                
           <div class='media-body'>
                <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <img src='uploaded/$upload_img' class='post_img' height='350px' width='600px'>
           </div>
           </div>
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
                
                    <img src='profile_img/$user_img' alt='prof' class='img-circle' width='70px' height='70px'>
                
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
            <div class='col-md-2'></div>
            <div class='col-md-10'>
            <div class='status-media'>
            <div class='media'>
                
                    <img src='profile_img/$user_img' alt='prof' class='img-circle' width='70px' height='70px'>
                
           <div class='media-body'>
                <a href='profile_user.php?user_id=$user_id' class='prof'><h5 class='mt-0'>$user_name</h5></a>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
      <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
      <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
    </svg>".' '.$date."</div>
           <div >
           <p>$statut</p>
           </div><br>
           </div>
           </div>
           </div>
           </div>";  
       };
       
       echo"
       <div class='container row'>
            <div class='col-md-2'></div>
            <div class='col-md-10'>
       <form  method='POST' action=''>			
       <div class='comment-area'>
       <input type='text' style='width:800px; height:100px;' name='comment' placeholder='Ecrivez un commentaire...' class='comment-text'>
       <input type='submit' name='commenter' value='Commenter' class='btn btn-primary'>
       </div>
       </form>
       </div>
       </div>";
       if(isset($_POST['commenter'])){
           $comment = $_POST['comment'];
           if($comment == ""){
            echo "<div class='alert alert-success' role='alert'>
            Entrer votre commentaire!
          </div>";
           }
           else{
               $insert = $con->exec("INSERT INTO comments (post_id, user_id, comment, comment_author, author_img)VALUES ('$post_id', '$user_id','$comment', '$com_name', '$author_img')");
               echo "<div class='alert alert-success' role='alert'>
               Commentaire ajouté!
             </div>"; 
              header("location:comment.php?post_id='$post_id'");
           }
           
       }
       }

    }

$get_com = $con->query("SELECT * FROM comments where post_id='$post_id' ORDER BY comment_id DESC");
while ($tab = $get_com->fetch()){
  $comm = $tab['comment'];
  $comm_author = $tab['comment_author'];
  $author_img = $tab['author_img'];
  echo " 
  <div class='container row'>
  <div class='col-md-2'></div>
  <div class='col-md-10'>
<div class='status-media'>
  <div class='media'>
      
 <img src='profile_img/$author_img' alt='prof' class='img-circle' width='50px' height='50px'>
 <div class='media-body'><h6>$comm_author</h6>
</div>
<div >$comm</div><br>
</div>
</div>
</div>
</div>
  ";
}
?>
<?php include("partials/_footer.php");?>
    
    