<?php 
    session_start();
        include "connect.php";

    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/library/animate.css">
        <link rel="stylesheet" type="text/css" href="css/md-font.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />

   <link rel="icon" type="image/png" href="images/isamm1.png" />
<style type="text/css"> a:hover { text-decoration: none; }
    </style>
        <title>ISAMMDOCs</title>
    </head>
    <body id="page-top" class="home" >

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
                    <div class="logo"><a href="index.php"><img src="images/isamm.png" alt=""></a></div>

                    <nav class="navigation">
                        <div class="open-menu">
                            <span class="item item-1"></span>
                            <span class="item item-2"></span>
                            <span class="item item-3"></span>
                        </div>


                        <?php 
                        if(empty($_SESSION["m_nId"])){?>
                        <ul class="menu">
                            <li>
                                <a  href="#"  uk-toggle="target: #offcanvas-flip">Log In </a>
                            </li>
                        </ul>

                        <?php }  else{
                         if ($_SESSION["m_role"] == 'Administrator'){ $mniid =  $_SESSION["m_nId"]?>

                        <ul class="menu">
                            <li class="menu-item  current-menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item'>
                                <a href='listm.php'>Members</a>
                                  <ul class='sub-menu'>
                                    <li><a href='newmember.php'>New Member</a></li>
                                </ul>
                            </li>
                           
                        </ul>

                        <ul class="menu">
                            <li class="menu-item-has-children">
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
                                    <i id="cl" class="icon md-email" style="font-size: 15px"></i>
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
                                     $sql1="SELECT * FROM message  order by msg_id DESC"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         while($row1=mysqli_fetch_assoc($result1)) { 
                                            $id=$row1['msg_sender'];
                                 ?>
                                <li class="ac-new" id="msg" style="<?php if ($row1["view"]==0) { echo "background-color: #F2F2F2" ;}else{echo "background-color: white" ;} ?>">
                                    <a href="#">
                                        <div class="image">
                                             <?php 
                                                
                                                $name="SELECT * FROM member where m_nId = '$id'" ;
                                                $rea=mysqli_query($conn,$name);
                                                if(mysqli_num_rows($rea)){
                                                $rowh=mysqli_fetch_assoc($rea);
                                                 if (!empty($rowh["m_Pic"] )){ 
                                                    $kk = $rowh['m_Pic'] ; 
                                                  } 
                                                        if (empty($rowh["m_Pic"] ))
                                                        { 

                                                          if ($rowh["m_gender"]=='Female') { 
                                                            $kk="female.png" ;
                                                          }
                                                          else  if ($rowh["m_gender"]=='Male'){ 
                                                            $kk="male.jpg" ;
                                                          } 
                                                          else {
                                                            $kk="male.png" ;  
                                                          } 
                                                        } ?>
                                                 <img src="images/<?php echo $kk ?>">
                                                    <?php }else{ ?>
                                                <img src="images/male.jpg">
                                                <?php } ?>
                                        </div>
                                        <div class="list-body">
                                            <div class="<?php  if ($row1["view"]==0) { echo "author" ;}else{echo "black" ;} ?>">
                                              <?php 
                                                
                                                $name="SELECT * FROM member where m_nId = '$id'" ;
                                                $rea=mysqli_query($conn,$name);
                                                if(mysqli_num_rows($rea)){
                                                $namecase=mysqli_fetch_assoc($rea);
                                                $sender=$namecase['m_fName'].' '.$namecase['m_lName'] ;
                                            }else{
                                                $sender=$row1["msg_sender"];
                                            }
                                                    ?>
                                                <span><?php echo $sender ?></span>
                                                
                                              <?php if ($row1["view"]==0) {?>  <div class="div-x"></div>  <?php }?> 
                                            </div>
                                            <p><?php echo $row1["msg_title"]; ?></p>
                                            <div class="time">
                                                <span>
                                                <?php 

                                                    $time=$row1["m_date"];
                                                    date_default_timezone_set('Europe/Istanbul');
                                                    $interval = new DateTime($time);

                                                  $h = $interval->format('%h');
                                                  $d = $interval->format('%d');
                                                  $m = $interval->format('%m');
                                                  $y = $interval->format('%y');
                                                  $s = $interval->format('%s');

                                                $hour = $interval->format('h');
                                                $minute = $interval->format('i a');
                                                  if ($m==0) 
                                                  {
                                                    if($d<=6)
                                                    {
                                                      if ($d<1) 
                                                      {
                                                        echo '<span> '.$hour.':'.$minute.'</span>';
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format('<span style="color:#FFA500">%d Days remaining</span>');
                                                      }
                                                    }else
                                                    {
                                                        if ($d==7) {
                                                           echo $interval->format('<span style="color:green">1 Week remaining</span>');
                                                        }
                                                        else
                                                            $week=floor($d/7);
                                                        echo '<span style="color:green">'.$week.' Weeks remaining</span>';
                                                       
                                                    }
                                                  }else 
                                                  {
                                                    if ($m==1) {
                                                           echo $interval->format('<span style="color:green">1 Month remaining</span>');
                                                        }
                                                        else
                                                    echo $interval->format('<span style="color:green">%m Month remaining</span>');
                                                  }
                                                ?>
                                                    
                                                </span>
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
                        if ($_SESSION["m_role"]=='Instructor'){ $mniid =  $_SESSION["m_nId"] ?>


                        <ul class="menu">
                            <li class="menu-item  current-menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                       

                        <ul class='menu'>
                            <li class="menu-item-has-children">
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
                        if ($_SESSION["m_role"]=='Student') { $mniid =  $_SESSION["m_nId"]?>


                        <ul class="menu">
                            <li class="menu-item  current-menu-item "> 
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class="menu-item-has-children">
                                <a href='courses.php'>Courses</a>
                        
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children'>
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
                                        <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>"> <span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
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



                        <?php  }}  ?> 
                    </nav>
                </div>
            </header>

            <?php  if(empty($_SESSION["m_nId"])){?>


            <section id="mc-section-2" class="mc-section-2 section">


                <div class="awe-parallax bg-section1-demo"></div>
                <div class="overlay-color-1"></div>
                <div class="container">
                    <div class="section-2-content">
                        <div class="row">   
                            <div class="col-md-5">
                                <div class="ct">
                                    <h2 class="big">Welcome to ISAMMDOCs</h2>
                                    <p class="mc-text">This Website serves as the learning management system for ISAMM. <br> <br>
                                    At the beginning of each semester, all courses will be added to ISAMMDOCs and all instructors 
                                    will be authorized for their course(s). Students will be added to their courses. <br><br>
                                    ISAMMDOCs offers rich learning and communication tools to faculty members and students. You can 
                                    manage several activities such as sharing sources, requesting home works and projects, submit 
                                    documents, checks grades, post events and more. </p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="image">
                                    <img src="images/image.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-offcanvas-content"  >
                    <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true"  >
                        <div class="uk-offcanvas-bar" style="margin-top:150px;height: 500px;right:38%;opacity: 0.90;border-radius: 25px;"> 
                            <form id="loginForm" method="POST" action="login.php" >
                                <h2 class="text-uppercase">Log in</h2>
                                <div class="form-email">
                                    <input type="text" name ="m_nId" placeholder="National ID">
                                </div>
                                <div class="form-password">
                                    <input type="password" name="m_pass" placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="check">
                                    <label for="check">
                                        <i class="icon md-check-2"></i>Remember me
                                    </label>
                                    <a href="forgotpass.php" title="Forgot your password?">Forget password?</a>
                                </div><br>
                                <div class="form-submit-1">
                                    <input type="submit" value="Log In" class="mc-btn btn-style-1">
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>

               
            </section>
            <!-- END / SECTION 2 -->
            
             


            <!-- SECTION 3 -->
            <section id="mc-section-3" class="mc-section-3 section"  style=" padding: 15PX">
                <div class="container">
                    <!-- FEATURE -->
                    <div class="feature-course">
                        <h4 class="title-box text-uppercase">EVENTS</h4>
                        <div class="row">
                          
                            <div class="feature-slider">
                             <?php
                                $sql="SELECT * FROM event order by e_id desc"; 
                                $result=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)){ 
                                 while($row=mysqli_fetch_assoc($result)){ 
                                    $timely=$row["e_id"];
                            ?>
                                <div class="mc-item mc-item-1" >
                                    <div class="image-heading" style="padding: 2PX">
                                        <?php 
                                                    echo "<img  src='images/".$row['e_photo']."'>" ;
                                                ?>
                                    </div>
                                    <div class="meta-categories"><?php echo $row["e_title"] ?> </div>
                                    <div class="content-item">
                                        <div class="image-author">
                                           <?php echo "<img  src='images/".$row['e_club_pic']."'>" ; ?>
                                        </div>

                                           <h4 style="font-size: 12PX; padding: 4PX">  <?php 
                                                if(strlen($row["e_description"]) > 50)
                                                {
                                                echo substr($row["e_description"], 0,40 )."...";
                                                }
                                                else 
                                                echo $row["e_description"];    
                                            ?> 
                                    </h4>
                                    </div>
                                    <div class="ft-item">
                                        <div class="rating">
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#"></a>
                                            <a href="#"></a>
                                        </div>
                                        <div class="view-info">
                                                 <span style="color: #FF0C22">  <i class="fa fa-map-marker"></i> </span>
                                           <?php  echo $row["e_place"] ?> 
                                        </div>
                                      <br><br>
                                        <div class="price" style="font-size: 12PX">
                                         <?php  echo $row["e_startdate"] ?> <br>
                                         
                                        </div>
                                    </div>
                                </div>

                   
                       
              <?php     } 

                                }
                                else{
                                    echo "You had no events";
                                }
                                mysqli_close($conn);?>
                            
                            </div>
                                 
                        </div>
                    </div>
                    <!-- END / FEATURE -->
                </div>
               

            </section>
            <!-- END / SECTION 3 -->
            

            <!-- END / HOME SLIDER -->
             <?php }  else{ 
                    ?>
                          
  
            <section class="sub-banner sub-banner-course" style="margin-bottom: 0px">

                <div class="awe-static bg-sub-banner-course"></div>
                <div class="container">
                    <div class="sub-banner-content">
                        <h2 class="text-center">Home</h2>
                    </div>

                </div>
            </section>
   <?php if ($_SESSION["m_role"] == 'Student' || $_SESSION["m_role"] == 'Instructor'){?>

 <section id="after-slider" class="after-slider section" style="margin-top:0px ">
                <div class="awe-color bg-color-1"></div>
                <div class="after-slider-bg-2"></div>
                <div class="container">
                    <div class="after-slider-content tb">
                        <div class="inner tb-cell">
                      
                       
                      
                        <h4>Find your course</h4>
                       
                            
                            
                              <div class="course-keyword">
                                <input type="text" width="400px" placeholder="Course keyword" id="title" autocomplete='off' >
                            </div>
                          
                        </div>
                        <div class="tb-cell text-right">
                            <div class="form-actions">

                                 <input type="submit" value="View all  Course" class="mc-btn btn-style-1"  id="find" ">
                                
                            </div>
                        </div>
                    </div>
              
                </div>
            </section>
           
           
                
             <section >
            <div class="container">
            <table class="mc-table" id="table" style="display: none">
            <script>
            var title=document.getElementById('title').value;
                $.post('index.php', {title: title});
            </script>
              <?php   if ($_SESSION["m_role"]=='Student'){ 

                  $sq="SELECT * FROM course
        left JOIN member ON course.c_level = member.m_level and course.c_cat = member.m_cat where member.m_nId=$_SESSION[m_nId] "; 
             } 
             if ($_SESSION["m_role"] == 'Instructor'){ 
                 $sq="SELECT * FROM course where  c_id in (SELECT c_id from member_course where m_nId=$_SESSION[m_nId])"; 
                 
             }
              

                        $res=mysqli_query($conn,$sq);
                        if(mysqli_num_rows($res))
                        {  

                ?>
              
                <thead >
                    <tr>
                  
                        <th class="latest-reply"><span class="gris">Title</span></th>
                        <th class="latest-reply" colspan="1"><span class="gris">Review System</span></th>
                        <?php 
                            if ($_SESSION["m_role"] == 'Student') {
                              
                            
                         ?>
                        <th class="latest-reply" ><span class="gris">Attendence</span></th>
                        <th class="latest-reply " ><span class="gris"></span></th>
                        <?php  } else{?>
                        <th class="latest-reply"><span class="gris">Level</span></th>
                        <th class="latest-reply"><span class="gris">Category</span></th>
                        <th class="latest-reply" colspan="3"><span class="gris">Groups</span></th>
                        <?php }}?>
                    </tr>
                </thead>
               
                    


                            <?php 
                    while($ro=mysqli_fetch_assoc($res))
                    { 
                     $nb = $ro["c_id"]; 
                  
                                
                ?>
                
               
                
                     <tr id='tr<?php echo $nb?>' style="display: none"> 
                
                    <td id="id<?php echo $nb?>" class="latest-reply col-md-3"><img src="images/courses3.png" width="40px" height="40px">&ensp;&ensp;<?php echo $ro["c_fullname"] ?></td>
                    <td id="idr<?php echo $nb?>" class="latest-reply " colspan="1" ><?php echo $ro["c_reviewsystem"] ?></td>
                    <?php
                    if ($_SESSION["m_role"] == 'Student') {
                        ?>
                    <td class="latest-reply col-md-1 " colspan="2">
                    <?php 
                        
                        $sq = "SELECT count(*) as total from attendance WHERE  c_id= '$nb'";
                        $resu=mysqli_query($conn,$sq);
                        mysqli_num_rows($resu);
                        $r=mysqli_fetch_assoc($resu);
                    
                        $j=$ro['c_totalabsence']-$r['total'];
                        for ($i=0; $i < $r['total']; $i++) { 
                            if ($ro['c_totalabsence']==$r['total']){
                                echo '  <span style="left:200px"><i class="material-icons " style="font-size:20px; color:red">close</i></span>';
                            }
                            else if ($r['total']<=($ro['c_totalabsence']/2)) {
                               echo '  <span style="left:200px"><i class="material-icons " style="font-size:20px; color:green">close</i></span>';
                            }
                            else {
                               echo '  <span style="left:200px"><i class="material-icons " style="font-size:20px; color:#FF8000">close</i></span>';
                            }
                            
                         
                        }
                        for ($k=0; $k < $j; $k++) { 
                             echo '  <span><i class="material-icons " style="font-size:20px;color:#D8D8D8">close</i></span>';
                        }
                        ?></td>

                        <td>
                            <?php 
                             if ($ro['c_totalabsence']<=$r['total']) {
                            echo '  <span  style="color:gray">Eliminated</span>';
                        }}
                        if ($_SESSION["m_role"] == 'Instructor'){ ?>
                            <td class="latest-reply  " > <?php echo $ro["c_level"] ;?></td>
                            <td class="latest-reply  " > <?php echo $ro["c_cat"];?></td>
                            <td class="latest-reply  " > 
                                <?php 
                                     $sqli="SELECT * FROM member_course where m_nId=$_SESSION[m_nId] and c_id='$nb' ORDER BY group_nb "; 
                                     $resulti=mysqli_query($conn,$sqli);
                                    if(mysqli_num_rows($resulti))
                                    {   
                                        while($rowi=mysqli_fetch_assoc($resulti))
                                            {
                                               $grp = $rowi["group_nb"];  
                                ?>  
                                    <button type="button" id="gr" ><?php echo $grp?></button>
                                    <?php }}?>
                            </td>
                        <?php }?>
                   
                    </td>
                     

                </tr>  
                 <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
        <script src="jquery/jquery.form.min.js"></script>
        <script>


                 $("[id=find]").click(function(){ 
                    $("[id=table]").slideDown();
                    $("[id=tr<?php echo $nb?>]").show();
                    $("[id=up]").show();
                });
              
                $("[id=title]").keypress(function(){ 
                    $("[id=table]").slideDown();
                    $("[id=up]").show();
                    $("[id=tr<?php echo $nb?>]").hide();
                     var title=document.getElementById('title').value;

                    if ($("[id=id<?php echo $nb?>]").text().toUpperCase().match(title.toUpperCase()))
                    {
                        $("[id=tr<?php echo $nb?>]").slideDown();
                    }
                    

                });
                

               
               
                 
            </script>
 
                <?php }  }?>
                
            </table>

            <i id="up" style="color: #175690;cursor: pointer;margin: 5px;display: none" class="material-icons pull-right" >keyboard_arrow_up</i>
             
            <script >
                 $("[id=up]").click(function(){ 
                    $("[id=table]").slideUp();
                    $("[id=up]").slideUp();
                    $("[id=title]").val('');

             
                });


            </script>
                </div>

                
            </section>

          <section class="nw">
          <br>
     <h3 class="md black" style="margin-left: 30px;color:black" >News</h3>
        <div class="container" >
        <?php 

            
            $sqli="SELECT * FROM member where m_nId=$_SESSION[m_nId]"; 
            $resulti=mysqli_query($conn,$sqli);
                              if(mysqli_num_rows($resulti))
                                {   
                                    while($rowi=mysqli_fetch_assoc($resulti))
                                    {
                                        $level=$rowi["m_level"];
                                        $cat=$rowi["m_cat"];
                               
        ?>
                <div class="col-md-3 col-md-offset-1 pull-right" id="news" >
                    <aside class="blog-sidebar">
                        <div class="widget widget_categories" style="margin-bottom: 0px">
                        <?php 
                            if ($_SESSION["m_role"] == 'Student') {
                               
                            
                        ?>
                            <h4 class="sm">Upcoming events</h4>
                            
                            <?php 

                                $sql="SELECT * FROM doc where d_type ='HomeWork Announcment' 
                                and c_id in (SELECT c_id from course where c_level='$level' and c_cat='$cat')  and d_id NOT IN(SELECT d_id from sub_doc where sh_posterid= '$_SESSION[m_nId]') 
                                 order by d_id desc "; 
                              $result1=mysqli_query($conn,$sql);
                              $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result1))
                                ?>
                                 <h5 class="black">Homeworks</h5>

                            <?php 
                                {   while ($row1=mysqli_fetch_assoc($result1)) {
                                        $time=$row1["d_sdl"];
                                         date_default_timezone_set('Europe/Istanbul');
                                        $dt = new DateTime($time);

                                        date_default_timezone_set('Europe/Istanbul');
                                        $date = new DateTime(date('y-m-d h:i:s a'));

                                        if ($dt>$date) { ?>
                                    <?php
                                    $row=mysqli_fetch_assoc($result);
                                    



                                       $title=$row["d_title"];
                                       $c_id=$row["c_id"];
                                       $id = $row['d_id'];
                                  

                                       $sqzz="SELECT * FROM course where c_id = $c_id";
                                         $resu=mysqli_query($conn,$sqzz);
                                         if(mysqli_num_rows($resu))
                                {   $rowr1=mysqli_fetch_assoc($resu);
                                         $ism =$rowr1["c_fullname"];
                                     }

                            ?>
                                
                                <a href='<?php echo "coursedetails.php?&c_id=".$c_id ?>' style="text-decoration: none;" > 
                                  <img src="images/lecture2.png" width="10px" height="10px">&ensp;&ensp;
                                  <span style="color: gray"><?php echo $title  ?></span></a>
                                  &ensp;&ensp;<a href="<?php echo "download.php?d_id=".$id."" ?>" >
                                    <img src="images/download.png" width="12px" height="10px">
                                  </a>
                                  <span class="pull-right" style="color: gray"><?php 
                                     $interval = $dt->diff($date);
                                              $h = $interval->format('%h');
                                              $d = $interval->format('%d');
                                              $m = $interval->format('%m');
                                              $y = $interval->format('%y');
                                              $s = $interval->format('%s');
                                            
                                            $hour = $dt->format('h');
                                            $minute = $dt->format('i a');
                                            
                                                                                             
                                             
                                                  if ($m==0) 
                                                  {
                                                    if($d<=6)
                                                    {
                                                      if ($d<1) 
                                                      {
                                                        echo '<span style="color:red">Today '.$hour.':'.$minute.'</span>';
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format('<span style="color:#FFA500">%d Days remaining</span>');
                                                      }
                                                    }else
                                                    {
                                                        if ($d==7) {
                                                           echo $interval->format('<span style="color:green">1 Week remaining</span>');
                                                        }
                                                        else{
                                                            $week=floor($d/7);
                                                                 echo $interval->format('<span style="color:green">.$week. Week remaining</span>');
                                                        }

                                                       
                                                    }
                                                  }else 
                                                  {
                                                    if ($m==1) {
                                                           echo $interval->format('<span style="color:green">1 Month remaining</span>');
                                                        }
                                                        else
                                                    echo $interval->format('<span style="color:green">%m Month remaining</span>');
                                                  }
                                                
                                               
                                                
                                            

                                 ?></span> 
                                 <?php ?>
                                 <br>
                                <span class="black" style="font-size: 10px; margin-left: 26px"> [<?php echo $ism?>] </span>
                               <br>
                             <?php }}}
                                $sql="SELECT * FROM doc where d_type ='Project Announcment' 
                                and c_id in (SELECT c_id from course where c_level='$level' and c_cat='$cat')  and d_id NOT IN(SELECT d_id from sub_doc where sh_posterid= '$_SESSION[m_nId]') 
                                 order by d_id desc "; 
                              $result1=mysqli_query($conn,$sql);
                              $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result1)){ 
                                ?>
                              <h5 class="black">Projects</h5>
                            <?php 
                                  while($row1=mysqli_fetch_assoc($result1)){
                                        $time=$row1["d_sdl"];
                                         date_default_timezone_set('Europe/Istanbul');
                                        $dt = new DateTime($time);

                                        date_default_timezone_set('Europe/Istanbul');
                                        $date = new DateTime(date('y-m-d h:i:s a'));

                                        if ($dt>$date) { ?>
                                  
                                    <?php
                                    $row=mysqli_fetch_assoc($result);
                                    



                                       $title=$row["d_title"];
                                       $c_id=$row["c_id"];
                                       $id = $row['d_id'];
                                  

                                       $sqzz="SELECT * FROM course where c_id = $c_id";
                                         $resu=mysqli_query($conn,$sqzz);
                                         if(mysqli_num_rows($resu))
                                {   $rowr1=mysqli_fetch_assoc($resu);
                                         $ism =$rowr1["c_fullname"];
                                     }

                            ?>
                                
                                <a href='<?php echo "coursedetails.php?&c_id=".$c_id ?>' style="text-decoration: none;" > 
                                  <img src="images/lecture2.png" width="10px" height="10px">&ensp;&ensp;
                                  <span style="color: gray"><?php echo $title  ?></span> </a>
                                  &ensp;&ensp;<a href="<?php echo "download.php?d_id=".$id."" ?>" >
                                    <img src="images/download.png" width="12px" height="10px">
                                  </a>
                                  <span class="pull-right" style="color: gray"><?php 
                                     $interval = $dt->diff($date);
                                              $h = $interval->format('%h');
                                              $d = $interval->format('%d');
                                              $m = $interval->format('%m');
                                              $y = $interval->format('%y');
                                              $s = $interval->format('%s');
                                            
                                            $hour = $dt->format('h');
                                            $minute = $dt->format('i a');
                                            
                                                                                             
                                             
                                                  if ($m==0) 
                                                  {
                                                    if($d<=6)
                                                    {
                                                      if ($d<1) 
                                                      {
                                                        echo '<span style="color:red">Today '.$hour.':'.$minute.'</span>';
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format('<span style="color:#FFA500">%d Days remaining</span>');
                                                      }
                                                    }else
                                                    {
                                                        if ($d==7) {
                                                           echo $interval->format('<span style="color:green">1 Week remaining</span>');
                                                        }
                                                        else
                                                            $week=floor($d/7);
                                                        echo '<span style="color:green">'.$week.' Weeks remaining</span>';
                                                       
                                                    }
                                                  }else 
                                                  {
                                                    if ($m==1) {
                                                           echo $interval->format('<span style="color:green">1 Month remaining</span>');
                                                        }
                                                        else
                                                    echo $interval->format('<span style="color:green">%m Month remaining</span>');
                                                  }
                                                
                                               
                                                
                                            

                                 ?></span> 
                                 <br>
                                <span class="black" style="font-size: 10px; margin-left: 26px"> [<?php echo $ism?>] </span>
                               <br>
                             
                                    
                             <?php }}}
                             $sql="SELECT * FROM examdate  
                                where c_id in (SELECT c_id from course where c_level='$level' and c_cat='$cat') order by ex_id desc "; 
                              $result1=mysqli_query($conn,$sql);
                              $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result1)) { 
                                ?>
                            <h5 class="black">Exams date</h5>
                            <?php 
                                 while($row1=mysqli_fetch_assoc($result1)) {
                                        $time=$row1["ex_date"];
                                         date_default_timezone_set('Europe/Istanbul');
                                        $dt = new DateTime($time);

                                        date_default_timezone_set('Europe/Istanbul');
                                        $date = new DateTime(date('y-m-d h:i:s a'));


                                            $interval = $dt->diff($date);
                                    
                                              $h = $interval->format('%h');
                                              $d = $interval->format('%d');
                                              $m = $interval->format('%m');
                                              $y = $interval->format('%y');
                                              $s = $interval->format('%s');

                                        if ($y==0 && $m==0 && $d<=7) { ?>
                                    
                                    <?php
                                    $row=mysqli_fetch_assoc($result);
                                    



                                       $title=$row["ex_type"];
                                       $c_id=$row["c_id"];
                                       $id = $row['ex_id'];
                                  

                                       $sqzz="SELECT * FROM course where c_id = $c_id";
                                         $resu=mysqli_query($conn,$sqzz);
                                         if(mysqli_num_rows($resu))
                                {   $rowr1=mysqli_fetch_assoc($resu);
                                         $ism =$rowr1["c_fullname"];
                                     }

                            ?>
                                
                                <a href='<?php echo "coursedetails.php?&c_id=".$c_id ?>' style="text-decoration: none;" > 
                                  <img src="images/exam.png" width="20px" height="10px">&ensp;&ensp;
                                  <span style="color: gray"><?php echo $title  ?></span> </a>
                                  &ensp;&ensp;
                                  <span class="pull-right" style="color: gray"><?php 

                                            
                                            $hour = $dt->format('h');
                                            $minute = $dt->format('i a');
                                            
                                                                                             
                                             
                                                 
                                                    if($d<5)
                                                    {
                                                      if ($d<1) 
                                                      {
                                                        echo '<span style="color:red">Today '.$hour.':'.$minute.'</span>';
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format('<span style="color:#FFA500">%d Days remaining</span>');
                                                      }
                                                    }else
                                                    {
                                                        if ($d<7) {
                                                        echo $interval->format('<span style="color:green">%d Days remaining</span>');
                                                        }
                                                        else{
                                                        echo $interval->format('<span style="color:green">1 Week remaining</span>');
                                                        }
                                                    }
                                                        
                                                        
                                                  
                                                
                                               
                                                
                                            

                                 ?></span> 
                                 <br>
                                <span class="black" style="font-size: 10px; margin-left: 26px"> [<?php echo $ism?>] </span>
                               <br>
                             
                                    
                             <?php }}}}
                            if ($_SESSION["m_role"] == 'Instructor') { ?>
                                 <h4 class="sm">Requests</h4>

                                     <h5 class="black">Events</h5>
 
                                 <h5 class="black">Attendence Letters</h5>
                                <a href="attendanceletter.php">  <?php $sql="SELECT  * FROM attendance_letter where (($_SESSION[m_nId]=supervisor1_id AND s_sup1=0 ) OR ($_SESSION[m_nId]=supervisor2_id AND s_sup2=0 )) and State=0" ;
                            $result=mysqli_query($conn,$sql);
                            $n = mysqli_num_rows($result);

                              
                                if ($n==1)
                                    echo "You have ". $n." request";
                                if ($n>1)
                                     echo "You have ".$n." requests" ;

                                  ?> 
                                  </a>
                              <?php } 
                               if ($_SESSION["m_role"] == 'Administrator') { ?>
                                 <h4 class="sm">Requests</h4> 
                                 <h5 class="black">Events</h5>

                                 <h5 class="black">Attendence Letters</h5>
                                 <a href="attendanceletter.php"> <?php $sql="SELECT  * FROM attendance_letter where  s_sup1=1  AND s_sup2=1  and State=0" ;
                            $result=mysqli_query($conn,$sql);

                            $n = mysqli_num_rows($result);
                              if(mysqli_num_rows($result1)){

                              
                                if ($n==1)
                                    echo "You have ". $n." request";
                                if ($n>1)
                                     echo "You have ".$n." requests" ;

                                  ?> 
                                  </a>
                              <?php }} ?>
                        </div>
                    </aside>
                </div>
                <?php }}?>
                <!-- END / SIDEBAR -->
            <div id="accordion" class="panel-group" >
            
                <?php   if ($_SESSION["m_role"]=='Student'){ 

                 $sql="SELECT * FROM announcement WHERE (a_cat = ' ' OR a_cat = '$_SESSION[m_cat]') and (a_level = ' ' OR a_level = '$_SESSION[m_level]') order by a_id desc "; 
             } 
             else { 
                  $sql="SELECT * FROM announcement order by a_id desc";
             }
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)){  ?>
                <?php 
                                while($row=mysqli_fetch_assoc($result)) {
                                     $title = $row['a_subject'] ; 
                                     $msg = $row['a_message'] ;
                                     $poster = $row['a_posternid'] ;
                                  
                                     $aid = $row['a_id'] ;
                                     $time = $row['a_date'] ;

                                     date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($time);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                                $interval = $dt->diff($date);
                                              $h = $interval->format('%h');
                                              $d = $interval->format('%d');
                                              $m = $interval->format('%m');
                                              $y = $interval->format('%y');
                                              $s = $interval->format('%s');

                                            if($date>$dt && $y==0 && $m==0 && $d<=7)
                                            {
                                          
                                      

                                     ?>

            
                <!-- PANEL -->
                <div class="panel panel-default" style="width: 800px;">
                    <div class="panel-heading" style="width: 800px;background: rgba(128,128,128,0.3);border: 1px solid gray;">
                        <h4 class="panel-title">
                        <style> .panel-title a:hover {
                            text-decoration: none;
                            color: gray
                            } </style>
                            <a data-toggle="collapse"  data-parent="#accordion" href="#offcanvas-rev<?php echo "$aid" ?>" >
                              <?php echo $title ;  ?>
                              <span class="pull-right">   
                                <?php  
                                           
                                                                                             
                                               if ($y==0) 
                                               {
                                                  if ($m==0) 
                                                  {
                                                    if($d==0)
                                                    {
                                                      if ($h==0) 
                                                      {
                                                        
                                                        echo $interval->format(' %i minutes ago');
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format(' %h hours ago');
                                                      }
                                                    }else
                                                    {
                                                      echo $interval->format(' %d days ago');
                                                    }
                                                  }else 
                                                  {
                                                    echo $interval->format(' %m months ago');
                                                  }
                                                
                                               }
                                                else{
                                                  echo $interval->format(' %year ago');
                                                }
                                            }

                                        ?>
                              </span>
                            </a>
                        </h4>
                    </div>
                    <div id="offcanvas-rev<?php echo "$aid" ?>" class="panel-collapse collapse">
                        <div class="panel-body" >
                           <span style="width: 200px; float: left;">  

  <a href="#">
                                               <?php $poster="SELECT * FROM member where m_nId ='$poster' " ;
                                           $pos=mysqli_query($conn,$poster);
                                          if(mysqli_num_rows($pos))
                                            { while($poss=mysqli_fetch_assoc($pos)) {

                                            $name = $poss['m_fName'] . " ".$poss['m_lName']  ;


                                              if (!empty($poss["m_Pic"] )){ 
                                                $name = $poss['m_fName'] . " ".$poss['m_lName']  ;
                                                 $sk = $poss['m_Pic'] ; ?> 
                                                   
                                  <span style= "margin-right: 14px; float: left"> <img id='blah' style='width : 40px ;height: 40px;' src='images/<?php echo $sk?>'>

            
                         <?php          } 

                                        
                                  
                                       if (empty($poss["m_Pic"] )){ 

                                        if ($poss["m_gender"]=='Female') { ?>

                                       <img style='width : 40px ;height: 40px;' src="images/female.png" /> 
                                            <?php  }
                                            else  if ($poss["m_gender"]=='Male'){ ?>
                                         <img style='width : 40px ;height: 40px;' src="images/male.jpg" /> 
                                            <?php  } 
                                            else {  ?>
                                       <img style='width : 40px ;height: 40px;' src="images/male.jpg" /> 
                                            <?php }  } ?>



                                                    
                                                </a>
                                         
                                          
                                                <cite class="fn sm black bold" style="font-size:15px; "><a href="">
                                                 <span style="color: #37ABF2; padding: 0px ;" > <?php echo $name ; ?></span>
                                                </a>  </cite> <?php }}?>


<br> <br>
                            <h5 class="sm black bold">Content</h5>
                           
                                  <p style="width: 400px"> <?php echo $msg ;  ?></p> </span>
                                   
                            <?php  if (!empty($row['a_attachment'] )){ ?>

                            <div class="image-heading " style="margin-left:580px;width: 170px">
                            
                                       <?php  if (!empty($row['a_path'] )){ 
                                    if(substr($row['a_path'],-3)=='pdf'){
                                      echo "
                                      <a href='downloadannouncement.php?a_id=$aid ' class='portfolio-box'>

                                                                    <img style='width: 170px;height: 170px' src='images/pdf.png'>
                                                                    <div class='portfolio-box-caption'>
                                                                        <div class='portfolio-box-caption-content'>
                                                                            <div class='project-category text-faded'>
                                                                                <i class='fa fa-download'></i>&ensp;&ensp;Download
                                                                            </div>
                                                                            <div class='project-name'>
                                                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>" ; }

                                 

                                    else if(substr($row['a_path'],-3)=='doc'|| substr($row['a_path'],-4)=='docx'){
                                      echo "<a href='downloadannouncement.php?a_id=$aid ' class='portfolio-box'>

                                                                    <img style='width: 170px;height: 170px' src='images/docx.png'>
                                                                    <div class='portfolio-box-caption'>
                                                                        <div class='portfolio-box-caption-content'>
                                                                            <div class='project-category text-faded'>
                                                                                <i class='fa fa-download'></i>&ensp;&ensp;Download
                                                                            </div>
                                                                            <div class='project-name'>
                                                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>" ; }
                                      else if(substr($row['a_path'],-3)=='xls' || substr($row['a_path'],-4)=='xlsx'){
                                      echo "<a href='downloadannouncement.php?a_id=$aid ' class='portfolio-box'>

                                                                    <img style='width: 170px;height: 170px' src='images/exel.png'>
                                                                    <div class='portfolio-box-caption'>
                                                                        <div class='portfolio-box-caption-content'>
                                                                            <div class='project-category text-faded'>
                                                                                <i class='fa fa-download'></i>&ensp;&ensp;Download
                                                                            </div>
                                                                            <div class='project-name'>
                                                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>" ; }
                                      else if(substr($row['a_path'],-3)=='ppt' || substr($row['a_path'],-4)=='pptx'){
                                        echo "<a href='downloadannouncement.php?a_id=$aid ' class='portfolio-box'>

                                                                    <img style='width: 170px;height: 170px' src='images/ppt.png'>
                                                                    <div class='portfolio-box-caption'>
                                                                        <div class='portfolio-box-caption-content'>
                                                                            <div class='project-category text-faded'>
                                                                                <i class='fa fa-download'></i>&ensp;&ensp;Download
                                                                            </div>
                                                                            <div class='project-name'>
                                                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>" ; 
                                    }else if(substr($row['a_path'],-3)=='rar' || substr($row['a_path'],-3)=='zip'){
                                        echo "<a href='downloadannouncement.php?a_id=$aid ' class='portfolio-box'>

                                                                    <img style='width: 170px;height: 170px' src='images/rar.png'>
                                                                    <div class='portfolio-box-caption'>
                                                                        <div class='portfolio-box-caption-content'>
                                                                            <div class='project-category text-faded'>
                                                                                <i class='fa fa-download'></i>&ensp;&ensp;Download
                                                                            </div>
                                                                            <div class='project-name'>
                                                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>" ; 
                                    }
                                    else {
                               echo "
                                                                <div class='portfolio-box'>
                                                                    <img style='width: 170px;height: 170px' src='$row[a_path]'>
                                                                    <div class='portfolio-box-caption'>
                                                                        <div class='portfolio-box-caption-content'>
                                                                            <div class='project-category text-faded'>
                                                                            <div   
                                                                            style='color:white;text-decoration:none;cursor:pointer' href='#modal-full$aid' uk-toggle>
                                                                            Show<i class='material-icons'>zoom_in</i>
                                                                            </div>
                                                                            </div>
                                                                            <div class='project-category text-faded' style='margin-top:20px'>
                                                                           <a href='downloadannouncement.php?a_id=$aid ' style='color:white;text-decoration:none'>
                                                                                <i class='fa fa-download'></i>&ensp;&ensp;Download</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                 </div> " ; ?>
                        <div id="modal-full<?php echo  $aid ?>" class="uk-modal" uk-modal style="padding: 0px;color: black;">
                            <div class="uk-modal-dialog " style="padding: 0px;opacity: 0.95;color: black"  >
                                <button class="uk-modal-close-full" type="button" uk-close></button>
                               
                                    <div class="uk-background-cover" style="background-image: url('<?php echo $row['a_path']; ?>');background-size: 70% " uk-height-viewport>
                                    </div>
                              
                            </div>
                        </div>
                                                                <?php }}?>
                            </div>
                               <?php 
                                      }?>
                           
                        </div>
                         
                    </div>
                </div>
              
       
       <?php } } else{?> 

           <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#question-122222">
                               You had no announcement
                            </a>
                        </h4>
                    </div>
                  
                </div>
                <?php 
                            }
                             ?>
                              
            
            </div>
            <div>
        </div>
        </div>
        
   </section>
    <!-- END / FRECUENT ASKED QUESTIONS -->
    



            <!-- AFTER SLIDER -->
             
            <!-- END / AFTER SLIDER -->








            
            <!-- SECTION 1 -->
            <section id="mc-section-1" class="mc-section-1 section">
                <div class="container">
               



                    <div class="row" >
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-4">
                                   <img src="images/imm.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item" >
                                       
                                        <h4 class="title-box text-uppercase" >L.F. Informatique multimédia</h4>
                                        <p>
                                            Type: Fundamental license <br>
                                            Domain: Science and technology<br>
                                            Department: Computer Science
                                         </p>
                                     </div>
                                </div>
            
                                <div class="col-sm-4">
                                   <img src="images/cm.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                      
                                        <h4 class="title-box text-uppercase">L.A. communication multimédia</h4>
                                        <p> 
                                            Type: Applied license <br>
                                            Domain: Visual arts<br>
                                            Department: Multimedia Communication
                                        </p>
                                    </div>
                                </div>

                                 <div class="col-sm-4">
                                    <img src="images/3d.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                       
                                        <h4 class="title-box text-uppercase">L.A. co-construite</h4>
                                        <p>  Type: Applied license <br>
                                            Domain: Beautiful arts<br>
                                            Department: Production of 3D films animation
                                        </p>
                                    </div>
                                </div>
            
                                <div class="col-sm-4">
                                   <img src="images/game.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                       
                                        <h4 class="title-box text-uppercase">L.A.C. Jeux Vidéos</h4>
                                        <p> Type: Applied license <br>
                                            Domain: Communication Technologies<br>
                                            Department: Production of Video Games
                                        </p>
                                    </div>
                                </div>
            
                                <div class="col-sm-4">
                                   <img src="images/avv.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                        
                                        <h4 class="title-box text-uppercase">L.A. audio-visuel</h4>
                                         <p> Type: Applied license <br>
                                            Domain:Cinema and Audiovisual<br>
                                            Department: Audiovisual
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <img src="images/cinema.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                       
                                        <h4 class="title-box text-uppercase">mastères production</h4>
                                         <p> Type: Professional Master <br>
                                            Domain: Visual arts<br>
                                            Department: Cinema and Audiovisual
                                        </p>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    <img src="images/recherch.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                      
                                        <h4 class="title-box text-uppercase">Mastère recherche</h4>
                                          <p> Type: Research master <br>
                                            Domain: Science and technology<br>
                                            Department: Computer Science 
                                        </p>
                                    </div>
                                </div>
                                     <div class="col-sm-4">
                                        <img src="images/recherche.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                        
                                        <h4 class="title-box text-uppercase">mastère professionnel</h4>
                                        <p> Type:  Professional Master <br>
                                            Domain: Science and technology<br>
                                            Department: Computer Science
                                        </p>
                                    </div>
                                </div>
                                      <div class="col-sm-4">
                                         <img src="images/mind.png" alt="" width="40px" height="40PX"  style=" float: left;clear: none; margin-top: 13px">
                                    <div class="featured-item">
                                       
                                        <h4 class="title-box text-uppercase">Cycle ingénieur</h4>
                                      <p> Type: Engineering  <br>
                                            Domain: Science and technology<br>
                                            Department: Computer Science
                                        </p>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                      
            
                 
                        </div>
            
                    </div>
                </div>
            </section>
            <!-- END / SECTION 1 -->
            
            
            
            <!-- SECTION 2 -->
            <section id="mc-section-2" class="mc-section-2 section">
                <div class="awe-parallax bg-section1-demo"></div>
                <div class="overlay-color-1"></div>
                <div class="container">
                    <div class="section-2-content">
                        <div class="row">
                            
                            <div class="col-md-5">
                                <div class="ct">
                                    <h2 class="big">Welcome to ISAMMDOCs</h2>
                                    <p class="mc-text">

 
 This Website serves as the learning management system for ISAMM. <br> <br>

<!--You can login to ISAMMDOCs with your national id number (or passport number for foreigners ) and password as your registration number. <br> <br> !-->

 At the beginning of each semester, all courses will be added to ISAMMDOCs and all instructors will be authorized for their course(s). Students will be added to their courses. <br><br>

ISAMMDOCs offers rich learning and communication tools to faculty members and students. You can manage several activities such as sharing sources, requesting home works and projects, submit documents, checks grades, post events and more. 



</p>
                                  
                                </div>
                            </div>
            
                            <div class="col-md-7">
                                <div class="image">
                                    <img src="images/image.png" alt="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- END / SECTION 2 -->
            
            
            <!-- SECTION 3 -->
            <section id="mc-section-3" class="mc-section-3 section">
                <div class="container">
                    <!-- FEATURE -->
                    <div class="feature-course">
                        <h4 class="title-box text-uppercase">EVENTS</h4>
                        <a href="events.php" class="all-course mc-btn btn-style-1">View all</a>
                        <div class="row">
                          
                            <div class="feature-slider">
                             <?php
                                $sql="SELECT * FROM event order by e_id desc"; 
                                $result=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) ){ 
                                 while($row=mysqli_fetch_assoc($result)){ 
                                    $timely=$row["e_id"];
                                    $time=$row["e_startdate"];
                                         date_default_timezone_set('Europe/Istanbul');
                                        $dt = new DateTime($time);

                                        date_default_timezone_set('Europe/Istanbul');
                                        $date = new DateTime(date('y-m-d h:i:s a'));

                                        if ($dt>$date) { 
                            ?>
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <?php 
                                                    echo "<img  src='images/".$row['e_photo']."'>" ;
                                                ?>
                                    </div>
                                    <div class="meta-categories"><?php echo $row["e_title"] ?> </div>
                                    <div class="content-item">
                                        <div class="image-author">
                                           <?php echo "<img  src='images/".$row['e_club_pic']."'>" ; ?>
                                        </div>
                                     
                                        <div class="name-author">
                                            By <a><?php  echo $row["e_club_name"] ?></a> <br>
                                        </div>
                                           <h4 style="font-size: 12PX; padding: 4PX">  <?php 
                                                if(strlen($row["e_description"]) > 50)
                                                {
                                                echo substr($row["e_description"], 0,40 )."...";
                                                }
                                                else 
                                                echo $row["e_description"];    
                                            ?> 
                                    </h4>
                                    </div>
                                    <div class="ft-item">
                                        <div class="rating">
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#" class="active"></a>
                                            <a href="#"></a>
                                            <a href="#"></a>
                                        </div>
                                        <div class="view-info">
                                                 <span style="color: #FF0C22">  <i class="fa fa-map-marker"></i> </span>
                                           <?php  echo $row["e_place"] ?> 
                                        </div>
                                      <br><br>
                                        <div class="price" style="font-size: 12PX">
                                         <?php  echo $row["e_startdate"] ?> <br>
                                         
                                        </div>
                                    </div>
                                </div>
                   
                       
              <?php     } }

                                }
                                else{
                                    echo "You had no events";
                                }
                                mysqli_close($conn);?>
                            
                            </div>
                                 
                        </div>
                    </div>
                    <!-- END / FEATURE -->
                </div>
            </section>
            <!-- END / SECTION 3 -->
            
            
            
   




            <?php 
             
           }?> 


                        
            <!-- END / BODY -->
            

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
                                                        <?php if (empty($_SESSION['m_nId'])) { ?>
                                                    <input class="input-text" type="text" id="m" name="msg_sender" placeholder="Email">
                                                     <span id="erm" style="color: red"></span>
                                                <?php } ?>
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
        <script src="js/uikit-icons.min.js"></script>
        
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.21/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.21/js/uikit-icons.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 

       

        <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="js/jquery.min.js"></script>
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>

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
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
        <script src="jquery/jquery.form.min.js"></script>
    </body>
</html>
