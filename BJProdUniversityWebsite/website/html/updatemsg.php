<?php
extract($_POST);

include "connect.php";
	session_start();
                
  
	$update="UPDATE message  SET State='$id' where State=0 ";
	if(mysqli_query($conn,$update)){
									
	}
	header('location:listm.php');
    mysqli_close($conn);				
                           
?>
	

