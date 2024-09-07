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
                <a href="#"><img src="icons\articl.png" alt=""><h3>add articl</h3></a>
            </li>
            
            <li>
                <a href="log.php?logout=<?php echo $id_user ;   ?>" class="logout"><img src="logout.png" alt="" 
                onclick="return confirm('are you sure logout'); "  >
                <h3>logout</h3>
            </a>
            </li>
        </ul>
  
    </div>
    <div class="show">
  <form class="fadd" id="fadd" action="" method="POST" enctype="multipart/form-data">
         <?php
              
                if($_SERVER["REQUEST_METHOD"] =='POST'){  
                  $name_even = mysqli_real_escape_string($conn, $_POST['name_even']); 
                    $date = mysqli_real_escape_string($conn, $_POST['date']);
                    $articl = mysqli_real_escape_string($conn, $_POST['articl']);
                    
    //               $sel = "SELECT * FROM `medicament` WHERE `id_pharm` = '$id_user' && `name_med` = '$name_med' ";
    //               $med_res = mysqli_query($conn,$sel) ;
                   
    //   if(mysqli_num_rows($med_res)>0){
    //          echo 'the medicament exist' ;
    //          $med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);
    //         $count_med = $med[0]['count'] ;
    //         $total = $count+$count_med ;
    //         echo $total ;
    //         $upd = " UPDATE `medicament` SET  `prix`='$prix',  `count`='$total' WHERE `id_pharm`= '$id_user' ";
    //         if(mysqli_query($conn,$upd)){
    //             // header('location:info.php?logout=1') ;
    //             echo 'success' ;
    //         }else{
    //             echo 'error' ;
    //         }
    //   }else
      if(isset($_FILES['pictur'])){
                    
                      //  echo $name_med.$prix.$category ;
                    $img = addslashes(file_get_contents($_FILES['pictur']['name'])) ;
                    $img_name = $_FILES['pictur']['name'] ;
                    $image = $_FILES['pictur'] ;             
                     $img_type = $_FILES['pictur']['type'] ;
                     $img_tmp = $_FILES['pictur']['tmp_name'] ;
                     $img_size = $_FILES['pictur']['size'] ;
                     $img_error = $_FILES['pictur']['error'] ;
                    $path_photo = "C:\MAMP\htdocs\pharm\icons\\" ; 
                     $namf= rand(0,1000000000). ".".$img_name ;
                    $ext_exist = ['jpg' , 'gif' , 'jpeg' , 'png'] ;
                   
                           if(empty($date)): ?>
                           <h3 class="error"> <?php   echo 'prix file empty' ;  ?>  </h3>
                          <?php endif ;
                            if(empty($name_even)){
                           ?> <h3><?php echo '  name medicament empty '; ?>   </h3> 
                          <?php }else {

                           $ext_img = strtolower(end(explode('.' , $img_name))) ;
                          
                            if( $img_error == 4 AND !empty($text)){
                             echo 'no file upload';
                            }else{
                           if($img_size < 90000000){
                            
                           if(! in_array($ext_img,$ext_exist) ){
                             echo 'the file is not reed!' ;
                             echo $ext_img ;
                           } else{
                            
                            if(move_uploaded_file($img_tmp ,$path_photo.$namf)) {
                                
                              $insert ="INSERT INTO `evenment`( `name_even`, `date`, `articl`, `name_file`) VALUES ( '$name_even' , '$date' , '$articl' , '$namf'  )" ;
                               if(mysqli_query($conn,$insert)){
                                // header('location:info.php');
                                
                                echo "<h3>".'add evenment success  '." </h3>" ;

                                 }else{
                                    echo 'error insert' ;
                                 }
                           }else{
                             echo 'error move' ;
                           }
                           }}
                               else{
                                  echo "the file is long";
                             }}
                  }}
                
              }
    
             
         ?>
        <h2> add articl</h2>
        <div class="permet">
          
    <img class="icoimg" src="icons\file_pcpo.png" alt="">
    <input type="file" class="inpfile" name="pictur"  id=""  required="required">
    </div>
    <input type="text" name="name_even" placeholder="name evenment" required="required">
    <input type="date" name="date" placeholder="date" required="required">
    <textarea name="articl" id="" required="required">articl</textarea>
    <input type="submit" name="btnadd" class="btnadd">
</form>
    
</body>
</html>