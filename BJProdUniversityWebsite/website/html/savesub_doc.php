<?php
  include "connect.php";
  session_start();

$timely= $_GET['c_id'] ;
              $nb =$_GET['group_nb'] ;
           

    $kid = $_GET['d_id'] ;
                   
 $s_="SELECT * FROM sub_doc "; 
                    $res_=mysqli_query($conn,$s_);  
                    if(mysqli_num_rows($res_))
                        { while($re_=mysqli_fetch_assoc($res_)){
                          

                          
                  
    if (isset($_POST['submit'])) {
    $stmt = mysqli_prepare($conn, "UPDATE sub_doc SET sh_grade = ? WHERE sh_id = ?");
    mysqli_stmt_bind_param($stmt, "si", $gr, $id);
   foreach($_POST["sh_grade"] as $i => $gr){
           $id = $_POST['sh_id'][$i];
        mysqli_stmt_execute($stmt);
    }
}
 
}
 }
        


 header('location:listsub_doc.php?c_id='."$timely".'&d_id='."$kid".'&group_nb='."$nb".'');
 




 mysqli_close($conn);
 

?>
          

