<?php
    include "connect.php";
    session_start();
    $key = $_GET['c_id'] ;
       $key1 = $_GET['d_id'] ;
   $target = "files/".basename($_FILES['td_file']['name']);

      
      
    $file = $_FILES['td_file']['name'];
    $tmpName  = $_FILES['td_file']['tmp_name'];
    $type = $_FILES['td_file']['type'];
        $size = $_FILES['td_file']['size'];
        $title = $_POST['td_title'];

      

     
$location = "files/$file" ;

                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) && $size!='' && $title!='')
                        {  while($row=mysqli_fetch_assoc($result))
                            {$timely=$row["c_id"];
                            $memberid = $_SESSION['m_nId'];
                             $fname = $_SESSION['m_fName'];
                             $lname = $_SESSION['m_lName'] ;
                           

                  

 
 

   /* to have the time of submission  CURDATE(), CURTIME() */
$sql="INSERT INTO practical_work (d_id,m_posterId,td_title,td_file,td_path,td_size,td_type) VALUES('$key1','$memberid','$_POST[td_title]','$file','$location','$size','$type')";
  
  

if (move_uploaded_file($_FILES['td_file']['tmp_name'], $target)) {
        echo "Image uploaded" ;
    }
    else { 
        echo"problem" ; 
    }

    if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
}
else{
    die("ERROR:". $sql."<br>");

}

}}
 header('location:downloadtd.php?last='.$last_id);

 
 mysqli_close($conn);
 

?>
