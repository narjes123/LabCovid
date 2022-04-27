<?php $title = "Chat" ; ?>
<?php include("includes/const.php"); ?>
<?php include("partials/_header2.php"); ?>

<?php
if(isset($_GET['u_id'])){
    
    $get_id = $_GET['u_id'];
    $get_user = $con->query("SELECT * FROM user where user_id='$get_id'");
    $row_user = $get_user->fetch();
    $user_to_msg = $row_user['user_id'];
    $user_to_name = ucwords($row_user['prenom']).' '.ucwords($row_user['nom']);

}
$user = $_SESSION['email'];
$get_user = $con->query("SELECT * FROM user where email ='$user'");
$row = $get_user->fetch();
$user_from_msg = $row['user_id'];
$user_from_name = ucwords($row['prenom']).' '.ucwords($row['nom']);
?>
<div class='row pad'>
<div class='col-md-3' id='select_user'>
    <?php
    $user = $con->query("SELECT * from user");
    while($row_user = $user->fetch()){
        $user_id = $row_user['user_id'];
        $user_name = ucwords($row_user['prenom']).' '.ucwords($row_user['nom']);
        $user_img = $row_user['user_img'];
        echo "
        <div class='container-fluid' >
        <a href='chat.php?user_id=$user_id'>
        <img class='img-circle' src='profile_img/$user_img' height='80px' width='90px'><strong>&nbsp; $user_name</strong><br><br>
        </a>
        </div>
        ";    
    }
    ?>
    </div>
    <div class='col-md-6'>
        <div class='load-msg' id='scroll-messages'>
            <?php
            
            $msg_insert = $con->query("SELECT * FROM messages WHERE (user_to = '$user_to_msg' AND user_from = '$user_from_msg') OR (user_to = '$user_from_msg' AND user_from = '$user_to_msg')");
            while($row_msg=$msg_insert->fetch()){
                $user_to = $row_msg['user_to'];
                $user_from = $row_msg['user_from'];
                $msg = $row_msg['msg'];
                $msg_date = $row_msg['date'];
                ?>
                <div id='loaded_msg'>
                    <p><?php if($user_to == $user_to_msg AND $user_from = $user_from_msg){
                        echo "<div class='msg' id='send' data-toggle='tooltip' title='$msg_date' >$msg</div><br><br><br>";}
                        else if($user_from == $user_to_msg AND $user_to == $user_from_msg){
                            echo "<div class='msg' id='recieved' data-toggle='tooltip' title='$msg_date' >$msg</div><br><br><br>";
                        }
                     ?></p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if(isset($_GET['u_id'])){
            $user_id = $_GET['u_id'];
            if($user_id == "new"){
                echo "
                <form>
                <center><h3>Sélectionner quelqu'un pour démarrer la conversation</h3></center>
                <textarea disabled class='form-control' placeholder='Ecrivez ...' ></textarea>
                <input type='submit' class='btn btn-default' disabled value='Envoyer'>
                </form><br><br>
                ";
            }
            else{
                echo " 
                <form action='' method='POST' >
                <textarea class='form-control' placeholder='Ecrivez ...' name='msg-box' id='message-textarea'></textarea>
                <input type='submit' id='btn-msg' name='send-msg' value='Envoyer'>
                </form><br><br>
                ";
            }
        }
        ?>
        <?php
            if (isset($_POST['send-msg'])){
                $msg = ($_POST['msg-box']);
                if($msg==''){
                    echo"<h4 style='color:red;text-align:center;'>Message non envoyé ! </h4>";

                }else if(strlen($msg) > 100 ){
                    echo "<h4 style='color:red;text-align:center;'> Message très long ! </h4>";

                }else{
                    $con->exec("INSERT into messages(user_to,user_from,msg,date,msg_seen)VALUES ('$user_to_msg','$user_from_msg','$msg',NOW(),'no')");
                }
            }
?>

    </div>


<?php
if(isset($_GET['u_id'])){
    
    $get_id = $_GET['u_id'];
    $get_user = $con->query("SELECT * FROM user where user_id='$get_id'");
    $row = $get_user->fetch();
    $user_id = $row['user_id'];
    $user_name = ucwords($row['prenom']).' '.ucwords($row['nom']);
    $user_img = $row['user_img']; }


if ($get_id=="new"){

}


else{
    echo"
    
 <div class='col-md-3'>       
<center>
    <div style='background-color:#e6e6e6;'>
        <h2>Informations </h2>


        <img class='img-circle' src='profile_img/$user_img' width='150' height='150'>
        <br><br>
        <ul class='list-group'>
        <li class='list-group-item' title='User name'><strong style='color:grey;'>$user_name </strong></li> 
</ul>

</div>
</div>

";
}
?>
</div>
</div>
</div>
<?php
    include("partials/_footer.php");?>