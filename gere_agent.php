<?php
include './connection.php' ;
session_start() ;
$id_user = $_SESSION['id'];
$conferm = $_SESSION['conferm'];
$parametre = ($_GET['parametre']);
$sear = ($_GET['search']);
$id = ($_GET['id']);


   if($conferm !='admin'){
    header('location:log_admin.php');
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gere.css">

    <title>Document</title>
</head>
<body>
<div class="contuner">
         <?php
          $select = "SELECT * FROM `pharmacier` WHERE `id`=$id ";
          $res = mysqli_query($conn,$select) ; 
          $fet = mysqli_fetch_all($res,MYSQLI_ASSOC);
          
          $def = json_decode($fet[0]['gard']);
          
         ?>
      
    <div class="con">
        <div class="img">
            <img src="user.png" alt="" srcset="">
        </div>
        <div class="info">
         
          <div class="shaw_info">
            <h2><?php print_r($fet[0]['name']);  ?></h2>
            <hr>
            <h2><?php print_r($fet[0]['email']);  ?></h2>
            <hr>
            <h2><?php print_r($fet[0]['phone']);  ?></h2>
            <hr>
            <h2><?php print_r($fet[0]['location']);  ?></h2>
            <hr>
            
         
          </div>
          <a class="logout" href="info.php?logout=<?php echo $id_user ;   ?>">
            <h2>logout</h2>
               <img src="logout.png" alt="" onclick="return confirm('are you sure logout'); "  >
            </a>
          <?php
            if($fet[0]['conferm']==1){
              $c = 'desactive' ;
             }else{
              $c = 'active' ;
             }
             ?>
                 <form class="form" action="" method="post">
                 <a href="contact.php?parametre=<?php print_r($fet[0]['id']);  ?>" ><img src="icons/message.png" class="msg"  alt=""></a> 
                <input type="submit" class="delet" name="delet"  onclick="return confirm('are you sur?'); " value="delet">
                  

                  <input type="submit" name="<?php echo $c ; ?>" id="" value="<?php echo $c ; ?>">
                 </form>
                 <?php
               
                 if(isset($_POST['desactive'])){
                  $updabs = "UPDATE `pharmacier` SET `conferm` = '0' WHERE  `id` = '$id' " ;
                  if(mysqli_query($conn,$updabs)){
                          echo 'update success' ;
                          header('location:gere_gard.php?id='.$id);

                  }  
                 }
                 if(isset($_POST['active'])){
                  $updabs = "UPDATE `pharmacier` SET `conferm` = '2' WHERE  `id` = '$id' " ;
                  if(mysqli_query($conn,$updabs)){
                          echo 'update success' ;
                          header('location:gere_gard.php?id='.$id);
                  }  
                }
                if(isset($_POST['delet'])){
                  $del = "DELETE FROM `pharmacier` WHERE `id` = $id " ;
                  $delq = mysqli_query($conn,$del) ;
                  if($delq){
                    echo 'delet is success' ;
                  }else{
                    mysqli_query_error() ;
                  }
          }

                 ?>
          </div>
      </div>
   </div> 
</body>
</html>