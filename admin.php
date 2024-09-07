<?php
include './connection.php' ;
session_start() ;
$id_user = $_SESSION['id'];
$conferm = $_SESSION['conferm'];
$parametre = ($_GET['parametre']);
$sear = ($_GET['search']);
// print_r($_SESSION) ;

   if($conferm !='admin'){
       if($conferm == 2 or $conferm == 1){
        header('location:info.php');
       }else{
        header('location:log.php');
       }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashbord.css">

    <title>Document</title>
</head>
<body>
<nav>
        <h2>geopharm</h2>
        <a href="info.php"><img src="user.png" alt=""></a>
    </nav>
<a class="logout" href="info.php?logout=<?php echo $id_user ;   ?>">
            <h2>logout</h2>
               <img src="logout.png" alt="" onclick="return confirm('are you sure logout'); "  >
            </a>
<div class="edit">
    <?php
            if(!$parametre){
    ?>
    <a href="add_agent.php" class="activ"><div >
        <img src="icons/add.png" alt="">
        <span>add agent_dsp</span>
    </div></a>
    <a href="admin.php?parametre=edit" class="activ"><div >
        <img src="icons/user.png" alt="">
        <span>consultation</span>
    </div></a>
    <a href="contact.php" class="activ"><div >
        <img src="icons/msg.png" alt="">
        <span>contact</span>
    </div></a>
   
    <?php
    }
    if($parametre=='edit'&& !$sear ){
        ?>
        <div class="con">
           <div class="search">
  <form action="" method="POST">
    <input type="text" class="inp_sear" name="search" placeholder="search">
    <input type="submit" name="btn_search" value="search" class="btnsearch">
    <?php 
     if(isset($_POST['btn_search'])){
        $search=mysqli_real_escape_string($conn,$_POST['search']);
         header("location:admin.php?parametre=edit&&search=".$search);
        
         } 
         ?>
  </form>
 </div>
<div class="pharmacier">
<?php  
        $select = "SELECT * FROM `pharmacier` WHERE  `conferm`=2";
        $res = mysqli_query($conn,$select) ; 
        $fet = mysqli_fetch_all($res,MYSQLI_ASSOC);
        foreach($fet as $pharm):
?>
<div class="pharm">
    <img src="th.jpg" alt="" >
    <h2> <?php  print_r($pharm['name']) ; ?></h2>
      <h2> <?php  print_r($pharm['email']) ; ?></h2>
      <h2> <?php  print_r($pharm['phone']) ; ?></h2>
      <a href=""><h2><?php  print_r($pharm['location']) ; ?></h2></a>
      <a href="gere_agent.php?id=<?php  print_r($pharm['id']) ;    ?>"> edit</a>

</div>

<?php
$id=$pharm['id'];
 endforeach ; ?>
</div>
 <?php   }
  if($parametre=='edit'&& $sear ){ ?>
    <div class="pharmacier">
    <?php  
   
    
              $sql = "SELECT * FROM  `pharmacier` WHERE  `name` LIKE '%$sear%' and `conferm` = 2 or `phone` LIKE '%$sear%' and `conferm` = 2  " ;
              $result = mysqli_query($conn,$sql);
             
             if(mysqli_num_rows($result)>0){
              $fetch  = mysqli_fetch_all($result,MYSQLI_ASSOC); 
              foreach($fetch as $fet):
              
                
        ?>
        <div class="pharm">
            <img src="th.jpg" alt="" >
            <h2> <?php  print_r($fet['name']) ; ?></h2>
              <h2> <?php  print_r($fet['email']) ; ?></h2>
              <h2> <?php  print_r($fet['phone']) ; ?></h2>
              <a href=""><h2><?php  print_r($fet['location']) ; ?></h2></a>
              <a href="gere_gard.php?id=<?php  print_r($fet['id']) ;    ?>"> edit</a>

        </div>
        
<?php 
endforeach ;
}
}  
    ?>
    </div>
    
    
</body>
</html>