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

        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

   
    <title> Change Event</title>
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
                            <li class='menu-item-has-children'>
                                <a href='news.php'>News</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newannouncement.php'>New announcement</a></li>
                                </ul> 
                            </li>
                        </ul>

                      <ul class='menu'>
                            <li class='menu-item-has-children current-menu-item'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li  class='menu-item-has-children current-menu-item' ><a href='newevent.php'>New event</a></li>
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
                                    <li ><a href='newannouncement.php'>New announcement</a></li>
                                </ul> 
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children current-menu-item'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li  class='menu-item-has-children current-menu-item' ><a href='newevent.php'>New event</a></li>
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
                                         while($row1=mysqli_fetch_assoc($result1)) { ?>
                        <ul class='list-account-info'>

        
                            <li>
                                <div class='account-info item-click'  data-toggle="dropdown">
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
                            <li class='menu-item-has-children'>
                                <a href='news.php'>News</a>
                                
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children current-menu-item'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li  class='menu-item-has-children current-menu-item'><a href='newevent.php'>New event</a></li>
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
                                         while($row1=mysqli_fetch_assoc($result1)) { ?>
                        <ul class='list-account-info'>

        
                            <li>
                                <div class='account-info item-click'  data-toggle="dropdown">
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
  
    <!-- CREATE COURSE CONTENT -->
     <section id="create-course-section" class="create-course-section">
        <div class="container">
            <div class="row">



              <?php  $key = $_GET['e_id'] ;
                    $sql="SELECT * FROM event WHERE e_id =$key "; 
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result))
                        { 
                            $row=mysqli_fetch_assoc($result)
                        

?>


                <div class="col-md-3">
                    <div class="create-course-sidebar">
                            <ul class="list-bar">
                                <li class="active">Update event</li>
                            </ul>
                         
                        </div>
                    </div>

                <div class="col-md-9">
                    <div class="create-course-content">
                      <form id="loginForm" method="POST" action="<?php echo "resultchangeevent.php?e_id=".$key."" ;?>" method='POST' enctype="multipart/form-data">

                        <!-- COURSE BANNER -->
                        <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Event Name</h4>
                                </div>
                                <div class="col-lg-9">
                                     <div class="form-group">
                                         <input type="text" class="form-control"  name ="e_title" placeholder="Title" value="  <?php  $sk = $row['e_title'] ; echo "$sk" ; ?> ">
                                     </div>
                                </div>
                            </div>
                        </div>
    <?php  }?>
                         <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Cover</h4>
                                </div>
                                 <div class=" col-md-9 ">  
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled" value="  <?php  $sk = $row['e_photo'] ; echo "$sk" ; ?> ">
                                            <span class="input-group-btn">
                                               <button type="button" class="btn btn-default btn-file  image-preview-clear" style="display:none; ">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <div class="btn btn-default btn-file image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif, image/jpg"  name="e_photo"/> 
     

                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>

                            </div>
                        </div>
                        <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Location</h4>
                                </div>
                                <div class="col-sm-9">
                                     <div class="form-group ">
                                         <input type="text" class="form-control"  name ="e_place" placeholder="Place or address" value="  <?php  $sk = $row['e_place'] ; echo "$sk" ; ?> ">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Start Date/Time </h4>
                                </div>
                                <div class="col-sm-9" >
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker8' >
                                            <input type='text' class="form-control"  name="e_startdate" value="  <?php  $sk = $row['e_startdate'] ; echo "$sk" ; ?> ">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </span>
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                           
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>End Date/Time </h4>
                                </div>
                                <div class="col-sm-9" >
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker'>
                                            <input type='text' class="form-control" name="e_enddate"  value="  <?php  $sk = $row['e_enddate'] ; echo "$sk" ; ?> ">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </span>
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- END / COURSE BANNER -->

                      
                         <div class="description create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Description*</h4>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                         <textarea class="form-control"  rows="3" name="e_description"  ><?php echo $row['e_description'] ; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                        <!-- END / DESCRIPTION -->
                        <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Event Supervisor </h4>
                                </div>
                                <div class="col-lg-9">
                                     <div class="form-group ">
                                         <input type="text" class="form-control"  name ="e_supervisor" placeholder="Supervisor name"  value="  <?php  $sk = $row['e_supervisor'] ; echo "$sk" ; ?> ">
                                     </div>
                                </div>
                            </div>
                        </div>
                                                <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Club's Name </h4>
                                </div>
                                <div class="col-lg-9">
                                     <div class="form-group ">
                                         <input type="text" class="form-control" name ="e_club_name" placeholder="Club's Name "  value="  <?php  $sk = $row['e_club_name'] ; echo "$sk" ; ?> ">
                                     </div>
                                </div>
                            </div>
                        </div>

                         <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Club's picture</h4>
                                </div>
                                 <div class=" col-md-9 ">  
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"  value="  <?php  $sk = $row['e_club_pic'] ; echo "$sk" ; ?> "> 
                                            <span class="input-group-btn">
                                               <button type="button" class="btn btn-default btn-file  image-preview-clear" style="display:none; ">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <div class="btn btn-default btn-file image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif ,image/jpg"  name="e_club_pic"/> 
                                                    <!-- rename it -->
                                                </div>
                                            </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>
  
                            </div>
                        </div>
                    
                     <div class="form-submit-1">
                         <input type="submit" name="upload" value="Update" class="mc-btn btn-style-1" >
                        <input type="cancel" value="Cancel" onclick="javascript:window.location='events.php';" class="mc-btn btn-style-5"> 
                            </div>
                           
                      
                    </form>
                    </div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>
     
    <!-- FOOTER -->
    <footer id="footer" class="footer">
        <div class="first-footer">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="widget megacourse">
                            <h3 class="md">About ISAMM..</h3>
                            <p>
                                To know more about the ISAMM you can visit this website
                            </p>
                            <a href="http://www.isa2m.rnu.tn/" class="mc-btn btn-style-1" target="_blank" >ISAMM</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="widget widget_latest_new">
                            <h3 class="sm">Latest News</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="image-thumb">
                                            <img src="images/team-13.jpg" alt="">
                                        </div>
                                        <span>How to have a good Boyfriend in college?</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="image-thumb">
                                            <img src="images/team-13.jpg" alt="">
                                        </div>
                                        <span>How to have a good Boyfriend in college?</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="widget quick_link">
                            <h3 class="sm">Quick Links</h3>
                            <ul class="list-style-block">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget news_letter">
                            <div class="awe-static bg-news_letter"></div>
                            <div class="overlay-color-3"></div>
                            <div class="inner">
                                <div class="letter-heading">
                                    <h3 class="md">Upcoming events</h3>
                                    <p>Don’t miss the chance to join ISAMM events!</p>
                                </div>
                                <div class="letter">
                                    <form>
                                        

                                      
                                    </form>
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
                </div>
                <p class="copyright">© 2017 Higher Institute of Arts Multimedia of Manouba.</p>
            </div>
        </div>
    </footer>
    <!-- END / FOOTER -->


    


</div>
<!-- END / PAGE WRAP -->

<!-- Load jQuery -->
<script type="text/javascript" src="js/library/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/library/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="js/library/jquery.appear.min.js"></script>
<script type="text/javascript" src="js/library/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/library/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>




<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>

<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
        $(function () {
            $('#datetimepicker8').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function a () {
            $('#datetimepicker').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
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
    <script type="text/javascript">
        
    </script>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
</body>
</html>