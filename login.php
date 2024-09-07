<?php
include './connection.php' ;

$select = "SELECT * FROM `admin` WHERE `email` = 'asma@gmail.com' && `password` = 'asmaasma'";
$result = mysqli_query($conn,$select);
if(mysqli_num_rows($result) > 0){
    $user =mysqli_fetch_all($result,MYSQLI_ASSOC) ;
    print_r($user) ;
   

}else{
    echo 'not find' ;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>