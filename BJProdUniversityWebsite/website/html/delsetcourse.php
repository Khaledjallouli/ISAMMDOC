<?php
extract($_POST);

	
include "connect.php";
	session_start();
                


	$sql = "DELETE FROM member_course where c_id='$id' and m_nId=$_SESSION[m_nId]" ;
     $result=mysqli_query($conn,$sql);

     mysql_query($sql) or die(mysql_error());

?>