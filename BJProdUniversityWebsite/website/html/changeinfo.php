<?php 
    session_start();
    include "connect.php";

       if (empty($_SESSION['m_nId'])) {
            header('Location: index.php');
            exit();
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <!-- Google font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.js">
                <link rel="stylesheet" type="text/css" href="css/library/bootstrap.js">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 
    <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/md-font.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

       
         <link rel="icon" type="image/png" href="images/isamm1.png" />

        <link rel="stylesheet" type="text/css" href="src/DateTimePicker.css" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
   

    <title>Change Personal Information</title>
</head>
<body id="page-top" class="home">
        <div id="page-wrap">

     
             <!-- PRELOADER -->
            <div id="preloader">
                <div class="pre-icon">
                    <div class="pre-item pre-item-1"></div>
                    <div class="pre-item pre-item-2"></div>
                    <div class="pre-item pre-item-3"></div>
                    <div class="pre-item pre-item-4"></div>
                </div>
            </div>
            <!-- END / PRELOADER -->

            <!-- HEADER -->
             <header id="header" class="header">
                <div class="container">
                    <div class="logo"><a href="index.php"><img src="images/isamm1.png" alt=""></a></div>

                    <nav class="navigation">
                        <div class="open-menu">
                            <span class="item item-1"></span>
                            <span class="item item-2"></span>
                            <span class="item item-3"></span>
                        </div>


                        <?php 

                        if ($_SESSION["m_role"] == 'Administrator'){  $mniid =  $_SESSION["m_nId"]?>

                        <ul class="menu">
                            <li class="menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu '>
                            <li class='menu-item'>
                                <a href='listm.php'>Members</a>
                                  <ul class='sub-menu'>
                                    <li><a href='newmember.php'>New Member</a></li>
                                </ul>
                            </li>
                           
                        </ul>

                        <ul class="menu">
                            <li class="menu-item-has-children ">
                                <a href='courses.php'>Courses</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newcourse.php'>New course</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children '>
                                <a href='news.php'>News</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newannouncement.php'>New announcement</a></li>
                                </ul> 
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newevent.php'>New event</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class='menu'>
                           <li class='menu-item-has-children'>
                                <a href='attendanceletter.php'>Attendance letter</a>
                            </li>
                        </ul> 


                    <?php  
                                      $sq="SELECT * FROM message where State=0"; 
                                    $res=mysqli_query($conn,$sq);
                                    $nl=mysqli_num_rows($res);
                                   ?>

                        <ul class="list-account-info">
                            <li class="list-item messages">
                                <div class="message-info item-click">
                                    <i id="cl" class="icon md-email"></i>
                                    <?php if ($nl!=0) { ?>
            <span id='cl1' class="itemnew" style="width: 18px;height: 18px ;left: 13px"><span style="color: white;margin-left:6px;margin-bottom:3px"><?php echo $nl?></span></span>
              <?php } ?>
                                </div>
                         <div class="toggle-message toggle-list">
                            <div class="list-profile-title">
                                <h4>Inbox message</h4>
                                 <?php if ($nl!=0) { ?>
                                <span class="count-value"><?php echo $nl?></span>
                                <?php } ?>
                                <a href="#" class="new-message"><i class="icon md-pencil"></i></a>
                            </div>
                            <ul class="list-message">

                                <?php
                                     $sql1="SELECT * FROM message"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         while($row1=mysqli_fetch_assoc($result1)) { 
                                 ?>
                                <li class="ac-new" id="msg">
                                    <a href="#">
                                        <div class="image">
                                            <img src="images/des1.png" alt="">
                                        </div>
                                        <div class="list-body">
                                            <div class="author">
                                                <span><?php echo $row1["msg_sender"]; ?></span>
                                                <div class="div-x"></div>
                                            </div>
                                            <p><?php echo $row1["msg_title"]; ?></p>
                                            <div class="time">
                                                <span>12:53</span>
                                            </div>
                                            <div class="indicator">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                 <?php }}?>
                            </ul>
                            <div class="viewall">
                                <a href="inbox.php#Inbox" role="tab" data-toggle="tab">view all <span id="nbbb"></span> messages</a>
                            </div>
                        </div>
                       
                    </li>  
                        </ul>
                         <ul class="menu">
                            <li class='menu-item-has-children'>
                                 <a href='#'><i class='icon md-bell'></i></a>
                            </li>    
                        </ul>

                        <ul class='list-account-info'>

        
                            <li>
                                <div class='account-info item-click'  data-toggle="dropdown">
                                 <?php  $sql1="SELECT * FROM member where  m_nId = '$_SESSION[m_nId]'"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         while($row1=mysqli_fetch_assoc($result1)) { ?>
                                    
                              
                           
                                         <?php    if (!empty($row1["m_Pic"] )){ 
                                                 $sk = $row1['m_Pic'] ; 
                                                   
                                  echo "<img  src='images/".$sk."'>" ; } 

                                        
                                  
                                       if (empty($row1["m_Pic"] )){ 

                                        if ($row1["m_gender"]=='Female') { ?>

                                       <img src="images/female.png" /> 
                                            <?php  }
                                            else  if ($row1["m_gender"]=='Male'){ ?>
                                         <img src="images/male.jpg" /> 
                                            <?php  } 
                                            else {  ?>
                                       <img src="images/male.jpg" /> 
                                            <?php }  } 
 }} ?>
                                </div> 

                                
                                <ul class="dropdown-menu " role="menu" style="background-color:#012340">
                                    <li>
                                        <h4 style="text-align:center;color:#D8D8D8"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h4>
                                        <h6 style="text-align:center ;color:#139DF0"><?php echo $_SESSION["m_role"]; ?></h6>   
                                    </li>

                                    <li class="divider"></li>

                                    <li> 
                                       <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>"><span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
                                    </li>
                                 
                                    <li>       
                                        <a href="logout.php"><span class="fa fa-sign-out pull-right" aria-hidden="true"></span> Sign Out</a>    
                                    </li>
                                </ul>
                            </li>
                        </ul>



                        <?php } 
                        if ($_SESSION["m_role"]=='Instructor'){  $mniid =  $_SESSION["m_nId"]?>


                        <ul class="menu">
                            <li class="menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                       

                        <ul class='menu'>
                            <li class="menu-item-has-children ">
                                <a href='courses.php'>Courses</a>
                                 
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children'>
                                <a href='news.php'>News</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newannouncement.php'>New announcement</a></li>
                                </ul> 
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newevent.php'>New event</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class='menu'>
                           <li class='menu-item-has-children'>
                                <a href='attendanceletter.php'>Attendance letter</a>
                            </li>
                        </ul> 


                         <ul class="menu">
                            <li class='menu-item-has-children'>
                                 <a href='#'><i class='icon md-bell'></i></a>
                            </li>    
                        </ul>

                          <?php  $sql1="SELECT * FROM member where  m_nId = '$_SESSION[m_nId]'"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         $row1=mysqli_fetch_assoc($result1) ?>
                        <ul class='list-account-info'>

        
                            <li>
                                <div class='account-info item-click'  data-toggle="dropdown">
                                   
                                         <?php    if (!empty($row1["m_Pic"] )){ 
                                                 $sk = $row1['m_Pic'] ; 
                                                   
                                  echo "<img  src='images/".$sk."'>" ; } 

                                        
                                  
                                       if (empty($row1['m_Pic'] )){ 

                                        if ($row1["m_gender"]=='Female') { ?>

                                       <img src="images/female.png" > 
                                            <?php  }
                                            else  if ($row1["m_gender"]=='Male'){ ?>
                                         <img src="images/male.jpg" > 
                                            <?php  } 
                                             ?>
                                      
                                            <?php   } } ?>
                                </div> 
                            
                                
                                <ul class="dropdown-menu " role="menu" style="background-color:#012340">
                                    <li>
                                        <h4 style="text-align:center;color:#D8D8D8"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h4>
                                        <h6 style="text-align:center ;color:#139DF0"><?php echo $_SESSION["m_role"]; ?></h6>   
                                    </li>

                                    <li class="divider"></li>

                                    <li> 
                                       <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>"><span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
                                    </li>
                                    
                                    <li>       
                                        <a href="logout.php"><span class="fa fa-sign-out pull-right" aria-hidden="true"></span> Sign Out</a>    
                                    </li>
                                </ul>
                            </li>
                        </ul>                              
                                         

                        <?php  }
                        if ($_SESSION["m_role"]=='Student') {  $mniid =  $_SESSION["m_nId"]?>


                        <ul class="menu">
                            <li class="menu-item"> 
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class="menu-item-has-children ">
                                <a href='courses.php'>Courses</a>
                        
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children '>
                                <a href='news.php'>News</a>
                                
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newevent.php'>New event</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class='menu'>
                           <li class='menu-item-has-children'>
                                <a href='attendanceletter.php'>Attendance letter</a>
                            </li>
                        </ul> 


                         <ul class="menu">
                            <li class='menu-item-has-children'>
                                 <a href='#'><i class='icon md-bell'></i></a>
                            </li>    
                        </ul>

                       <?php  $sql1="SELECT * FROM member where  m_nId = '$_SESSION[m_nId]'"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         $row1=mysqli_fetch_assoc($result1)?>
                        <ul class='list-account-info'>

        
                            <li>
                                <div class='account-info item-click'  data-toggle="dropdown">
                                    <?php    if (!empty($row1["m_Pic"] )){ 
                                                 $sk = $row1['m_Pic'] ; 
                                                   
                                  echo "<img  src='images/".$sk."'>" ; } 

                                        
                                  
                                       if (empty($row1["m_Pic"] )){ 

                                        if ($row1["m_gender"]=='Female') { ?>

                                       <img src="images/female.png"> 
                                            <?php  }
                                            else  if ($row1["m_gender"]=='Male'){ ?>
                                         <img src="images/male.jpg"> 
                                            <?php  } 
                                              } 
 } ?>
                                </div> 
                            
                                <ul class="dropdown-menu " role="menu" style="background-color:#012340">
                                    <li>
                                        <h4 style="text-align:center;color:#D8D8D8"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h4>
                                        <h6 style="text-align:center ;color:#139DF0"><?php echo $_SESSION["m_role"]; ?></h6>   
                                    </li>

                                    <li class="divider"></li>

                                    <li> 
                                       <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>"><span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
                                    </li>
                                    <li>
                                        <a href="grades.php"><span class="fa fa-list-alt pull-right"></span> Grades </a>
                                    </li>
                                   
                                    <li>       
                                        <a href="logout.php"><span class="fa fa-sign-out pull-right" aria-hidden="true"></span> Sign Out</a>    
                                    </li>
                                </ul>
                            </li>
                        </ul>



                        <?php  }?> 
                    </nav>
                </div>
            </header>

        <section class="course-top">
            <div class="container">
                <div class="row">
                    <form action='resultchangeinfo.php' method='POST' enctype="multipart/form-data" runat="server">
                        <div class="col-md-5">
                            <div class="sidebar-course-intro">
                                <div class="breadcrumb"></div>   
                                <div class="video-course-intro">
                                           <div class="inner">

                                  
                                <?php  $sql1="SELECT * FROM member where  m_nId = '$_SESSION[m_nId]'"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         while($row1=mysqli_fetch_assoc($result1)) { ?>
                                    

                                        <div class="uk-text-center uk-transition-toggle">    
                                                             <?php    if (!empty($row1["m_Pic"] )){ 
                                                 $sk = $row1['m_Pic'] ; 
                                                   
                                  echo "<img id='blah' src='images/".$sk."'>" ; } 

                                        
                                  
                                       if (empty($row1["m_Pic"] )){ 

                                        if ($row1["m_gender"]=='Female') { ?>

                                       <img id='blah' src="images/female.png"> 
                                            <?php  }
                                            else  if ($row1["m_gender"]=='Male'){ ?>
                                         <img id='blah' src="images/male.jpg"> 
                                            <?php  } 
                                              } 
 ?>
                                    
                                      
                                            
                                         <span class=" uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default " style="background-color:black ; opacity: 0.65 ">
                                        
                                            
                                            <label for="file_input_id">
                                                <i class="fa fa-camera" aria-hidden="true" style="color:white; font-size:20px"></i>
                                                <span style="color:white"><b>&ensp;&ensp;Update Profile Picture</b></span>
                                            </label>
                                            <input type="file" id="file_input_id"  name='m_Pic'> 
                                            
                                        </span>
                                  
                                  
                                </div>
  
                                   
                 <?php    if (!empty($row1["m_Pic"] )){ 
                                                 $sk = $row1['m_Pic'] ; 
                                                   
                                  echo "<img id='blah' src='images/".$sk."'>" ; } 

                                        
                                  
                                       if (empty($row1["m_Pic"] )){ 

                                        if ($row1["m_gender"]=='Female') { ?>

                                       <img src="images/female.png" /> 
                                            <?php  }
                                            else  if ($row1["m_gender"]=='Male'){ ?>
                                         <img src="images/male.jpg" /> 
                                            <?php  } 
                                            else {  ?>
                                       <img src="images/male.jpg" /> 
                                            <?php } } ?> 
                                    
                               
                            </div>
                          
                                
                        </div>


                                <div class="new-course ">
                                    <div class="item course-code ">
                                        <i class="icon md-user-minus"></i>
                                        <h4><a href="#">Role</a></h4>
                                        <p class="detail-course"><?php echo $_SESSION["m_role"] ; ?></p>
                                    </div>
                                    <div class="item course-code ">
                                        <i class="material-icons" style="font-size:20px;color:#7D7872">chrome_reader_mode</i>
                                        <h4><a href="#">&ensp;Nat. ID</a></h4>
                                        <p class="detail-course"><?php echo $_SESSION["m_nId"] ; ?></p>
                                    </div>
                                    <div class="item course-code ">
                                        <i class="icon md-img-check"></i>
                                        <h4><a href="#">Reg. number</a></h4>
                                        <p class="detail-course"><?php echo $_SESSION["m_rn"] ; ?></p>
                                    </div>
                                </div>

                            </div>
                            </div>

                 
                        <div class="col-md-7">
                            <div class="tabs-page">              
                                <div class="tab-content">
                                
                                    <h4 class="sm black bold">EDUCATION INFORMATION</h4>
                                    <table class="table table-hover">
                                    <tr ><td class="col-md-3">Full Name </td><td ><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"] ; ?></td></tr>
                                        

<tr ><td class="col-md-2">Group </td><td ><?php echo $_SESSION["m_level"]." ".$_SESSION["m_cat"]." ".$row1["m_groupnb"] ; ?></td></tr>

 <tr ><td class="col-md-3">Gender </td><td ><?php echo $row1['m_gender']; ?></td></tr>

                                    </table>
                                       
                                    <h4 class="sm black bold">CONTACT INFORMATION</h4>
                                    <table class="table table-hover">
                                        <tr> 
                                            <td class="col-md-5"> Mobile Phone</td> 
                                            <td>  
                                                <div class='form-password'>
                                                 <input type='text' name='m_phNumber' value='<?php 
                                                         $sk = $row1['m_phNumber'] ; 
                                                       echo "$sk" ;
                                                       

                                                     ?>'>
                                                 
                                                   
                                                </div>  
                                            </td> 
                                        </tr>
                                        <tr> 
                                            <td class="col-md-5">Email </td> 
                                        <td>  
                                            <div class='form-email'> 
                                               <input type='text' name='m_email' value='<?php 
                                                         $sk = $row1['m_email'] ; 
                                                       echo "$sk" ;
                                                       

                                                     ?>  '>
                                             
                                            </div>  
                                        </td>
                                        </tr>

                                        <tr> 
                                            <td class="col-md-5"> Skype </td> 
                                            <td> 
                                                <div class='form-password'>
                                                   <input type='text' name='m_skype'  value='<?php 
                                                         $sk = $row1['m_skype'] ; 
                                                       echo "$sk" ;
                                                       

                                                     ?>'>
                                                
                                                </div> 
                                            </td> 
                                        </tr>

                                    </table>
                                        
                                    <h4 class="sm black bold">BASIC INFORMATION</h4>
                                    <table class="table table-hover">
                                        <tr> 
                                            <td class="col-md-5"> Birth Date </td> 
                                            <td> 

                                            <div class="form-group">
                                            <input type="text"  class="form-control" data-field="date" data-format="dd-MMM-yyyy" name="m_bdate"
 value='<?php 
                                                         $sk = $row1['m_bdate'] ; 
                                                       echo "$sk" ;
                                                       

                                                     ?>' readonly>

                  
                </div>
                <div id="dtBox"></div>

                                              
                                            </td> 
                                        </tr>       
                                        
                                    </table>

                                    
                                    <h4 class="sm black bold">PASSWORD</h4>
                                    <table class="table table-hover">
                                         <tr> 
                                            <td class="col-md-5">Own password </td> 
                                            <td> 
                                                <div class='form-password'>
                                                    <input type="password" class="form-control form-control-danger"  name="m_Checkpass" placeholder='Enter own Password'>
                                                </div>
                                            </td> 
                                        </tr>
                                        <tr> <td class="col-md-5"> New password</td> 
                                            <td>
                                                <div class='form-password' >

                                                  <input type="password" class="form-control form-control-danger"   id="1" name="m_Checkpass1" placeholder='Enter new Password' onKeyUp="verif('1','2','bb')">
                                                </div>
                                            </td> 
                                        </tr>
                            		
                              			
                              			<tr> <td class="col-md-5"> Confirm new password</td> 
                              				<td>
                              					
												<div class="form-password ">
									<input type='password' class="form-control form-control-danger" id="2"  placeholder='confirm new password' name="m_Checkpass2"  onKeyUp="verif('1','2','bb')"><br /><div id="bb"></div>
									






												</div>
                              				</td>
                              			</tr>
                            			
                                    </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="changes">
                                                    <input type="submit" class="btn btn-info btn-style-1" name="upload" value="Update">
                                                    <button type="button" class="btn btn-info btn-style-3" onclick="javascript:window.location='profile.php';">Cancel</button>
                                                </div>
                                            </td>
                                        </tr> 
                                    </table>
                                    <?php }}mysqli_close($conn);?>
                                </div>
                            </div>
                        </div> 
                    </form>                    
                </div>
            </div>
        </section>  

         

            <!-- FOOTER -->
            <footer id="footer" class="footer">
                <div class="first-footer section"  id="mc-section-2">
                <div class="awe-parallax bg-section1-demo"></div>
                <div class="overlay-color-1"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="widget megacourse ">
                                    <h3 class="md">About ISAMM..</h3>
                                    <p>
                                        To know more about Higher Institute of Arts Multimedia of Manouba, you can visit this website
                                    </p>
                                    <a href="http://www.isa2m.rnu.tn/" class="mc-btn btn-style-1" target="_blank" >ISAMM</a>
                                </div>
                            </div>
                        
                            <div class="col-md-5">
                                <div class="widget news_letter">
                                    <div class="awe-static bg-news_letter"></div>
                                    <div class="overlay-color-3"></div>
                                    <div class="inner">
                                        <div class="letter-heading ">
                                            <h3 class="md" style="color: #175690; text-align: center;">CONTACT US</h3>
                                        </div>

                                        <div class="letter">
                                            <span id="w">You want to contact Higher Institute of Arts Multimedia of Manouba ?</span>
                                            <span id="succes" style="color: green"></span>
                                            <i id="az" style="color: #175690;cursor: pointer;margin: 5px" class="material-icons pull-right" >keyboard_arrow_down</i>
                                            <form action="savemsg.php" method="post" class="ajax" id="contact" style="display: none">
                                                <div class="text-title">
                                                    <input class="input-text" type="text" id="m" name="msg_sender" placeholder="Email">
                                                     <span id="erm" style="color: red"></span>
                                                    <input class="input-text" type="text" id="sb" name="msg_title" placeholder="Subject">
                                                     <span id="erms" style="color: red"></span>
                                                </div>
                                                <div class="post-editor text-form-editor">
                                                    <textarea style="height: 40px" name="msg_text" id="ms"  placeholder="Message"></textarea>
                                                     <span id="ersb" style="color: red"></span>
                                                </div>
                                                <span class="no-spam"><span class="no-spam" style="color: red">*</span>All fields are required</span>
                                                <input type="submit" value="SEND" style="margin-top: 8px" class="mc-btn-2 btn-style-2 pull-right" id="msg">
                                            </form>
                                            <i id="za" style="color: #175690;cursor: pointer;display: none;margin: 10px" class="material-icons pull-right" >keyboard_arrow_up</i><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="second-footer">
                    <div class="container">
                        <div class="contact">
                            <div class="email">
                                <i class="icon md-email"></i>
                                <a href="#">Webmaster@isa2m.rnu.tn</a>
                            </div>
                            <div class="phone">
                                <i class="fa fa-mobile"></i>
                                <span>+216 71 603 498</span>
                            </div>
                            <div class="address">
                                <i class="fa fa-map-marker"></i>
                                <span>Campus Universitaire de La Manouba, Tunis, Tunisie.</span>
                            </div>
                            <div class="copyright">
                                <span>© 2017 Higher Institute of Arts Multimedia of Manouba.</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </footer>
      
<!-- Load jQuery -->
<script type="text/javascript" src="js/library/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/library/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="js/library/jquery.appear.min.js"></script>
<script type="text/javascript" src="js/library/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/library/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>


    <script>
         
            $("[id=az]").click(function(){
                $("[id=contact]").slideDown();
                $("[id=az]").hide();
                $("[id=w]").hide();
                $("[id=za]").show();
                 document.getElementById('succes').innerHTML='';
                 $("[id=m]").val('');
                 $("[id=m]").focus();
                 $("[id=ms]").val('');
                 $("[id=sb]").val('');
            });
            $("[id=za]").click(function(){
                $("[id=contact]").slideUp();
                $("[id=za]").hide();
                $("[id=az]").show();
                $("[id=w]").show();
            });
            $("[id=msg]").click(function(){
                $("[id=contact]").slideUp();
                $("[id=za]").hide();
                $("[id=az]").show();
                document.getElementById('succes').innerHTML="you mail has been sent successfully !" ;
                
            });
        </script>

<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>


   <script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
        
    });

    </script>
    <script type="text/javascript" src="jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="src/DateTimePicker.js"></script>
    
        <script type="text/javascript">
        
            $(document).ready(function()
            {
                $("#dtBox").DateTimePicker({
                
                    dateFormat: "MM-dd-yyyy",
                    timeFormat: "HH:mm",
                    dateTimeFormat: "MM-dd-yyyy HH:mm:ss AA"
                
                });
            });
        
        </script>
        <script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
             
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
             
            reader.readAsDataURL(input.files[0]);
        }
    }
     
    $("#file_input_id").change(function(){
        readURL(this);
    });
});//]]>  
 
</script>
<script type="text/javascript">
    function verif(field1,field2,output){
    val1= document.getElementById(field1).value;
    val2= document.getElementById(field2).value;
                                                                                
    if(val1=="") 
        document.getElementById(output).innerHTML="";
    else if(val1== val2)
        document.getElementById(output).innerHTML="<i class='glyphicon glyphicon-ok' style='color: green'></i>";
    else
        document.getElementById(output).innerHTML="<i class='glyphicon glyphicon-remove' style='color: red'></i>";
    }
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
            <script type="text/javascript" src="jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="src/DateTimePicker.js"></script>
    
        <script type="text/javascript">
        
            $(document).ready(function()
            {
                $("#dtBox").DateTimePicker({
                
                    dateFormat: "MM-dd-yyyy",
                    timeFormat: "HH:mm",
                    dateTimeFormat: "MM-dd-yyyy HH:mm:ss AA"
                
                });
            });
        
        </script>
</body>
</html>