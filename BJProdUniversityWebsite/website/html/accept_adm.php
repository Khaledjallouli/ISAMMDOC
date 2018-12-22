<?php 
    session_start();
    include "connect.php";

    				
 									
                           

							    if (isset($_POST['submit'])) {
							    $stmt = mysqli_prepare($conn, "UPDATE attendance_letter SET State = ? WHERE att_letter_id = ? ");
							    mysqli_stmt_bind_param($stmt, "si", $gr, $id);
							   foreach($_POST["acc"] as $i => $gr){
							           $id = $_POST['id'][$i];
							        mysqli_stmt_execute($stmt);
							    }
							}

							


							header('location:index.php');
                                        
							mysqli_close($conn);
				?>

             
              
    
