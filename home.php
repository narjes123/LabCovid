<?php $title = "Home" ; 
 
 include('includes/const.php');
 include("partials/_header2.php"); 
 include('posts/posts.php');
?>

<div class="row container pad">
    <div class="col-md-2 left">
    
        <p><img src="<?php echo 'profile_img/'.$user_img; ?>" alt='' class='img-circle' width='100px' height='100px'></p>
        <label>Nom et Prénom</label><br>
        <b><?php echo ucwords($user_fname).' '.ucwords($user_lname);?></b>
        <br><br>
        <label>Email</label><br>
        <b><?php echo $tab['email']; ?></b>
        <br><br>
    </div>
    <div class="col-md-10 ">
        <div class="status-post">
        
            <form action="home.php?id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <textarea name="posts" id="posts" rows="5" placeholder="Alors, partagez vos pensées ici!" class="form-control" ></textarea>
                </div>
                <div class="status-post-submit">
                    <label class="btn btn-default" id="upload_img_buttton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                    <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z"/>
                    </svg> Photos<input type="file" name="upload_img" class="btn btn-default" size=30>
                    </label>
                    <button id='btn-post' class="btn btn-primary" name="publier">Publier</button>
                </div>
            </form>
            <?php insererPost(); ?>
        </div>
</div><br>
<center><h1 style="color: grey;">**** Fil d'actualité ****</h1></center><br><br>
    
<?php affPost(); ?>


<?php
    include("partials/_footer.php");?>
    
    