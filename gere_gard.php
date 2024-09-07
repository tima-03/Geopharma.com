<?php
include './connection.php';
include './month_logic.php';
$parametre = ($_GET['parametre']);
$id = ($_GET['id']);

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
    <link rel="stylesheet" href="gere.css">
    <title>Document</title>
</head>
<body>

    <div class="contuner">
         <?php
          $select = "SELECT * FROM `pharmacier` WHERE `id`=$id ";
          $res = mysqli_query($conn,$select) ; 
          $fet = mysqli_fetch_all($res,MYSQLI_ASSOC);
          
          $def = json_decode($fet[0]['gard']);
          
         ?>
      
    <div class="con">
        <div class="img">
            <img src="user.png" alt="" srcset="">
        </div>
        <div class="info">
         
          <div class="shaw_info">
            <h2><?php print_r($fet[0]['name']);  ?></h2>
            <hr>
            <h2><?php print_r($fet[0]['email']);  ?></h2>
            <hr>
            <h2><?php print_r($fet[0]['phone']);  ?></h2>
            <hr>
            <h2><?php print_r($fet[0]['location']);  ?></h2>
            <hr>
            
         
          </div>
          <a class="logout" href="info.php?logout=<?php echo $id_user ;   ?>">
            <h2>logout</h2>
               <img src="logout.png" alt="" onclick="return confirm('are you sure logout'); "  >
            </a>
          <?php
            if($fet[0]['conferm']==1){
              $c = 'desactive' ;
             }else{
              $c = 'active' ;
             }
             ?>
                 <form class="form" action="" method="post">
                 <a href="contact.php?parametre=<?php print_r($fet[0]['id']);  ?>" ><img src="icons/message.png" class="msg"  alt=""></a> 
                <input type="submit" class="delet" name="delet"  onclick="return confirm('are you sure'); " value="dellet">
                  

                  <input type="submit" name="<?php echo $c ; ?>" id="" value="<?php echo $c ; ?>">
                 </form>
                 <?php
               
                 if(isset($_POST['desactive'])){
                  $updabs = "UPDATE `pharmacier` SET `conferm` = '0' WHERE  `id` = '$id' " ;
                  if(mysqli_query($conn,$updabs)){
                          echo 'update success' ;
                          header('location:gere_gard.php?id='.$id);

                  }  
                 }
                 if(isset($_POST['active'])){
                  $updabs = "UPDATE `pharmacier` SET `conferm` = '1' WHERE  `id` = '$id' " ;
                  if(mysqli_query($conn,$updabs)){
                          echo 'update success' ;
                          header('location:gere_gard.php?id='.$id);
                  }  
                }
                if(isset($_POST['delet'])){
                  $del = "DELETE FROM `pharmacier` WHERE `id` = $id " ;
                  $delq = mysqli_query($conn,$del) ;
                  if($delq){
                    echo 'delet is success' ;
                  }else{
                    mysqli_query_error() ;
                  }
          }

                 ?>
          </div>
      </div>
          <div class="gard">
           <h2>le tempt de gard</h2>
     
        
          <div class="calendrier">
          <?php
        if(isset($_POST['save'])){
          $gard_day = mysqli_real_escape_string($conn, $_POST['gard_day']);
          if(!empty($gard_day)){
          $upd =  "UPDATE `pharmacier` SET `gard` ='$gard_day' WHERE `id`= '$id'   " ;
                                                if(mysqli_query($conn,$upd)){
                                                  header('location:gere_gard.php?id='.$id);
                                                } 
                                              }     

        }
    ?>
              <div class="head_cal">
                   <h2><?php echo $month."  "."20". date('y');    ?></h2>
                   
              </div>
              <form action="" method="POST">
        <table>
                <tbody>
                  <?php
                  $dec = $def; 
                  $def = json_decode($fet[0]['gard']);

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
                                <input type="text" class="gard_day" name="gard_day" id="gard_day"    >
                                 <input type="submit" class="save" name="save" id="" value="updat">

                </form>
              
   

              
          </div>
          
    </div>

    <script src="gere.js"></script>
</body>
</html>