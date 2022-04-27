<?php $title = "Recherche" ; ?>
<?php include("includes/const.php"); ?>
<?php include("partials/_header2.php"); ?>

<div class="container pad col-md-offset-3 col-md-9">
    
</div>

<?php

    
    function search_user(){

        global $con;
        if (isset($_GET['search_user_btn'])){
                $search_query = $_GET['search_user'];
                 $get_user = $con->query( "SELECT * FROM user WHERE nom like '%$search_query%' OR prenom LIKE '%$search_query%' ");

        }
        else{
            $get_user=$con->query("SELECT  * FROM user") ;
        }
         
        while($row_user =$get_user->fetch()){
            $user_id =$row_user['user_id'];
            $nom=$row_user['nom'];
            $prenom=$row_user['prenom'];
            $user_img=$row_user['user_img'];


            echo"
            <div class='container row'>
            <div class='col-md-2'></div>
            <div class='col-md-10'>
               <div  id='find_people'>
                                      
                <a href='profile_user.php?user_id=$user_id'>
                <div  >            
            <img src='profile_img/$user_img' width='150px' height='140px' title='$nom'  style='float:left;,margin:1px' />
                                
                </a>
                 
                <div class='col-md-offset-4 '>
                <br><br>
             
                <a style='text-decoration:'none; cursor:pointer;color:#3897f0;' href='profile_user.php?user_id=$user_id'>
                <stdong>
                    <h2>".ucwords($nom).' '.ucwords($prenom)."</h2>
                </stdong>
                </a>
                 </div>
                </div>
                </div>
                </div>
                </div>
             <br><br>
           
                    ";
        }
    }
    
    
    
    ?>

   
 <div class="container">
  
                <center>
      <h2> Trouver des amis</h2>
     </center>
        <br><br>
      <div class="row">
          <div class="col-md-4"></div>
            <div class="col-md-4">
                
                    <form class="search_form action="NULL">
                    <input type="text"  placeholder="Trouver des amis "name="search_user">
                    <button class="btn btn-secondary" type="submit" name="search_user_btn">Recherche</button>
                
                    </form>
                
            

         </div>
            <br><br>
            <?php search_user(); ?>
        </div>
    </div>
</div>
                
                
<?php include("partials/_footer.php");    ?>