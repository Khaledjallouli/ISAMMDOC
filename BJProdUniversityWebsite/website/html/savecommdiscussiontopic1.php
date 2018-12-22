<?php
	extract($_POST);
	if(isset($com1) && !empty($com1)){
		include "connect.php";
		 $sql="INSERT INTO disc_comments(dt_id,comm_m_nId,comm_text) VALUES('$key1','$_SESSION[m_nId]','$_POST[comm_text]')";
		if(!mysqli_query($conn, $sql)){
   		 die("ERROR:". $sql."<br>" . mysqli_error($conn));

}
	}
?>