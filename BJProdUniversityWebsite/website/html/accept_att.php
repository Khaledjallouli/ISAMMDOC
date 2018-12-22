<?php 
    session_start();
    include "connect.php";

    				
 									
                           

							    if (isset($_POST['submit'])) {
							    $stmt = mysqli_prepare($conn, "UPDATE attendance_letter SET s_sup1 = ? WHERE att_letter_id = ? AND supervisor1_id=$_SESSION[m_nId]");
							    mysqli_stmt_bind_param($stmt, "si", $gr, $id);
							   foreach($_POST["sup"] as $i => $gr){
							           $id = $_POST['id'][$i];
							        mysqli_stmt_execute($stmt);
							    }
							}

							if (isset($_POST['submit'])) {
							    $stmt = mysqli_prepare($conn, "UPDATE attendance_letter SET s_sup2 = ? WHERE att_letter_id = ? AND supervisor2_id=$_SESSION[m_nId]");
							    mysqli_stmt_bind_param($stmt, "si", $gr, $id);
							   foreach($_POST["sup"] as $i => $gr){
							           $id = $_POST['id'][$i];
							        mysqli_stmt_execute($stmt);
							    }
							}


							header('location:index.php');
                                        
							mysqli_close($conn);
				?>

             
              
    
