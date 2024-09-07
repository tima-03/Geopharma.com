<?php
  include './connection.php' ;
  session_start() ;
//   print_r($_SESSION) ;
  $id_user = $_SESSION['id'];
  $conferm = $_SESSION['conferm'];
$parametre = ($_GET['parametre']);
//   echo $parametre ;
  if($conferm){
    header('location:info.php') ;
  }
  if(!$id_user){
    header('location:log_patient.php') ;

  }

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
<nav>
        <h2>geopharm</h2>
        <a href="geopharm.php"><img class="home" src="icons/home.png" alt=""></a>
    </nav>
    <a class="logout" href="info.php?logout=<?php echo $id_user ;   ?>">
            <h2>logout</h2>
               <img src="logout.png" alt="" onclick="return confirm('are you sure logout'); "  >
            </a>
<div class="con">
        <div class="messages">
                 <div class="send">
                    <form action="" method="post">
                    <input type="text" class="text" name="text">
                    <input type="submit" class="btn_send" name="btn_send" value="send">
                    </form>
                    <?php 
     if(isset($_POST['btn_send'])){
        $text =mysqli_real_escape_string($conn, $_POST['text']); 
        $time = date('y:m:d/h:i') ;
        if(!empty($text)){
            $insert = "INSERT INTO `contacte`(`pharm`, `patient`, `id_rest`, `id_send`, `msg`, `time`) VALUES ('$parametre', '$id_user', '$parametre', '$id_user', '$text', '$time') ";
            if(mysqli_query($conn,$insert)){
               
                
            }else{
                echo 'the creat account a filed' ;
            }
        }
        }
        $sel_msg = "SELECT `name` FROM `pharmacier` WHERE `id` = '$parametre'";
        $con_msg =  mysqli_query($conn,$sel_msg);
        $fet_msg = mysqli_fetch_all($con_msg,MYSQLI_ASSOC);
                    ?>
                 </div>
                 <div class="message" id="msg">
                 <h3 class="contacter"><?php print_r($fet_msg[0]['name']);   ?></h3>
                 <?php
                         $select_msg = "SELECT * FROM `contacte` WHERE `id_rest` IN ('$id_user', '$parametre') AND `id_send` IN ('$id_user', '$parametre')";
                         $result_msg = mysqli_query($conn,$select_msg);
                         if(mysqli_num_rows($result_msg) > 0){
                            $msg_msg= mysqli_fetch_all($result_msg,MYSQLI_ASSOC);
                            print_r($msg) ;
                             foreach($msg_msg as $msg):
                                if($msg['id_rest'] == $id_user){
                                ?>
                                <h3 class="said"><?php  print_r($msg['msg']) ;  ?></h3>
                                
                             
     
                           <?php
                           }else{ ?>
                                       <h3 class="rest"><?php  print_r($msg['msg']) ;  ?></h3>
                         <?php  }
                           endforeach ;         
     
                         }
                          ?>
               </div>
         </div>
         <div class="contact">
         
               <?php
                          $select = "SELECT p.id, p.name FROM `pharmacier` p RIGHT JOIN `contacte` c ON p.id = c.pharm   GROUP BY p.id  ";
                          $result = mysqli_query($conn,$select);
                             $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                            //   print_r($msg) ;
                             foreach($msg as $msgs):
               ?>
                                    <a  class="user" href="contact_patient.php?parametre=<?php print_r($msgs['id']) ;  ?>">              
                                        <img src="icons/user.png" alt="">
                                        <h3> <?php print_r($msgs['name']);  ?></h3>
                                    </a>
                                    

                <?php  endforeach ;            ?>                    
        </div>

</body>
</html>
