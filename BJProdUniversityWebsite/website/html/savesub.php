<?php
    include "connect.php";
    session_start();

      $key = $_GET['c_id'] ;
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            {$timely=$row["c_id"];
                           
                           

    $key1 = $_GET['d_id'] ;
                    $sql="SELECT * FROM doc WHERE d_id =$key1 "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            {$id=$row["d_id"];
                          

                  

    $target = "files/".basename($_FILES['sh_file']['name']);

      
      
    $file = $_FILES['sh_file']['name'];
    $tmpName  = $_FILES['sh_file']['tmp_name'];
    $type = $_FILES['sh_file']['type'];
        $size = $_FILES['sh_file']['size'];
      

     
$location = "files/$file" ;

 $title=$_SESSION['m_fName']." ".$_SESSION['m_lName'] ;

     $s="SELECT m_groupnb FROM member WHERE m_nId = $_SESSION[m_nId] "; 
                    $res=mysqli_query($conn,$s);
                    if(mysqli_num_rows($res))
                        {  while($r=mysqli_fetch_assoc($res))
                          {  $grp = $r['m_groupnb'] ;
      
       $s_="SELECT * FROM sub_doc WHERE sh_posterid = $_SESSION[m_nId] and d_id=$id "; 
                    $res_=mysqli_query($conn,$s_);  
                    if(mysqli_num_rows($res_) && $size!='')
                        {
 
$sql="UPDATE sub_doc SET
sh_file='$file',
sh_path='$location',
sh_size='$size',
sh_type='$type',
Date_sub=now()
where sh_postername='$title' and d_id='$id' and sh_posterid='$_SESSION[m_nId]' and poster_groupnb='$grp'
";
 }if(!mysqli_num_rows($res_) && $size!='')
                        {
   /* to have the time of submission  CURDATE(), CURTIME() */
$sql="INSERT INTO sub_doc (sh_postername,d_id,sh_file,sh_path,sh_size,sh_type,Date_sub,sh_posterid,poster_groupnb) VALUES('$title','$id','$file','$location','$size','$type',now(),'$_SESSION[m_nId]','$grp')";
  }}
  }

if (move_uploaded_file($_FILES['sh_file']['tmp_name'], $target)) {
        echo 'Uploaded...!';
    }
    else { 
        echo"problem" ; 
    }
if(!mysqli_query($conn, $sql)){
    die("ERROR:". $sql."<br>");

}

}}
 header("location:coursedetails.php?c_id=".$timely."");
 
 }}



 mysqli_close($conn);
 

?>

