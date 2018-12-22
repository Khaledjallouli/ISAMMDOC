<?php 
    session_start();
    include "connect.php";


                            
                            $id=$_GET["e_id"];
							$newtitle=$_POST["e_title"];

							$newplace=$_POST["e_place"];
							$newSdate=$_POST["e_startdate"];
							$newFdate=$_POST["e_endtdate"];
						    $newdescription=$_POST['e_description'];
						    $newSupervisor=$_POST["e_supervisor"];
						    $newCn=$_POST["e_club_name"];
						   
							

							$update="UPDATE event  SET e_title='$newtitle' WHERE e_id='$id' ";
							if(mysqli_query($conn,$update)){
									
									}

							$update="UPDATE event  SET e_place='$newplace' WHERE e_id='$id' ";
							if(mysqli_query($conn,$update)){
									
									}
							
								
									$update="UPDATE event SET e_description='$newdescription' WHERE e_id='$id'";
									if(mysqli_query($conn,$update)){
									
									}
								
								
								
									

									if (isset($_POST['upload'])) {

										$target = "images/".basename($_FILES['e_photo']['name']);
										$image = $_FILES['e_photo']['name'];
                           
									if (!empty($image)) {

									$update="UPDATE event SET e_photo='$image' WHERE e_id='$id' ";
									if(mysqli_query($conn,$update)){
										                                     
									}
									
							if (move_uploaded_file($_FILES['e_photo']['tmp_name'], $target)) {
								        echo "Image uploaded" ;
								    }
								    else { 
								        echo"problem" ; 
								    }

								}
							}
								

											if (isset($_POST['upload'])) {

										$target1 = "images/".basename($_FILES['e_club_pic']['name']);
										$image1 = $_FILES['e_club_pic']['name'];
                           
									if (!empty($image1)) {

									$update="UPDATE event SET e_club_pic='$image1' WHERE e_id='$id' ";
									if(mysqli_query($conn,$update)){
										                                     
									}
									
							if (move_uploaded_file($_FILES['e_club_pic']['tmp_name'], $target1)) {
								        echo "Image uploaded" ;
								    }
								    else { 
								        echo"problem" ; 
								    }

								}
							}
							



									$update="UPDATE event SET e_supervisor='$newSupervisor' WHERE e_id='$id' ";
									if(mysqli_query($conn,$update)){
										                                    

									}
								
								

                                
                                    $update="UPDATE event SET e_club_name='$newCn' WHERE e_id='$id' ";
                                    if(mysqli_query($conn,$update)){
                                                                          

                                    }
                                   
                                
                                
                           
                                 
                                

                                
                                    $update="UPDATE event SET e_startdate='$newSdate' WHERE e_id='$id' ";
                                    if(mysqli_query($conn,$update)){
                                                                      

                                    }
                                  
                                
                                
                                    
                                    $update="UPDATE event SET e_enddate='$newFdate' WHERE e_id='$id' ";
                                    if(mysqli_query($conn,$update)){
                                                                      

                                    }
                                
								
							


                              

 								header('location:events.php');
                                        
								mysqli_close($conn);				
                           

							?>
             
              
    
