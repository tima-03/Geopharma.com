<?php
 $conn = mysqli_connect('localhost','root','root','pharm');

 if(!$conn){
     echo 'error:' . mysqli_connect_error() ;
 }

?>