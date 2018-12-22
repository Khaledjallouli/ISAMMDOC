<?php
extract($_POST);
if (isset($id) && !empty($id)) {
	
include "connect.php";
	session_start();



    $sql = "DELETE FROM member where m_nId='$id' " ;
     $result=mysqli_query($conn,$sql);

     mysql_query($sql) or die(mysql_error());

}

?>
