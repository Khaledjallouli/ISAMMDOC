<?php
    include "connect.php";
    session_start();
   $key1 = $_GET['dt_id'] ;
             
   $sql="INSERT INTO disc_comments(dt_id,comm_m_nId,comm_text) VALUES('$key1','$_SESSION[m_nId]','$_POST[comm_text]')";
if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>" . mysqli_error($conn));

}

 mysqli_close($conn);

?>

