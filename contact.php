<?php
include './connection.php' ;
session_start() ;
$id_user = $_SESSION['id'];
$conferm = $_SESSION['conferm'];
$parametre = ($_GET['parametre']);
//  echo $id_user ;
if($conferm != 2 && $conferm !='admin'){
    header('location:info.php');
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
        <a href="info.php"><img src="user.png" alt=""></a>
    </nav>
  <div class="contuner">
        <?php
if($conferm == 2){     
  if(!$parametre){
        ?>
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
            $insert = "INSERT INTO `message` (`id_rest`, `id_send`, `message`, `time`) VALUES ('admin', '$id_user', '$text', '$time')";
            if(mysqli_query($conn,$insert)){
                
               
                
            }else{
                echo 'the creat account a filed' ;
            }
        }
        }
    
                    ?>
                 </div>
                 
                 <div class="message" id="msg">
                 <h3 class="contacter">ADMIN</h3>
                 <?php
                         $select = "SELECT * FROM `message` WHERE `id_rest` IN ('$id_user', 'admin')  AND `id_send` IN ('$id_user', 'admin')";
                         $result = mysqli_query($conn,$select);
                         if(mysqli_num_rows($result) > 0){
                            $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                           

                             foreach($msg as $msg):
                                if($msg['id_rest'] == $id_user){
                                ?>
                                <p class="said"><?php  print_r($msg['message']) ;  ?></p>
                                
                             
     
                           <?php
                           }else{ ?>
                                       <h3 class="rest"><?php  print_r($msg['message']) ;  ?></h3>
                         <?php  }
                           endforeach ;         
     
                         }
                          ?>
               </div>
         </div>
        </div>
        <div class="contact">
            <a  class="user" href="contact.php">              
                <img src="icons/user.png" alt="">
                <h3>ADMIN</h3>
               </a>
               <?php
                          $select = "SELECT p.id, p.name FROM `pharmacier` AS p LEFT JOIN `message` AS m ON p.id = m.id_rest OR p.id = m.id_send WHERE m.id_rest = 'agent' OR m.id_send = 'agent'  GROUP BY p.id  ";
                          $result = mysqli_query($conn,$select);
                             $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                            //   print_r($msg) ;
                             foreach($msg as $msg):
               ?>
                                    <a  class="user" href="contact.php?parametre=<?php print_r($msg['id']) ;  ?>">              
                                        <img src="icons/user.png" alt="">
                                        <h3> <?php print_r($msg['name']);  ?></h3>
                                    </a>

                <?php      endforeach ;            ?>                    
        </div>
        <?php
                            
   }else{

?> 
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
            $insert = "INSERT INTO `message` (`id_rest`, `id_send`, `message`, `time`) VALUES ('$parametre', 'agent', '$text', '$time')";
            if(mysqli_query($conn,$insert)){
                
               
                
            }else{
                echo 'the creat account a filed' ;
            }
        }
        }
        $sel_rest = "SELECT `name` FROM `pharmacier` WHERE `id` = '$parametre'";
        $con_sel =  mysqli_query($conn,$sel_rest);
        $fet_rest = mysqli_fetch_all($con_sel,MYSQLI_ASSOC);
                    ?>
                 </div>
                 
                 <div class="message" id="msg">
                 <h3 class="contacter"><?php print_r($fet_rest[0]['name']);   ?></h3>

                 <?php
                    
                         $select = "SELECT * FROM `message` WHERE `id_rest` = 'agent'  AND `id_send` = '$parametre' OR `id_rest` = '$parametre'  AND `id_send` = 'agent'";
                         $result = mysqli_query($conn,$select);
                         if(mysqli_num_rows($result) > 0){
                            $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                           ?>

                           <?php

                             foreach($msg as $msg):
                                if($msg['id_rest'] == 'agent'){
                                ?>
                                <h3 class="said"><?php  print_r($msg['message']) ;  ?></h3>
                                
                             
     
                           <?php
                           }else{ ?>
                                       <h3 class="rest"><?php  print_r($msg['message']) ;  ?></h3>
                         <?php  }
                           endforeach ;         
     
                         }
                          ?>
               </div>
         </div>
        </div>
        <div class="contact">
            <a  class="user" href="contact.php">              
                <img src="icons/user.png" alt="">
                <h3>ayoub rabai</h3>
               </a>
               <?php
                          $select = "SELECT p.id, p.name FROM `pharmacier` AS p LEFT JOIN `message` AS m ON p.id = m.id_rest OR p.id = m.id_send WHERE m.id_rest = 'agent' OR m.id_send = 'agent' GROUP BY p.id  ";
                          $result = mysqli_query($conn,$select);
                             $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                            //  print_r($msg) ;
                             foreach($msg as $msg):
               ?>
                                    <a  class="user" href="contact.php?parametre=<?php print_r($msg['id']) ;  ?>">              
                                        <img src="icons/user.png" alt="">
                                        <h3> <?php print_r($msg['name']);  ?></h3>
                                    </a>

                <?php      endforeach ;            ?>                    
        </div>



 <?php    } 
 } 
 if($conferm == 'admin'){ ?>
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
            $insert = "INSERT INTO `message` (`id_rest`, `id_send`, `message`, `time`) VALUES ('$parametre', 'admin', '$text', '$time')";
            if(mysqli_query($conn,$insert)){
                
               
                
            }else{
                echo 'the creat account a filed' ;
            }
        }
        }
        $sel_rest = "SELECT `name` FROM `pharmacier` WHERE `id` = '$parametre'";
        $con_sel =  mysqli_query($conn,$sel_rest);
        $fet_rest = mysqli_fetch_all($con_sel,MYSQLI_ASSOC);
                    ?>
                 </div>
                 <h3 class="contacter"><?php print_r($fet_rest[0]['name']);   ?></h3>

                 <div class="message" id="msg">
                 <?php if($parametre){
                         $select = "SELECT * FROM `message` WHERE `id_rest` IN ('$parametre', 'admin')  AND `id_send` IN ('$parametre', 'admin')";
                         $result = mysqli_query($conn,$select);
                         if(mysqli_num_rows($result) > 0){
                            $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                           

                             foreach($msg as $msg):
                                if($msg['id_rest'] == 'admin'){
                                ?>
                                <h3 class="said"><?php  print_r($msg['message']) ;  ?></h3>
                                
                             
     
                           <?php
                           }else{ ?>
                                       <h3 class="rest"><?php  print_r($msg['message']) ;  ?></h3>
                         <?php  }
                           endforeach ;         
     
                         }}
                          ?>
               </div>
         </div>
        </div>
        <div class="contact">
           
               <?php
                        //   $select = "SELECT p.id, p.name FROM `pharmacier` AS p LEFT JOIN `message` AS m ON p.id = m.id_rest OR p.id = m.id_send WHERE m.id_rest = 'agent' OR m.id_send = 'agent'  GROUP BY p.id  ";
                        $select = "SELECT `id`, `name`FROM `pharmacier` WHERE `conferm` = 2 ";
                          $result = mysqli_query($conn,$select);
                             $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                            //   print_r($msg) ;
                             foreach($msg as $msg):
               ?>
                                    <a  class="user" href="contact.php?parametre=<?php print_r($msg['id']) ;  ?>">              
                                        <img src="icons/user.png" alt="">
                                        <h3> <?php print_r($msg['name']);  ?></h3>
                                    </a>

                <?php      endforeach ;            ?>                    
        </div>
        <?php
                            
   }
 ?>      
  </div>
    <script src="message.js"></script>
</body>
</html>