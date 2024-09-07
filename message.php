<?php
  include './connection.php' ;
  session_start() ;
  
   $id_user = $_SESSION['id'];
   $conferm = $_SESSION['conferm'];
   $parametre = ($_GET['parametre']);

   if(!$id_user or $conferm == 0){
    header('location:log.php') ;
 }
 if($conferm ==2){
  header('location:dash.php') ;
 }
 if($conferm !=2 && $conferm!=1){
  header('location:admin.php') ;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="massage.css">
    <title>Document</title>
</head>
<body>
<img class="img" src="icons/Capturephar.PNG" alt="" srcset="">
 <div class="contuner">
  <nav>
              <a href="geopharm.php">
                <h3>home</h3>
                <img src="icons/home.png" alt=""></a>
              <a href="message.php">
                <h3>messag</h3>
                <img src="icons/message.png" alt=""></a>
              <a href="medicament.php">
                <h4>medicament</h4>
                <img src="icons/med.png" alt=""></a>
              <a href="info.php?parametre=add">
                <h4> add_med</h4>
                <img src="icons/med.png" alt=""></a>
              <a href="info.php?parametre=date_gard">
                <h4>date de garde</h4>
                <img src="icons/med.png" alt=""></a>
       </nav>
         <div class="messages">
                 <div class="send">
                    <form action="" method="post">
                    <input type="text" class="text" name="text">
                    <input type="submit" class="btn_send" name="btn_send">
                    </form>
                    <?php
                    if(!$parametre){
     if(isset($_POST['btn_send'])){
        $text =mysqli_real_escape_string($conn, $_POST['text']); 
        $time = date('y:m:d/h:i') ;
 
        if(!empty($text)){
            $insert = "INSERT INTO `message` (`id_rest`, `id_send`, `message`, `time`) VALUES ('agent', '$id_user', '$text', '$time')";
            if(mysqli_query($conn,$insert)){
                
               
                
            }else{
                echo 'the creat account a filed' ;
            }
        }
        }
    
                    ?>
                 </div>
                 
                 <div class="message" id="msg">
                 <h3 class="contacter">Agent_dsp</h3>
                 <?php
                         $select_msg = "SELECT * FROM `message` WHERE `id_rest` = '$id_user' or `id_send` = '$id_user'";
                         $result_msg = mysqli_query($conn,$select_msg);
                         if(mysqli_num_rows($result_msg) > 0){
                            $msg_msg= mysqli_fetch_all($result_msg,MYSQLI_ASSOC);
                           

                             foreach($msg_msg as $msg):
                                if($msg['id_rest'] == $id_user){
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
         <div class="contact">
            <a  class="user" href="message.php">              
                <img src="icons/user.png" alt="">
                <h3>agent dsp</h3>
               </a>
               <?php
                          $select = "SELECT p.id, p.name FROM `patient` p LEFT JOIN `contacte` c ON p.id = c.patient GROUP BY p.id   ";
                          $result = mysqli_query($conn,$select);
                             $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                            //   print_r($msg) ;
                             foreach($msg as $msg):
               ?>
                                    <a  class="user" href="message.php?parametre=<?php print_r($msg['id']) ;  ?>">              
                                        <img src="icons/user.png" alt="">
                                        <h3> <?php print_r($msg['name']);  ?></h3>
                                    </a>

                <?php      endforeach ;            ?>                    
        </div>
        <?php   }else{  
          if(isset($_POST['btn_send'])){
        $text =mysqli_real_escape_string($conn, $_POST['text']); 
        $time = date('y:m:d/h:i') ;
 
        if(!empty($text)){
            $insert = "INSERT INTO `contacte` (`pharm`,`patient`, `id_rest`, `id_send`, `msg`, `time`) VALUES ('$parametre', '$id_user','$parametre', '$id_user', '$text', '$time')";
            if(mysqli_query($conn,$insert)){
                
               
                
            }else{
                echo 'the creat account a filed' ;
            }
        }
        }
        $sel_rest = "SELECT `name` FROM `patient` WHERE `id` = '$parametre'";
        $con_sel =  mysqli_query($conn,$sel_rest);
        $fet_rest = mysqli_fetch_all($con_sel,MYSQLI_ASSOC);
                    ?>
                 </div>
                 
                 <div class="message" id="msg">
                 <h3 class="contacter"><?php print_r($fet_rest[0]['name']);   ?></h3>
                 <?php
                         $select_msg = "SELECT * FROM `contacte` WHERE `id_rest` IN ('$parametre', '$id_user')  AND `id_send` IN ('$parametre', '$id_user')";
                         $result_msg = mysqli_query($conn,$select_msg);
                         if(mysqli_num_rows($result_msg) > 0){
                            $msg_msg= mysqli_fetch_all($result_msg,MYSQLI_ASSOC);
                           

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
            <a  class="user" href="message.php">              
                <img src="icons/user.png" alt="">
                <h3>agent dsp</h3>
               </a>
               <?php
                          $select = "SELECT p.id, p.name FROM `patient` p LEFT JOIN `contacte` c ON p.id = c.patient   GROUP BY p.id  ";
                          $result = mysqli_query($conn,$select);
                             $msg= mysqli_fetch_all($result,MYSQLI_ASSOC);
                              // print_r($msg[0]['name']) ;
                             foreach($msg as $msgs):
               ?>
                                    <a  class="user" href="message.php?parametre=<?php print_r($msgs['id']) ;  ?>">              
                                        <img src="icons/user.png" alt="">
                                        <h3> <?php print_r($msgs['name']);  ?></h3>
                                    </a>

                <?php      endforeach ;            ?>                    
        </div>
      <?php  } ?>
 </div>
    <script src="message.js"></script>
</body>
</html>