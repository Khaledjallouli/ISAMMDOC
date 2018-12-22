<?php
extract($_POST);

include "connect.php";
	session_start();
	$sqli="SELECT * FROM disc_topic where m_nId=$_SESSION[m_nId]"; 
	$result=mysqli_query($conn,$sqli);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                        {  
                            $id=$row["dt_id"];
                        }
                        
    $sql="INSERT INTO disc_comments(dt_id,comm_m_nId,comm_text) VALUES('$id','$_SESSION[m_nId]','$com')";
	if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>" . mysqli_error($conn));

}}


?>
