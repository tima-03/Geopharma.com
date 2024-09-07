<?php
function get_IP_address()
{
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe

                if (filter_var($IPaddress,
                               FILTER_VALIDATE_IP,
                               FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                    !== false) {

                    return $IPaddress;
                }
            }
        }
    }
}
$ip =get_IP_address();
$localtion = file_get_contents(filename:"http://ip-api.com/json/$ip");
// echo $localtion;
$loc = json_decode($localtion) ;
print_r($loc);


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
        <a href="info.php"><img src="user.png" alt=""></a>
    </nav>
    <div class="search">
    <div class="date"><?php     echo date('m');  echo date_default_timezone_get(); echo time();?></div>

       <form action="" method="post">
        <input type="submit" name="get_pharm" class="get_pharm" id="get_pharm" value="get gard pharm">
       </form>
    </div>
    


    <script src="add.js"></script>
</body>
</html>