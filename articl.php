<?php
include './connection.php';
$parametre = ($_GET['parametre']);
$id = ($_GET['id']);
$sear = ($_GET['search']);

session_start() ;
$conferm = $_SESSION['conferm'];
$day = date('d') ;
$month = date('m') ;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="articl.css">
    <title>Document</title>
</head>
<body>
    <?php
$sel_articl = "SELECT * FROM `evenment` WHERE `id` = '$id' " ; 
    $con_articl = mysqli_query($conn,$sel_articl) ;
    $fet_articl = mysqli_fetch_all($con_articl,MYSQLI_ASSOC) ;
  
    ?>
          <div class="more">
                <h2><?php print_r($fet_articl[0]['name_even']) ;?></h2>
                <img src="icons/<?php print_r($fet_articl[0]['name_file']) ;?>" alt="">
                <p><?php print_r($fet_articl[0]['articl']) ;?></p>
          </div>
    
</body>
</html>