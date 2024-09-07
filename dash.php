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
    <link rel="stylesheet" href="dashbord.css">
    <title>Document</title>
</head>
<body>
<nav>
        <h2>geopharm</h2>
        <a href="info.php"><img src="user.png" alt=""></a>
    </nav>
<a class="logout" href="info.php?logout=<?php echo $id_user ;   ?>">
            <h2>logout</h2>
               <img src="logout.png" alt="" onclick="return confirm('are you sure logout'); "  >
            </a>
<div class="edit_grid">
    <?php
            if(!$parametre){
    ?>
    <div class="grid">
    <a href="add.php" class="activ"><div >
        <img src="icons/add.png" alt="">
        <span>add pharmacier</span>
    </div></a>
    <a href="dashbord.php?parametre=edit" class="activ"><div >
        <img src="icons/user.png" alt="">
        <span>edit</span>
    </div></a>
    </div>
    <div class="grid">
    <a href="contact.php" class="activ"><div >
        <img src="icons/msg.png" alt="">
        <span>contact</span>
    </div></a>
    <a href="sens.php" class="activ"><div >
        <img src="icons/calendri.png" alt="">
        <span>sensibilisation</span>
    </div></a>
    </div>

   
    <?php
    }
    ?>
    </div>
    
</body>
</html>