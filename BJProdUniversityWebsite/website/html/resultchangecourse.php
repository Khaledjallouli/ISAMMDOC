<?php 
    session_start();
    include "connect.php";


                            $c_id=$_GET["c_id"];

                            $fn=$_POST["c_fullname"];
							$c_code=$_POST["c_code"];
							$c_description=$_POST["c_description"];
							$c_credit=$_POST["c_credit"];
							$c_totalabsence=$_POST["c_totalabsence"];
						    
							

							$update="UPDATE course  SET c_fullname='$fn' WHERE c_id='$c_id' ";
							if(mysqli_query($conn,$update)){
									
							}

							$update="UPDATE course  SET c_code='$c_code' WHERE c_id='$c_id' ";
							if(mysqli_query($conn,$update)){
									
							}
							
								
							$update="UPDATE course SET c_description='$c_description' WHERE c_id='$c_id' ";
							if(mysqli_query($conn,$update)){
									
							}
								

							$update="UPDATE course SET c_credit='$c_credit' WHERE c_id='$c_id' ";
							if(mysqli_query($conn,$update)){
										                                    
							}
								
							$update="UPDATE course SET c_totalabsence='$c_totalabsence' WHERE c_id='$c_id' ";
                            if(mysqli_query($conn,$update)){
                                                                          
							}
                                   
                   
 							header('location:courses.php');
                                        
							mysqli_close($conn);				
                           

							?>
             
              
    
