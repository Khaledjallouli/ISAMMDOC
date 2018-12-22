 <?php
 include "connect.php";
    session_start();

        $ins1 = $_POST['ins1'];
        $ins2 =  $_POST['ins2'];
        $sess= $_SESSION['m_nId'] ; 
        if ($_POST['d_type']=='Other') 
        {
            if (!empty($_POST['c_description'])) {
                $rs =  $_POST['c_description'];
                                 
                                
$sql = 'INSERT INTO attendance_letter (requester_id,supervisor1_id,s_sup1,supervisor2_id,s_sup2,att_reason,State)VALUES ("'. $sess .'","'. $ins1 .'",0,"'.$ins2 .'",0,"'.$rs.'" ,0) ';
             if(!mysqli_query($conn, $sql))
        {
             die("ERROR:". $sql."<br>");
        }
        }}
        else
        {
            $rs=$_POST['d_type']; 
            $sql = 'INSERT INTO attendance_letter(requester_id,supervisor1_id,s_sup1,supervisor2_id,s_sup2,att_reason,State)VALUES ("'. $sess .'","'. $ins1 .'",0,"'.$ins2 .'",0,"'.$rs.'" ,0) ';
        
        if(!mysqli_query($conn, $sql))
        {
             die("ERROR:". $sql."<br>");
        }
        }

?>