<?php
extract($_POST);

	
include "connect.php";
	session_start();

    $sql = "DELETE FROM disc_topic where dt_id='$id' " ;
     $result=mysqli_query($conn,$sql);

     mysql_query($sql) or die(mysql_error());


?>
