<?php
include './connection.php' ;
$parametre = ($_GET['parametre']) ;
$ag_dsp = ($_GET['ag_dsp']) ;
session_start() ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>login</title>
</head>
<body>


            <form class="form" action="" method="post">
                 <h2 class="desc">pharmacier</h2>
                <h3>
                <?php
        //   if(!$ag_dsp){    
           if(isset($_POST['btn'])){
                    $email =mysqli_real_escape_string($conn, $_POST['email']); 
                    $pass = mysqli_real_escape_string($conn, $_POST['password']); 
                         
                    $select = "SELECT * FROM `pharmacier` WHERE `email` = '$email' ";
                    $result = mysqli_query($conn,$select);
                    if(mysqli_num_rows($result) > 0){
                        $user =mysqli_fetch_assoc($result) ;
                        if($user['password'] == $pass){
                            print_r($user['password']);
                             $_SESSION = $user ;
                             print_r($_SESSION) ;
    
                              header('location:info.php') ;
                            }else{
                                echo 'password  incorrect' ;
                            }
                        }else{
                            echo 'email is  incorrect ' ;
                        }
    

                }
                ?>
                </h3>
                <input type="email" name="email" placeholder="email" required="required">
                <input type="password" name="password" placeholder="password" required="required">
                <input type="submit" class="btn" name="btn" value="log">
                <div class="link">
                <a href="log_patient.php">patient</a>
                <a href="log_admin.php">admin</a>
                </div>
            </form>
            <?php
            // }else{
            //     if(isset($_POST['btn'])){
            //         $email =mysqli_real_escape_string($conn, $_POST['email']); 
            //         $pass = mysqli_real_escape_string($conn, $_POST['password']); 
                         
            //         $select = "SELECT * FROM `admin` WHERE `email` = '$email' && `password` = '$pass'";
            //         $result = mysqli_query($conn,$select);
            //         if(mysqli_num_rows($result) > 0){
            //             $user =mysqli_fetch_all($result,MYSQLI_ASSOC);
            //             print_r($user) ;
            //              $_SESSION = $user ;
            //              header('location:dash.php') ;

            //         }else{
            //             echo 'not find' ;
            //         }

            //     }
                ?>
                      
            
            <!-- <form class="form" action="" method="post">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <input type="submit" class="btn" name="btn" value="log">
                <a href="log.php">pharmacier</a>
            </form> -->
            <?php
        
        // }
          ?>
 
</body>
</html>