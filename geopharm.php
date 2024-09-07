<?php
include './connection.php';
session_start();
// function get_IP_address()
// { 
//     foreach (array('HTTP_CLIENT_IP',
//                    'HTTP_X_FORWARDED_FOR',
//                    'HTTP_X_FORWARDED',
//                    'HTTP_X_CLUSTER_CLIENT_IP',
//                    'HTTP_FORWARDED_FOR',
//                    'HTTP_FORWARDED',
//                    'REMOTE_ADDR') as $key){
//         if (array_key_exists($key, $_SERVER) === true){
//             foreach (explode(',', $_SERVER[$key]) as $IPaddress){
//                 $IPaddress = trim($IPaddress); // Just to be safe

//                 if (filter_var($IPaddress,
//                                FILTER_VALIDATE_IP,
//                                FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
//                     !== false) {

//                     return $IPaddress;
//                 }
//             }
//         }
//     }
// }
// $ip =get_IP_address();
// $location = file_get_contents(filename:"http://ip-api.com/json/$ip");
// // echo $localtion;
// $loc = json_decode($location) ;
// // print_r($loc);
// echo $loc->country ;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <h2>geopharm</h2>
        <div>
            <a href="ABOUT.html">about</a> 
            <a href="sensibilisation.php">sensibilisation</a> 
            <a href="CONTACT.html">contact as</a> 
            <a href="HELP.html">help </a>             

        </div>
        <a href="admin.php"><img src="user.png" alt=""></a>
    </nav>
    <div class="search">
    
    <?php

// $result = file_get_contents('https://freegeoip.app/json/');
// echo "<pre>";
// print_r($location = json_decode($result));
// $wilaya = $location->region_name;
// // echo $wilaya;
 if(isset($_POST['get_pharm'])){
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    // print_r($location) ;
    $commun = strtolower(end(explode(',' , $localtion))) ;
        header('location:pharm.php?wilaya='.$location);
 }

?>
         <!-- <a href="pharm.php?wilaya=<?php echo $wilaya; ?>"> -->
       <form action="" method="post">
        <input type="text" class="location" id="location" name="location" placeholder="your ville" required="required">
        <img src="icons/location.png" id="icon" alt="">
       <input type="submit" name="get_pharm" class="get_pharm" id="get_pharm" value="get gard pharm">
       </form>
    <!-- </a> -->
    </div>
              
    


    <script src="location.js"></script>
</body>
</html>