<?php
  include './connection.php' ;
  session_start() ;
  
   $id_user = $_SESSION['id'];
   $conferm = $_SESSION['conferm'];
   

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

<?php 
           $wilaya = mysqli_real_escape_string($conn, $_POST['wilaya']); 
                if(isset($_POST['creat'])){
                    $name =mysqli_real_escape_string($conn, $_POST['name']); 
                    $last_name =mysqli_real_escape_string($conn, $_POST['last_name']); 
                    $email =mysqli_real_escape_string($conn, $_POST['email']); 
                    $phone =mysqli_real_escape_string($conn, $_POST['phone']); 
                    $pass = mysqli_real_escape_string($conn, $_POST['password']); 
                    $wilaya = mysqli_real_escape_string($conn, $_POST['wilaya']); 
                    $commun = strtolower( mysqli_real_escape_string($conn, $_POST['commun'])); 
                   
                    
                    $select = "SELECT * FROM `pharmacier` WHERE `email` = '$email'";
                    $result = mysqli_query($conn,$select);
                    
                    if(mysqli_num_rows($result) > 0){  
                        ?>
                        <h3>this is exist</h3>
                        <?php
                    }else{
                        $insert = "INSERT INTO `patient` (`name`,`last_name`, `email`, `phone`, `pass`, `wilaya`, `commun`) VALUES ('$name','$last_name', '$email', '$phone', '$pass', '$wilaya', '$commun')";
                        if(mysqli_query($conn,$insert)){
                            echo 'success' ;
                        }else{
                            echo 'the creat account a filed' ;
                        }
                    }
                }
                ?>
             <form action="" class="creat" method="post">
                <input type="text" name="name"  placeholder="first name" required="required">
                <input type="text" name="last_name"  placeholder="last name" required="required">
                <input type="email" name="email"  placeholder="email" required="required">
                <input type="tel" name="phone"  placeholder="phone" required="required">
                <select name="wilaya" id="wilaya" required="required">
                    <option value="1" >wilaya</option>
                    <option value="1">adrar</option>
                    <option value="2">chlef</option>
                    <option value="5">batna</option>
                    <option value="16">alger</option>
                    <option value="35">boumardes</option>
                </select>
                <input type="text" name="commun"  placeholder="commun" required="required">
                <input type="password" name="password"  placeholder="password" required="required"> 
                <input type="submit" name="creat" class="btn" value="creat" >
                
             </form>
     
             <script src="add.js"></script>

    
</body>
</html>