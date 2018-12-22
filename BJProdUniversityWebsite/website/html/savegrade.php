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

                                     
                                         
                                          
                  if (isset($_POST['submit'])) {
                  $stmt = mysqli_prepare($conn, "UPDATE grade SET g_midt1 = ? WHERE g_id = ?");
                   mysqli_stmt_bind_param($stmt, "si", $gr, $id);
                  foreach($_POST["g_midt1"] as $i => $gr){
                 $id = $_POST['g_id'][$i];
                  mysqli_stmt_execute($stmt);
                }

                 $stmt1 = mysqli_prepare($conn, "UPDATE grade SET g_midt2 = ? WHERE g_id = ?");
                   mysqli_stmt_bind_param($stmt1, "si", $gr1, $id);
                  foreach($_POST["g_midt2"] as $i => $gr1){
                 $id = $_POST['g_id'][$i];
                  mysqli_stmt_execute($stmt1);
                }


                $stmt2 = mysqli_prepare($conn, "UPDATE grade SET g_finalexam = ? WHERE g_id = ?");
                   mysqli_stmt_bind_param($stmt2, "si", $gr2, $id);
                  foreach($_POST["g_finalexam"] as $i => $gr2){
                 $id = $_POST['g_id'][$i];
                  mysqli_stmt_execute($stmt2);
                }}

                            
                      }}}  }

 header('location:examresult.php?c_id='.$key.'&group_nb='.$nb );
 
 
 mysqli_close($conn); 

 ?> 