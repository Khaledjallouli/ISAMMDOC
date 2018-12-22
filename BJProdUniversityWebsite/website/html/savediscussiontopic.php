<?php
    include "connect.php";
    session_start();
    $memberid = $_SESSION['m_nId'];
    $fname = $_SESSION['m_fName'];
    $lname = $_SESSION['m_lName'] ;
    $key = $_GET['c_id'] ;
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {   $row=mysqli_fetch_assoc($result);
                            $timely=$row["c_id"];
                            

                  

    
   
$sql="INSERT INTO disc_topic (dt_title,dt_description,c_id,m_nId) VALUES('$_POST[dt_title]', '$_POST[dt_description]','$timely','$memberid')";
  
  


if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>");

}

}
 header("location:coursedetails.php?c_id=".$timely."");
 
 
 mysqli_close($conn);

?>

