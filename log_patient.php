<?php
include './connection.php' ;
$parametre = ($_GET['parametre']) ;
session_start() ;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

    <title>Document</title>
</head>
<body>
<form class="form" action="" method="post">
    <h2 class="desc">patient</h2>
                <h3>
            <?php
        //   if(!$ag_dsp){    
           if(isset($_POST['btn'])){
                    $email =mysqli_real_escape_string($conn, $_POST['email']); 
                    $pass = mysqli_real_escape_string($conn, $_POST['password']); 
                        
                    $select = "SELECT * FROM `patient` WHERE `email` = '$email'";
                    $result = mysqli_query($conn,$select);
                    if(mysqli_num_rows($result) > 0){
                        $user =mysqli_fetch_assoc($result) ;
                        if($user['pass'] == $pass){
                        print_r($user['pass']);
                         $_SESSION = $user ;
                         print_r($_SESSION) ;

                          header('location:contact_patient.php') ;
                        }else{
                            echo 'password  incorrect' ;
                        }
                    }else{
                        echo 'email is  incorrect ' ;
                    }

                }
                ?></h3>
                <input type="email" name="email" placeholder="email" required="required">
                <input type="password" name="password" placeholder="password" required="required">
                <input type="submit" class="btn" name="btn" value="log">
                <div class="link">
                <a href="log.php">pharmacier</a>
                <a href="log_admin.php">admin</a>
                </div>
                <a class="creat_compt" href="creat_compt.php">creat a count</a>
                
            </form>
    
</body>
</html>