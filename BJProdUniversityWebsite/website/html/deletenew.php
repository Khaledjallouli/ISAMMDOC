<?php
extract($_POST);

	
include "connect.php";
	session_start();

    $sql = "DELETE FROM announcement where a_id='$id' " ;
     $result=mysqli_query($conn,$sql);

     mysql_query($sql) or die(mysql_error());


?>
