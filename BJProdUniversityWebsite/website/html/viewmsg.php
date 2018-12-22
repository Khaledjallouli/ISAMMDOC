<?php
extract($_POST);

include "connect.php";
	session_start();
                
  
	$update="UPDATE message  SET view=1 where msg_id='$id' ";
	if(mysqli_query($conn,$update)){
									
	}
	header('location:listm.php');
    mysqli_close($conn);				
                           
?>
	

