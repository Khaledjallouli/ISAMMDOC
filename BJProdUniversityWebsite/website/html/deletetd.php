<?php

include "connect.php";
	session_start();

if (isset($_GET['del'])) { 
    $id =$_GET['del'];

    $sql = "DELETE FROM td where td_id='$id' " ;
     $result=mysqli_query($conn,$sql);


     header('location:coursedetails.php');

}

?>
