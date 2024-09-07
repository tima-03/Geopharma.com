<?php
include './connection.php' ;
session_start() ;

 $id_user = $_SESSION['id'];
$conferm = $_SESSION['conferm'];
 if(!$id_user or $conferm == 0){
    header('location:log.php') ;
 }
 if($conferm ==2){
  header('location:dash.php') ;
 }

if(isset($_GET['logout'])){
    unset($id_user) ;
    session_destroy() ;
    header('location:log.php') ;
}
$delet = $_GET['delet'] ;
$id = $_GET['id'] ;
$search = $_GET['search'] ;
if(isset($delet)){
    $del = "DELETE FROM `medicament` WHERE `id`= '$delet'";
    $delq = mysqli_query($conn,$del) ;
        header('location:medicament.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
    header("location:medicament.php?search=".$search_med);

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
        if(!$id){
              $sel = "SELECT * FROM `medicament` WHERE `id_pharm` = $id_user ";
              $med_res = mysqli_query($conn , $sel) ;
    $med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);
    // print_r($med);
    foreach($med as $medicament):?>
   <div class="exdoc" >
               <img src="icons\<?php  print_r($medicament['name_file']) ; ?>" class="doc3" alt="<?php  print_r($medicament['name_med']) ; ?>">
           
                   <h4> <?php  print_r($medicament['name_med']) ; ?></h4>
                   <h4><?php  print_r($medicament['prix']) ; ?>da</h4>
                   <h4><?php  print_r($medicament['count']) ; ?>p</h4>
          <div class="btn">        
  <a href="medicament.php?id=<?php  print_r($medicament['id']) ;  ?>"><button name="btn" class="bt">update</button></a>    
  <a href="medicament.php?delet=<?php print_r($medicament['id']) ;  ?>"><button name="btn" class="delete">delete</button></a>    
  </div> 
           </div>
                 
           <?php  endforeach ;
}else{
    $sel = "SELECT * FROM `medicament` WHERE `id` = $id ";
    $med_res = mysqli_query($conn , $sel) ;
$med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);

           ?>
           <form class="fadd" id="fadd" action="" method="post">
           <?php
                       if(isset($_POST['btnupd'])){
                        $name_med = mysqli_real_escape_string($conn, $_POST['name_med']); 
                        $prix = mysqli_real_escape_string($conn, $_POST['prix']); 
                        $category =mysqli_real_escape_string($conn, $_POST['category']); 
                        $count =mysqli_real_escape_string($conn, $_POST['count']); 
                        if(!empty($name_med) && !empty($prix) && !empty($category) && !empty($count)){
                            $upd = " UPDATE `medicament` SET `name_med`='$name_med', `prix`='$prix', `category`='$category', `count`='$count' WHERE id= '$id' ";
                            if(mysqli_query($conn,$upd)){
                                // header('location:info.php?logout=1') ;
                                echo 'success' ;
                            }else{
                                echo 'error' ;
                            }
                        }
                       
                }
                ?>
           <input type="text" name="name_med" placeholder="name medicament" required="required" value=<?php print_r($med[0]['name_med']) ;  ?>>
    <input type="text" name="prix" placeholder="prix" required="required" value=<?php print_r($med[0]['prix']) ;  ?>>
    <input type="text" name="category" placeholder="category" required="required" value=<?php print_r($med[0]['category']) ;  ?>>
    <input type="number" name="count" placeholder="count" required="required" value=<?php print_r($med[0]['count']) ;  ?>>
    <input type="submit" name="btnupd" class="btnadd">
           </form>
           <?php
} }else{
    $sql = "SELECT * FROM  `medicament` WHERE  `name_med` LIKE '%$search%' and `id_pharm`= '$id_user'  " ;
                      $med_res = mysqli_query($conn,$sql);
                      $med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);

                      foreach($med as $medicament):?>
                        <div class="exdoc" >
                                    <img src="icons\<?php  print_r($medicament['name_file']) ; ?>" class="doc3" alt="<?php  print_r($medicament['name_med']) ; ?>">
                                
                                        <h4> <?php  print_r($medicament['name_med']) ; ?></h4>
                                        <h4><?php  print_r($medicament['prix']) ; ?>da</h4>
                                        <h4><?php  print_r($medicament['count']) ; ?>p</h4>
                               <div class="btn">        
                       <a href="medicament.php?id=<?php  print_r($medicament['id']) ;  ?>"><button name="btn" class="bt">update</button></a>    
                       <a href="medicament.php?delet=<?php print_r($medicament['id']) ;  ?>"><button name="btn" class="delete">delete</button></a>    
                       </div> 
                                </div>
                                      
                                <?php  endforeach ;
                     }
    ?>
    </div>
</body>
</html>
