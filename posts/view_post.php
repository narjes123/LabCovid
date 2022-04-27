<div class="col-md-10 container pad">
    <br><br>
<center><h1 style="color: grey;">**** Commentaires ****</h1></center><br><br>
<?php
include('../session.php');

if (isset($_GET['post_id'])){
    $get_id = $_GET['post_id'];
    $get_posts = $con->query("SELECT * from post where post_id=$get_id");
    $row_posts = $get_posts->fetch();
    $post_id = $row_posts['post_id'];
    $user_id = $row_posts['user_id'];
    $statut = $row_posts['post'];
    $upload_img = $row_posts['upload_img'];
    $date = $row_posts['date'];

    $select = $con->query("SELECT * from user WHERE user_id = $user_id");
    $row = $select->fetch();
    $user_name = $row['prenom'];
    $user_img =$row['user_img'];

    $user_com = $_SESSION['email'];
    $get_com = $con->query("SELECT * from user where email =$email");
    $row_com = $get_com->fetch();
    $user_com_id = $row_com['user_id'];
    $user_com_name = $row_com['prenom'];

}
?>
</div>