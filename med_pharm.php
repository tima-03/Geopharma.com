<?php
include './connection.php' ;
session_start() ;

 $id = $_GET['id'];
 $search = $_GET['search'];



if(isset($_GET['logout'])){
    unset($id_user) ;
    session_destroy() ;
    header('location:log.php') ;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="med.css">
    <title>Document</title>
</head>
<body>  
      <img class="img" src="icons/Capturephar.PNG" alt="" srcset="">
      <nav>
        <h2>geopharm</h2>
        <div class="search">
    
    <?php


 if(isset($_POST['search'])){
    $search_med = mysqli_real_escape_string($conn, $_POST['search_med']);
    header("location:med_pharm.php?id=".$id."&&search=".$search_med);

 }

?>
       <form action="" method="POST">
        <input type="text" class="location" id="location" name="search_med" placeholder="search med">
        <img src="icons/search.png" id="icon" alt="">
        <input type="submit" class="search_med" value="search" name="search">
       </form>
    <!-- </a> -->
    </div>

        <a href="info.php"><img src="user.png" alt=""></a>
    </nav>

<div class="contuner">
        <?php
        if(!$search){
        
              $sel = "SELECT * FROM `medicament` WHERE `id_pharm` = $id ";
              $med_res = mysqli_query($conn , $sel) ;
    $med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);
    // print_r($med);
    foreach($med as $medicament):?>
   <div class="exdoc" >
               <img src="icons\<?php  print_r($medicament['name_file']) ; ?>" class="doc3" alt="<?php  print_r($medicament['name_med']) ; ?>">
           
                   <h4> <?php  print_r($medicament['name_med']) ; ?></h4>
                   <h4><?php  print_r($medicament['prix']) ; ?></h4>
                   
  <a href="medicament.php?id=<?php echo $medicament['id_pharm'] ;  ?>"><button name="btn" class="bt">more</button></a>    
                 
           </div>
                 
           <?php  endforeach ;
           }else{
            $sel = "SELECT * FROM `medicament` WHERE `id_pharm` = $id AND `name_med` LIKE '%$search%' ";
            $med_res = mysqli_query($conn , $sel) ;
  $med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);
  // print_r($med);
  foreach($med as $medicament):?>
 <div class="exdoc" >
             <img src="icons\<?php  print_r($medicament['name_file']) ; ?>" class="doc3" alt="<?php  print_r($medicament['name_med']) ; ?>">
         
                 <h4> <?php  print_r($medicament['name_med']) ; ?></h4>
                 <h4><?php  print_r($medicament['prix']) ; ?></h4>
                 
<a href="medicament.php?id=<?php echo $medicament['id_pharm'] ;  ?>"><button name="btn" class="bt">more</button></a>    
               
         </div>
               
         <?php  endforeach ; }
         ?>

    </div>
    
</body>
</html>