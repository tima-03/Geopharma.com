<?php
include './connection.php';
include './month_logic.php';
session_start() ;
$conferm = $_SESSION['conferm'];
$id = ($_GET['id']);

$select = "SELECT * FROM `pharmacier` WHERE `id`='$id'";
$res = mysqli_query($conn,$select) ; 
$fet = mysqli_fetch_all($res,MYSQLI_ASSOC);
print_r($fet) ;
print_r($fet[0]['gard']) ;
var_dump($fet[0]['gard']);
$def = json_decode($fet[0]['gard']);
var_dump($def) ;
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
<div class="calendrier">
              <div class="head_cal">
                   <h2><?php echo $month."  "."20". date('y');    ?></h2>
             </div>
    <form action="" method="POST">
        <table>
                <tbody>
                  <?php
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
                                <input type="text" class="gard_day" name="gard_day" id="gard_day"    >
                                 <input type="submit" name="save" id="">

                </form>
              
    <?php
    
        if(isset($_POST['save'])){
          $gard_day = mysqli_real_escape_string($conn, $_POST['gard_day']);
          print_r($gard_day) ;
          var_dump(json_decode($gard_day)) ;
          $upd =  "UPDATE `pharmacier` SET `gard` ='$gard_day' WHERE `id`= '$id'   " ;
                                                if(mysqli_query($conn,$upd)){
                                                  echo 'update success' ;
                                                 
                                                 } 
        }
        
       
       
      
     

    ?>

       


        </div>

    <script src="gere.js"></script>
</body>
</html>