<?php
	include "connect.php";
	session_start();
 
                   
	
$sql="INSERT INTO course (c_fullname,c_code,c_description,c_credit,c_cat,c_reviewsystem,c_level,c_totalabsence) VALUES('$_GET[c_fullname]', '$_GET[c_code]','$_GET[c_description]','$_GET[c_credit]','$_GET[c_cat]','$_GET[c_reviewsystem]','$_GET[c_level]','$_GET[c_totalabsence]')";


if(!mysqli_query($conn, $sql)){
	die("ERROR:". $sql."<br>");

}


 header('location:courses.php');
 mysqli_close($conn);
?>

