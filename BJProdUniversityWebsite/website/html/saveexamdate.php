<?php
    include "connect.php";
    session_start();
    $key = $_GET['c_id'] ;
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            {$timely=$row["c_id"];
                            $memberid = $_SESSION['m_nId'];
                          

                  

    
   
$sql="INSERT INTO examdate (c_id,m_nId,ex_type,ex_date,ex_description) VALUES('$timely','$memberid','$_POST[ex_type]', '$_POST[ex_date]', '$_POST[ex_description]')";
  
  


if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>");

}

}}

                                                 header('location:coursedetails.php?c_id='."$key".''); 
 
 mysqli_close($conn);

?>

