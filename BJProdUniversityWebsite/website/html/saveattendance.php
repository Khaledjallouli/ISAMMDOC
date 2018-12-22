<?php
	include "connect.php";
	session_start();

 $key = $_GET['c_id'] ;
 $nb =$_GET['group_nb'] ;

                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            {

                           			  $sq="SELECT * FROM member WHERE m_groupnb =$nb" ;
                              			   $resul=mysqli_query($conn,$sq);
                   							 if(mysqli_num_rows($resul)) {
                   							 	while($row1=mysqli_fetch_assoc($resul))
                                     {  
  										                   $nid= $row1['m_nId'];
  										

                   							 
                            
                          
                             if (isset($_POST['attend'.$nid])) 
                                        {
                                        	$insert= "INSERT INTO attendance(m_nId,c_id,attend,attendancedate) VALUES ('$nid','$key','$_POST[attend]',now())";
                                         
                                       if(!mysqli_query($conn, $insert)){
												die("ERROR:". $sql."<br>");

												}}
											}}}}

												 header('location:attendance.php?c_id='."$key".'&group_nb='."$nb".'');
 
 
 mysqli_close($conn); 

 ?> 