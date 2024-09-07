<?php
include './connection.php';
$parametre = ($_GET['parametre']);
$id = ($_GET['id']);
$sear = ($_GET['search']);
$dellet = ($_GET['dellet']);

session_start() ;
$conferm = $_SESSION['conferm'];
$day = date('d') ;
$month = date('m') ;

if(isset($_GET['dellet'])){
  $del = "DELETE FROM `evenment` WHERE `id` = '$dellet' " ;
  $delq = mysqli_query($conn,$del) ;
  if($delq){
    header('location:sensibilisation.php') ;

  }else{
    
    mysqli_query_error() ;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sensi.css">
    <title>Document</title>
</head>
<body>
    <nav>
    <img src="Logo de la pharmacie.PNG" alt="Logo de la pharmacie">
    <h1>GeoPharma</h1>
    </nav> 
 

    <div class="continer">
    <?php
if(!$id){

                $sel_articl = "SELECT * FROM `evenment` " ; 
                $con_articl = mysqli_query($conn,$sel_articl) ;
                $fet_articl = mysqli_fetch_all($con_articl,MYSQLI_ASSOC) ; ?>
                                            <?php     
               $select = "SELECT * FROM `evenment` WHERE month(date) = '$month' AND day(date) in ($day,$day+1,$day+2,$day-1,$day-2) ";
               $result = mysqli_query($conn,$select) ;
               $fetch = mysqli_fetch_all($result,MYSQLI_ASSOC);
                ?>
               <div class="even">
     <?php            foreach($fetch as $fet) :
              
      ?>
      
         <div class="event">
               <h2><?php print_r($fet['name_even']) ;  ?></h2>
               <a href="articl.php?id=<?php print_r($fet['id']) ;  ?>"><img src="icons/<?php print_r($fet['name_file']) ;  ?>" alt=""></a>
          </div>
            <?php  endforeach ;         ?>
            </div>
  <h2>Calendrier de Sensibilisation</h2>
  <div class="grid-container">
  <?php  
     foreach($fet_articl as $articl): ?>
    <div class="grid-item" >
      <img src="icons/<?php print_r($articl['name_file']) ;?>" alt="poumon">
      <h3><?php print_r($articl['name_even']) ;   ?></h3>
      <div><a href="articl.php?id=<?php print_r($articl['id']) ;   ?>">more</a>
      <?php
              if($conferm == '2'){
      ?>
      <a href="sensibilisation.php?dellet=<?php print_r($articl['id']) ;   ?>">dellet</a> 
      <?php  } ?>
      </div>
    </div>
    <?php
  endforeach ;}else{
    $sel_articl = "SELECT * FROM `evenment` WHERE `id` = '$id' " ; 
    $con_articl = mysqli_query($conn,$sel_articl) ;
    $fet_articl = mysqli_fetch_all($con_articl,MYSQLI_ASSOC) ;
  
    ?>
          <div class="more">
                <h2><?php print_r($fet_articl[0]['name_even']) ;?></h2>
                <img src="icons/<?php print_r($fet_articl[0]['name_file']) ;?>" alt="">
                <p><?php print_r($fet_articl[0]['articl']) ;?></p>
          </div>

<?php  }   ?>

</div>
</div>
    </div>
</body>
</html>