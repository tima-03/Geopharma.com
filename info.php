<?php
include './connection.php' ;
include './month_logic.php';

session_start() ;
 $parametre = $_GET['parametre'];
 $id_user = $_SESSION['id'];
$conferm = $_SESSION['conferm'];
if(!$id_user){
  header('location:log.php') ;
 }
 if(!$id_user or $conferm == 0){
    header('location:log.php') ;
 }

 if($conferm == '2'){
  header('location:dash.php') ;
 }
 if($conferm !=2 && $conferm!=1){
  header('location:admin.php') ;
 }

if(isset($_GET['logout'])){
    unset($id_user) ;
    session_destroy() ;
    header('location:log.php') ;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="info.css">
    <title>info</title>
</head>
<body>


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
            <a class="logout" href="info.php?logout=<?php echo $id_user ;   ?>">
            <h2>logout</h2>
               <img src="logout.png" alt="" onclick="return confirm('are you sure logout'); "  >
            </a>

     
  
        <?php if(!$parametre) { ?>
   
        <div class="img">
            <img src="user.png" alt="" srcset="">
        </div>
        <div class="info">
            
           
           
          <form action="" method="POST">
          <input type="text" name="name" value="<? print_r($_SESSION['name']);   ?>">
            <hr>
          <input type="email" name="email" value="<? print_r($_SESSION['email']);   ?>">
            <hr>
          <input type="text" name="phone" value="<? print_r($_SESSION['phone']);   ?>">
            <hr>
          <input type="text" name="location" value="<? print_r($_SESSION['location']);   ?>">
            <hr>
            <div class="inp">   
                <input type="submit" class="delet" name="delet"  onclick="return confirm('    are you sur'); " value="delet">
                <input type="submit" class="upd" name="upd"  onclick="return confirm('you will be logged out when the changes are saved '); " value="updat">
            </div>
         
          </form>
          <?php
                if(isset($_POST['delet'])){
                    $del = "DELETE FROM `pharmacier` WHERE `id` = $id_user " ;
                    $delq = mysqli_query($conn,$del) ;
                    if($delq){
                      echo 'delet is success' ;
                    }else{
                      mysqli_query_error() ;
                    }
            }

            if(isset($_POST['upd'])){
                $name = mysqli_real_escape_string($conn, $_POST['name']); 
                $email = mysqli_real_escape_string($conn, $_POST['email']); 
                $location =mysqli_real_escape_string($conn, $_POST['location']); 
                $phone =mysqli_real_escape_string($conn, $_POST['phone']); 
                if(!empty($name) && !empty($email) && !empty($location) && !empty($phone)){
                    $upd = " UPDATE `pharmacier` SET `name`='$name', `email`='$email', `location`='$location', `phone`='$phone' WHERE id= '$id_user' ";
                    if(mysqli_query($conn,$upd)){
                        header('location:info.php?logout=1') ;
                    }else{
                        echo 'error' ;
                    }
                }
               
        }
          ?>
        </div>
       
    </div>
    <?php }
    if($parametre == 'add'){
    ?>

    <div class="show">
  <form class="fadd" id="fadd" action="" method="POST" enctype="multipart/form-data">
         <?php
              
                if($_SERVER["REQUEST_METHOD"] =='POST'){  
                  $name_med = mysqli_real_escape_string($conn, $_POST['name_med']); 
                    $prix = mysqli_real_escape_string($conn, $_POST['prix']);
                    $category = mysqli_real_escape_string($conn, $_POST['category']);
                    $count = mysqli_real_escape_string($conn, $_POST['count']); 
                  $sel = "SELECT * FROM `medicament` WHERE `id_pharm` = '$id_user' && `name_med` = '$name_med' ";
                  $med_res = mysqli_query($conn,$sel) ;
                   
      if(mysqli_num_rows($med_res)>0){
             echo 'the medicament exist' ;
             $med = mysqli_fetch_all($med_res,MYSQLI_ASSOC);
            $count_med = $med[0]['count'] ;
            $total = $count+$count_med ;
            echo $total ;
            $upd = " UPDATE `medicament` SET  `prix`='$prix',  `count`='$total' WHERE `id_pharm`= '$id_user' ";
            if(mysqli_query($conn,$upd)){
                // header('location:info.php?logout=1') ;
                echo 'success' ;
            }else{
                echo 'error' ;
            }
      }elseif(isset($_FILES['permet'])){
                    
                      //  echo $name_med.$prix.$category ;
                    $img = addslashes(file_get_contents($_FILES['permet']['name'])) ;
                    $img_name = $_FILES['permet']['name'] ;
                    $image = $_FILES['permet'] ;             
                     $img_type = $_FILES['permet']['type'] ;
                     $img_tmp = $_FILES['permet']['tmp_name'] ;
                     $img_size = $_FILES['permet']['size'] ;
                     $img_error = $_FILES['permet']['error'] ;
                    $path_photo = "C:\MAMP\htdocs\pharm\icons\\" ; 
                     $namf= rand(0,1000000000). ".".$img_name ;
                    $ext_exist = ['jpg' , 'gif' , 'jpeg' , 'png'] ;
                   
                           if(empty($prix)): ?>
                           <h3 class="error"> <?php   echo 'prix file empty' ;  ?>  </h3>
                          <?php endif ;
                            if(empty($name_med)){
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
                                
                              $insert ="INSERT INTO `medicament`(`id_pharm`, `name_med`, `prix`, `category`, `name_file`, `count`) VALUES ('$id_user' , '$name_med' , '$prix' , '$category' , '$namf' , '$count' )" ;
                               if(mysqli_query($conn,$insert)){
                                // header('location:info.php');
                                
                                echo "<h3>".'add medicament success  '." </h3>" ;

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
        <h2> add pictur</h2>
        <div class="permet">
          
    <img class="icoimg" src="icons\file_pcpo.png" alt="">
    <input type="file" class="inpfile" name="permet"  id=""  required="required">
    </div>
    <input type="text" name="name_med" placeholder="name medicament" required="required">
    <input type="text" name="prix" placeholder="prix" required="required">
    <input type="text" name="category" placeholder="category" required="required">
    <input type="number" name="count" placeholder="count" required="required">
    <input type="submit" name="btnadd" class="btnadd">
</form>
   
<?php
    }
     if($parametre == 'date_gard'){
?>
<div class="gard">
          
          <div class="calendrier">
          
              <div class="head_cal">
              <h2>le tempt de gard</h2>
                   <h2><?php echo $month."  "."20". date('y');    ?></h2>
                   
              </div>
              <form action="" method="POST">
        <table>
                <tbody>
                  <?php
                  $dec = $def; 
                  $def = json_decode($_SESSION['gard']);
                  $dec = $def;
                  ?>
                  <tr>
                    <td class=" <?php if(in_array(1,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="1" >01</td>
                    <td class=" <?php if(in_array(2,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="2"  > 02</td>
                    <td class=" <?php if(in_array(3,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="3"   >03 </td>
                    <td class=" <?php if(in_array(4,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="4"  >04 </td>
                    <td class=" <?php if(in_array(5,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="5"  >05</td>
                    <td class=" <?php if(in_array(6,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="6"  > 06</td>
                    <td class=" <?php if(in_array(7,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="7"  >07 </td>
                  </tr>
                  <tr>
                    <td class=" <?php if(in_array(8,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="8" >08</td>
                    <td class=" <?php if(in_array(9,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="9"  > 09</td>
                    <td class=" <?php if(in_array(10,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="10"   >10 </td>
                    <td class=" <?php if(in_array(11,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="11"  >11 </td>
                    <td class=" <?php if(in_array(12,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="12"  >12</td>
                    <td class=" <?php if(in_array(13,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="13"  > 13</td>
                    <td class=" <?php if(in_array(14,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="14"  >14 </td>
                  </tr>
                  <tr>
                    <td class=" <?php if(in_array(15,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="15" >15</td>
                    <td class=" <?php if(in_array(16,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="16"  > 16</td>
                    <td class=" <?php if(in_array(17,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="17"   >17 </td>
                    <td class=" <?php if(in_array(18,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="18"  >18 </td>
                    <td class=" <?php if(in_array(19,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="19"  >19</td>
                    <td class=" <?php if(in_array(20,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="20"  > 20</td>
                    <td class=" <?php if(in_array(21,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="21"  >21 </td>
                  </tr>
                  <tr>
                    <td class=" <?php if(in_array(22,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="22" >22</td>
                    <td class=" <?php if(in_array(23,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="23"  > 23</td>
                    <td class=" <?php if(in_array(24,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="24"   >24 </td>
                    <td class=" <?php if(in_array(25,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="25"  >25 </td>
                    <td class=" <?php if(in_array(26,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="26"  >26</td>
                    <td class=" <?php if(in_array(27,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="27"  > 27</td>
                    <td class=" <?php if(in_array(28,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="28"  >28 </td>
                  </tr>
                  <tr>
                    <td class=" <?php if(in_array(29,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="29" >29</td>
                    <td class=" <?php if(in_array(30,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="30"  > 30</td>
                    <td class=" <?php if(in_array(31,$dec)){ echo 'activ';} ?>"  onclick="add (this.id)" id="31"   >31 </td>
                  </tr> 
                                  
        
        

                </tbody>
                </table> 
                               

                </form>
              
   

              
          </div>
          </div>
          <?php } ?>
</body>
</html>