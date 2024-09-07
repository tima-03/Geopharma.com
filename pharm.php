<?php
include './connection.php';
include './con_wilaya.php';
session_start();
$wilaya = $_GET['wilaya'];
$commun = strtolower($wilaya) ;
// echo $commun ;
include './con_wilaya.php';
// echo $wilaya ;
$day = date('d');

// echo $day ;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pharm.css">
    <title>pharmacier</title>
</head>
<body>
<img class="img" src="icons/Capturephar.PNG" alt="" srcset="">

    <nav>
        <h2>geopharm</h2>
        <a href="info.php"><img src="user.png" alt=""></a>
    </nav>
    <div class="contuner">
        <?php
        if($day < 10){
            $day2 = substr($day,1,1);
            
        }else{
            $day2 = $day ;
            
        }

              $select = "SELECT * FROM `pharmacier` WHERE `conferm`=1 && `commun` LIKE '%$commun%' &&  (`gard` LIKE '%$day%' or `gard` LIKE '%$day2%')  ";
              $res = mysqli_query($conn,$select) ; 
              if(mysqli_num_rows($res)>0){
              $fet = mysqli_fetch_all($res,MYSQLI_ASSOC);
              foreach($fet as $pharm):
        ?>
        
        <div class="pharm">
       
            <img src="th.jpg" alt="" >
            <a  href="med_pharm.php?id=<?php print_r($pharm['id']) ; ?>"> <h2> <?php  print_r($pharm['name']) ; ?></h2>        </a>
                  <a href="contact_patient.php?parametre=<?php  print_r($pharm['id']) ; ?>">MSG</a>
                    <a href=""><h2><?php  print_r($pharm['location']) ; ?></h2></a>
        </div>
        
        <?php  endforeach ;
        }else{
            echo  "<h2 class='result'>".'no result'."</h2>" ;
        }
        ?>
    </div>
</body>
</html>