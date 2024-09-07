<?php
include './connection.php';
$parametre = ($_GET['parametre']);
$sear = ($_GET['search']);

session_start() ;
$conferm = $_SESSION['conferm'];

if($conferm != 2){
    header('location:info.php') ;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sens.css">
    <title>Document</title>
</head>
<body>
<div class="menu">
        <ul>
            <li class="logo">
                <div class="img_logo">
                    <!-- <img src="logo white1.png" alt=""> -->
                </div>

            </li>
            <li>
                <a href="geopharm.php"><img src="icons\home.png" alt=""><h3>home</h3></a>
            </li>
            <li>
                <a href="dash.php"><img src="icons\profile.png" alt=""><h3>profile</h3></a>
            </li>
           
            <li>
                <a href="sensibilisation.php"><img src="icons\calendri.png" alt=""><h3>sensibilisation</h3></a>
            </li>
            <li>
                <a href="add_articl.php"><img src="icons\articl.png" alt=""><h3>add articl</h3></a>
            </li>
            
            <li>
                <a href="log.php?logout=<?php echo $id_user ;   ?>" class="logout"><img src="logout.png" alt="" 
                onclick="return confirm('are you sure logout'); "  >
                <h3>logout</h3>
            </a>
            </li>
        </ul>
  
    </div>
    
</body>
</html>