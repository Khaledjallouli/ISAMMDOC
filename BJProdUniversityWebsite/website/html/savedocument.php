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
                            
                           

                  

    $target = "files/".basename($_FILES['d_file']['name']);

      
      
    $file = $_FILES['d_file']['name'];
    $tmpName  = $_FILES['d_file']['tmp_name'];
    $type = $_FILES['d_file']['type'];
        $size = $_FILES['d_file']['size'];
      

     
$location = "files/$file" ;

 

   /* to have the time of submission  CURDATE(), CURTIME() */
$sql="INSERT INTO doc (d_type,d_title,d_description,d_sdl,d_postdate,d_file,f_path,f_size,f_type,c_id,m_nId) VALUES('$_POST[d_type]', '$_POST[d_title]','$_POST[d_description]','$_POST[d_sdl]',now(),'$file','$location','$size','$type','$timely','$memberid')";
  
  

if (move_uploaded_file($_FILES['d_file']['tmp_name'], $target)) {
        echo "Image uploaded" ;
    }
    else { 
        echo"problem" ; 
    }
if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>");

}

}}
 header('location:adddocument.php?c_id='."$timely".'');
 
 
 mysqli_close($conn);
 

?>

