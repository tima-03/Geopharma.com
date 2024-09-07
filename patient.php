<?php
  include './connection.php' ;
  session_start() ;
//   print_r($_SESSION) ;
  $id_user = $_SESSION['id'];
  $conferm = $_SESSION['conferm'];
//   echo $conferm. $id_user ;
$parametre = ($_GET['parametre']);

  if($conferm){
    header('location:info.php') ;
  }
  if(!$id_user){
    header('location:geopharm.php') ;

  }
  $select_msg = "SELECT * FROM `contacte` ";
  $result_msg = mysqli_query($conn,$select_msg);
  $msg= mysqli_fetch_all($result_msg,MYSQLI_ASSOC);
  print_r($msg) ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">

    <title>Document</title>
</head>
<body>


    
</body>
</html>