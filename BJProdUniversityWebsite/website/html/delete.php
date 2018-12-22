<?php

include "connect.php";
	session_start();

if (isset($_GET['del'])) { 
    $id =$_GET['del'];

    $sql = "DELETE FROM member where m_nId='$id' " ;
     $result=mysqli_query($conn,$sql);


     header('location:listm.php');

}

?>