<?php
    include "connect.php";
    session_start();

    	if (empty($_SESSION['m_nId'])) 
    	{
           $sess=$_POST['msg_sender'];
        }else
        {
 	   		$sess= $_SESSION['m_nId'] ;
 		}

$sql="INSERT INTO message (msg_sender,msg_title,msg_text,m_date,state,view) VALUES('$sess', '$_POST[msg_title]','$_POST[msg_text]',now(),0,0)";
  
if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>");

}


 header("location:index.php");
 
 
 mysqli_close($conn);

?>

