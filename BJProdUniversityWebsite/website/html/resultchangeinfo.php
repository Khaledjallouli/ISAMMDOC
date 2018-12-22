<?php 
    session_start();
    include "connect.php";



							
							$newpassword=$_POST["m_Checkpass1"];
							$firstname=$_SESSION["m_fName"];
							$lastname=$_SESSION["m_lName"];
							$nId=$_SESSION["m_nId"];
							$rn=$_SESSION['m_rn'];
						    $newmail=$_POST['m_email'];


                                                    
							
									
									if($_POST["m_Checkpass1"]== $_POST["m_Checkpass2"] && $_POST["m_Checkpass"]==$_SESSION["m_pass"] ) 
									 	{
									 		$update="UPDATE member SET m_pass=md5('$newpassword') where m_nId = '$nId' AND $newpassword!='' ";
										if(mysqli_query($conn,$update)){
										                                    

									}
								
										
								
								}
								
								
								
								
									$update="UPDATE member SET m_email='$newmail' WHERE m_nId='$nId' ";
									if(mysqli_query($conn,$update)){
										                                   

									}
									


									if (isset($_POST['upload'])) {

										$target = "images/".basename($_FILES['m_Pic']['name']);
									$image = $_FILES['m_Pic']['name'];
                           
										if (!empty($image)) {
									$update="UPDATE member SET m_Pic='$image' WHERE m_nId='$nId' ";
									if(mysqli_query($conn,$update)){
										                                     
									}
									
							if (move_uploaded_file($_FILES['m_Pic']['tmp_name'], $target)) {
								        echo "Image uploaded" ;
								    }
								    else { 
								        echo"problem" ; 
								    }

								}
							}
								
									$update="UPDATE member SET m_phNumber='$_POST[m_phNumber]' WHERE m_nId='$nId' ";
									if(mysqli_query($conn,$update)){
										                                    

									}
								
								

                                
                                
                                
                                    $update="UPDATE member SET m_skype='$_POST[m_skype]' WHERE m_nId='$nId' ";
                                    if(mysqli_query($conn,$update)){
                                  

                                    }
                                 
                                

                                
                                  $update="UPDATE member SET m_bdate='$_POST[m_bdate]' WHERE m_nId='$nId' ";
                                    if(mysqli_query($conn,$update)){
                                  

                                    }
                                 
                                
                                
								
							
                              

  header("location:profile.php?m_nId=".$nId."");
                                        
								mysqli_close($conn);				
                           

							?>
             
              
    
