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
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/library/animate.css">
        <link rel="stylesheet" type="text/css" href="css/md-font.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">

       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Inbox</title>
    </head>
<body id="page-top" class="home">
    <div id="page-wrap">
            <!-- HEADER -->
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

                        if ($_SESSION["m_role"] == 'Administrator'){ $mniid =  $_SESSION["m_nId"]?>

                        <ul class="menu">
                            <li class="menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu '>
                            <li class='menu-item-has-children'>
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
                        if ($_SESSION["m_role"]=='Instructor'){ $mniid =  $_SESSION["m_nId"] ?>


                        <ul class="menu">
                            <li class="menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                       

                        <ul class='menu'>
                            <li class="menu-item-has-children current-menu-item">
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
                                 <a href='#'><i class='icon md-email'></i></a>
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
                        if ($_SESSION["m_role"]=='Student') { $mniid =  $_SESSION["m_nId"] ?>


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
                                 <a href='#'><i class='icon md-email'></i></a>
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


            <!-- BODY -->
            <section class="profile-feature">
                <div class="awe-parallax bg-profile-feature"></div>
                <div class="awe-overlay overlay-color-3"></div>
                <div class="container">
                    <div class="info-author">
                        <div class="image">         
                            <?php  
                                $sql1="SELECT * FROM member where  m_nId = '$_SESSION[m_nId]'"; 
                                $result1=mysqli_query($conn,$sql1);
                                if(mysqli_num_rows($result1))
                                {   
                                    while($row1=mysqli_fetch_assoc($result1)) { 
                                        if (!empty($row1["m_Pic"] )){ 
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
                            <?php } } }}?>          
                        </div> 
                    </div>    
                    <div class="name-author">
                        <h2 class="big"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h2>
                    </div>     
                    <div class="address-author">
                        <i class="icon md-user-minus" style="color:white"></i>
                        <h3>&ensp;<?php echo $_SESSION["m_role"]; ?></h3>
                    </div>
                </div>
                <div class="info-follow">
                <?php  if ($_SESSION["m_role"]=='Student') { ?>
                    <div class="trophies">

                        <span>Group</span>
                            <p style="text-align: center">
                                <?php
                                echo $_SESSION["m_level"]." ".$_SESSION["m_cat"]; 
                                   

                                                  
                                ?>   
                            </p>
                    </div>
                    <?php }?>
                    <div class="trophies">
                        <span>Registration Number</span>
                        <p style="text-align: center"><?php echo $_SESSION["m_rn"]; ?></p>
                    </div>
                    <div class="trophies">
                        <span>National ID</span>
                        <p style="text-align: center"><?php echo $_SESSION["m_nId"]; ?></p>
                    </div>
                    <div class="trophies">
                        <span style="text-align: center">Date</span>
                        <p ><?php echo date("d/m/Y"); ?></p>
                    </div>
                </div>
            </section>
    <!-- END / PROFILE FEATURE -->


    <!-- CONTEN BAR -->
    <section class="content-bar">
        <div class="container">
            <ul>
             
                <li>
                    <a href="<?php echo "profile.php?m_nId=".$mniid."";?>">
                        <i class="icon md-shopping"></i>
                        Profile
                    </a>
                </li>
                <?php  if ($_SESSION["m_role"]=='Student'){?>
                <li>
                    <a href="grades.php">
                        <i class="icon md-user-minus"></i>
                        Grade
                    </a>
                </li>
                <?php } ?>
                <li class="current">
                    <a href="inbox.php">
                        <i class="icon md-email"></i>
                        Inbox
                    </a>
                </li>
            </ul>
        </div>
    </section>
   <!-- END / CONTENT BAR -->
 
    
    <!-- COURSE CONCERN -->
    <section id="course-concern" class="course-concern">
        <div class="container">

            <div class="message-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="message-sb">
                            <div class="message-sb-title">
                                <h4>Inbox</h4>
                                <a href="#" class="new-message"><i class="icon md-plus"></i>New message</a>
                            </div>
                                   <ul class="list-message">

                                <?php
                                     $sql1="SELECT * FROM message  order by msg_id DESC"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         while($row1=mysqli_fetch_assoc($result1)) { 
                                            $id=$row1['msg_sender'];
                                            $iid=$row1['msg_id'];
                                 ?>
                                <li class="ac-new" id="msg<?php echo $iid?>" data-rowid="<?php echo $iid ?>" >
                                    <a id="color<?php echo $iid?>" class="color">
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
                                            <div   class="<?php  if ($row1["view"]==0) { echo "author" ;}else{echo "black" ;} ?>">
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
                                                <span id="j<?php echo $iid?>"><?php echo $sender ?></span>
                                                
                                              <?php if ($row1["view"]==0) {?>  <div class="div-x" id="p<?php echo $iid?>"></div>  <?php }?> 
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
                        </div>
                    </div>
                     <?php
                                     $sql1="SELECT * FROM message  order by msg_id ASC"; 
                                    $result1=mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($result1))
                                    {   
                                         while($row1=mysqli_fetch_assoc($result1)) { 
                                            $id=$row1['msg_sender'];
                                            $iid=$row1['msg_id'];
                                 ?>
                    <div class="msg col-md-8" style="display: none" id="a<?php echo $iid ?>">
                        <div class="message-ct">
                            <div class="author">
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
                                <div class="<?php  if ($row1["State"]==0) { echo "author" ;}else{echo "black" ;} ?>">
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
                                                
                                              <?php if ($row1["State"]==0) {?>  <div class="div-x"></div>  <?php }?> 
                                            </div>
                                <em>
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
                                            </em>
                            </div>
                            <p><?php echo $row1["msg_text"]; ?></p>
                            <a href="#" class="download-ind">
                                <i class="icon md-paperclip"></i>
                                toanna.zip (12mb)
                            </a>
                            <div class="text-form-editor">
                                <img src="images/editor-demo-1.jpg" alt="">
                                <textarea placeholder="Discussion content"></textarea>
                            </div>
                            <div class="form-action">
                                <input type="submit" value="Send message" class="send mc-btn-3 btn-style-1">
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
            <script >

                $("[id=msg<?php echo $iid?>]").click(function(event){
                   
                $(".color").css("background-color","white ");
            

                $(".msg").hide();
                $("[id=a<?php echo $iid?>]").slideDown();
                 $("[id=color<?php echo $iid?>]").css("background-color","#CEECF5");
                       event.preventDefault();
                             var id = $(this).data("rowid");
                                        $.ajax({

                                            url: "viewmsg.php",
                                            type: "POST",
                                            data: {
                                            operation: "Update",
                                            id: id
                                            },

                                            success: function(response){
                                            $("[id=p<?php echo $iid?>]").hide();
                                            $("[id=msg<?php echo $iid?>]").css("background-color","white");
                                            $('[id=j<?php echo $iid?>]').css("color","gray");
                                            
                                            },
                                                       
                                            });
            });
            </script>
                    <?php }}?>
                </div>
            </div>
        </div>
    </section>
    <!-- END / COURSE CONCERN -->


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



        <script src="js/uikit-icons.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 

       
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
         <script src="js/uikit-icons.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
<script src="js/jquery.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<script>

            $(document).on("click", "button#remove", function(event) {
                event.preventDefault();
                var id = $(this).data("rowid");
                var row = $(this).closest("tr");  

                $.ajax({
                   url: "deletemember.php",
                   type: "POST",
                   data: {
                      operation: "slideUp",
                      id: id
                   },
                   success: function(response){
                      row.slideUp("slow");
                   },
                   error: function (response) {
                      console.log("Something went wrong");
                   }
                });
              
            });
   
            jQuery('#demo-position button.demo').on('click', function(){
            UIkit.notification($(this).data());
            });
        </script>
     
                    <script>
                        document.getElementById('nbbb').innerHTML=$("ul li#msg").length;
                         $("[id=cl]").click(function(event){
                            event.preventDefault();
                            var id = "1";
                                        $.ajax({

                                            url: "updatemsg.php",
                                            type: "POST",
                                            data: {
                                            operation: "Update",
                                            id: id
                                            },

                                            success: function(response){
                                                $("[id=cl1]").slideUp();
                                            },
                                                       
                                            });
                         

                        });
                    </script>
         <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
            <script >
                  $("[id=a<?php echo $iid?>]").show();
                  $("[id=msg<?php echo $iid?>]").click();
                  $("[id=p<?php echo $iid?>]").hide();
                    $("[id=msg<?php echo $iid?>]").css("background-color","white");
                    $('[id=j<?php echo $iid?>]').css("color","gray");
            </script>
        