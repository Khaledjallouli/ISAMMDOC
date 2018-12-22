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
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <link rel="stylesheet" type="text/css" href="css/library/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/md-font.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
        <link rel="stylesheet" href="../multiple-select.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link href="jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery.lwMultiSelect.js"></script>
        <link rel="stylesheet" href="dist/fastselect.min.css">
        <script src="dist/fastselect.standalone.js"></script>
           <link rel="icon" type="image/png" href="images/isamm1.png" />

        <title>Attendance Letter</title>
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
                    <div class="logo"><a href="index.php"><img src="images/isamm.png" alt=""></a></div>

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
                            <li class='menu-item-has-children'>
                                <a href='events.php'>Events</a>
                                 <ul class='sub-menu'>
                                    <li><a href='newevent.php'>New event</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class='menu'>
                           <li class='menu-item-has-children current-menu-item'>
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
                           <li class='menu-item-has-children current-menu-item'>
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
                           <li class='menu-item-has-children current-menu-item'>
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
                                                                                 $grp =$row1["m_groupnb"];

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
                                echo $_SESSION["m_level"]." ".$_SESSION["m_cat"]." ".$grp; 
                                   

                                                  
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

            <!-- BODY -->

        <section id="create-course-section" class="create-course-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="create-course-sidebar">
                         <ul class="list-bar">
                         <?php if ($_SESSION["m_role"] == 'Student') { ?>
                            <li class="active"><span class="count"><img src="images/add1.png" width="15px"></span>Attendence Letter </li>
                            <?php }
                           
                           else if ($_SESSION["m_role"] == 'Instructor' || $_SESSION["m_role"] == 'Administrator' ){
                            if ($_SESSION["m_role"] == 'Instructor') {

                                 $p="SELECT  * FROM attendance_letter where (($_SESSION[m_nId]=supervisor1_id AND s_sup1=0 ) OR ($_SESSION[m_nId]=supervisor2_id AND s_sup2=0 )) and State=0"  ;}

                            else if ($_SESSION["m_role"] == 'Administrator'){
                               $p="SELECT  * FROM attendance_letter where  s_sup1=1  AND s_sup2=1  and State=0"  ;
                             }  

                            $po_=mysqli_query($conn,$p);
                            $kk=mysqli_num_rows($po_); 
                            if (mysqli_num_rows($po_)!=0 && mysqli_num_rows($po_)> 1) { ?>
                             <li id="r" class="active"><span class="count"><?php echo $kk?></span></span>Requests </li>
                             <?php }?>
                                   <?php if (mysqli_num_rows($po_)==1) { ?>
                             <li id="r" class="active"><span class="count"><?php echo $kk?></span></span>Request </li>
                             <?php }?>

                         <?php if (mysqli_num_rows($po_)==0){?> 
                          <li id="r" class="active"><span class="count"> 0</span></span>Request</li>
                          <?php }?>
                        <?php }?>

                          
                            
                            
                        </ul>
                         
                    </div>
                </div>
                    <?php if ($_SESSION["m_role"] == 'Student') { ?>
                             
                            
                <div class="col-md-9">
                    <div class="create-course-content">
                    <?php  if ($_SESSION["m_role"] == 'Student'){ 
                         $poster="SELECT * FROM attendance_letter where requester_id =$_SESSION[m_nId] and State=0" ;
                            $pos=mysqli_query($conn,$poster);
                            $kk=mysqli_num_rows($pos);
                                if(mysqli_num_rows($pos))
                                {
                                $rows=mysqli_fetch_assoc($pos);
                            $sp1=$rows['supervisor1_id'];
                            $sp2=$rows['supervisor2_id'];


                    ?>
                    <?php  if ($rows['s_sup1'] ==0 || $rows['s_sup2'] ==0 ) { ?>
                    <span class="gris" " >Your request not delevred yet , your professor must accept the request .</span><br><br>
                    <?php } ?>
                    <div>Instructor 1 :<span class="gris" ><?php
                        $poss="SELECT * FROM member where m_nId =$sp1" ;
                            $p=mysqli_query($conn,$poss);
                                mysqli_num_rows($p);
                                $row2=mysqli_fetch_assoc($p);
                                $sp_1=$row2['m_fName'].' '.$row2['m_lName'];
                                echo $sp_1 ;
                    ?></span>
                    <?php 
                    if ($rows['s_sup1'] ==1 ) {
                       echo "<img width='35px' src='images/ins.gif' />";
                    }
                        else{
                        echo "<img width='35px' src='images/ins1.gif' />";
                        }
                    ?> 
                    </div>


                    <div>Instructor 2 :<span class="gris"><?php 
                    $po="SELECT * FROM member where m_nId =$sp2" ;
                            $pos=mysqli_query($conn,$po);
                                mysqli_num_rows($pos);
                                $row1=mysqli_fetch_assoc($pos);
                                $sp_2=$row1['m_fName'].' '.$row1['m_lName'];
                                echo $sp_2 ;
                    ?></span>
                    <?php 
                        if ($rows['s_sup2'] ==1 ) {
                       echo "<img width='35px' src='images/ins.gif' />";
                    }
                        else{
                        echo "<img width='35px' src='images/ins1.gif' />";
                        }  
                    ?>
                    </div>
                    <?php  if ($rows['s_sup1'] ==1 && $rows['s_sup2'] ==1 ) { ?>
                    <br>
                    <span class="gris" style="color:green">Your request is delevred to administration,  .</span><br><br>
                    <?php } ?>
                    <?php } else{?>
                    <span class="gris" style="display: none" id="req">Your request not delevred yet , your professor must accept the request .</span><br><br>
                    <div  id="ii1" style="display: none">Instructor 1 :<span class="gris"  id="i1"></span><img width='35px' src='images/ins1.gif' /></div>
                    <div  id="ii2" style="display: none">Instructor 2 :<span class="gris"  id="i2"></span><img width='35px' src='images/ins1.gif' /></div>
            
                    <form method="POST" action="saveattendletter.php" enctype="multipart/form-data" id='form'  class="ajax">
                        <!-- COURSE BANNER -->


                        <!-- DESCRIPTION -->
                        <div class="description create-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 id='cd'>Reason :</h4>
                                </div>
                        
                                 <div class="col-lg-3">
                                    <div class="form-item" id=dc>
                                        <select class="form-control" name="d_type" id="docetype" onchange="return showprov();">
                                            <option value=""></option>
                                            <option value="Passeport">Passeport</option>
                                            <option value="National ID">National ID</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-lg-9" style="display: none;" id="oth">
                                    <textarea class="form-control" rows="3" id="hh" name="c_description" placeholder="Description" ></textarea>
                                    
                                    <br><br>
                                </div>
                              <i style="cursor:pointer;color:#139DF0;display: none" title="Swich" id="Swich1" class="material-icons">autorenew</i>
                                   
                           
                             <br><br><br><br>
                                <span class="gris" id="1s" style="display: none;color:#139DF0">Choose the 1st Instructor :</span>
                                <span class="gris" id="2s" style="display: none;color:#139DF0">Choose the 2st Instructor :</span>
                                <span class="gris" id="1ss" style="display: none;color:#139DF0">Change the 1st  Instructor :</span>
                                <span class="gris" id="2ss" style="display: none;color:#139DF0">Change the 2st Instructor :</span>
                                <br><br>
                                <div id="select" style="display: none">
                                <select class="singleSelect" name="language" id="myselect" onchange="sel()">
                             <?php
                                        $sql="SELECT * FROM member where m_role='Instructor' "; 
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result))
                                        { 
                                            while($row=mysqli_fetch_assoc($result))
                                            { 
                                                $id=$row["m_nId"];
                                                $mail=$row["m_email"];
                                                $ph=$row["m_phNumber"];
                                                $name=$row["m_fName"].' '.$row["m_lName"]; ?>       

                                        <option  value="<?php echo $mail ;?>" id="<?php echo $id ;?> " data-rowid="<?php echo $ph ;?>">
                                          <?php echo $name ;?> 
                                          
                                        </option> 
                                       
                                        <?php }} ?>

                                </select>
                                </div>
                                <div id="select1" style="display: none">
                                 <select class="singleSelect" name="language" id="myselect1" onchange="sell()" >
                             <?php
                                        $sql="SELECT * FROM member where m_role='Instructor' "; 
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result))
                                        { 
                                            while($row=mysqli_fetch_assoc($result))
                                            { 
                                                $id=$row["m_nId"];
                                                $mail=$row["m_email"];
                                                $ph=$row["m_phNumber"];
                                                $name=$row["m_fName"].' '.$row["m_lName"]; ?>       

                                        <option  value="<?php echo $mail ;?>" id="<?php echo $id ;?> " data-rowid="<?php echo $ph ;?>">
                                          <?php echo $name ;?> 
                                          
                                        </option> 
                                       
                                        <?php }} ?>

                                </select>
                                </div>
                                <div id="select2" style="display: none">
                                 <select class="singleSelect" name="language" id="myselect2" onchange="selll()" >
                                    <?php
                                        $sql="SELECT * FROM member where m_role='Instructor' "; 
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result))
                                        { 
                                            while($row=mysqli_fetch_assoc($result))
                                            { 
                                                $id=$row["m_nId"];
                                                $mail=$row["m_email"];
                                                $ph=$row["m_phNumber"];
                                                $name=$row["m_fName"].' '.$row["m_lName"]; ?>       

                                        <option  value="<?php echo $mail ;?>" id="<?php echo $id ;?> " data-rowid="<?php echo $ph ;?>">
                                          <?php echo $name ;?> 
                                          
                                        </option> 
                                       
                                    <?php }} ?>

                                </select>

                            </div><br><br>
                        
                        <span class="gris" style="font-size: 20px;display: none" id="ins">Instructors :</span>
                               <table class="mc-table" id='table'>
                                <thead id=th  style="display: none">
                                    <tr  id='tr'>
                                        <th class="info-author" colspan="1"><span class="gris"></span></th>
                                        <th class="info-author"><span class="gris">Full name</span></th>
                                        <th class="submission"><span class="gris">e-mail</span></th>   
                                        <th class="submissions"><span class="gris">Phone </span></th>
                                       
                                    </tr>
                                </thead> 

                                <tbody>
                          
                                </tbody>
                            </table>
                     
                  
                 
                                <div class="form-submit-1" id="Create" style="display: none">
                                    <input type="submit" value="Create" id="sub" class="mc-btn btn-style-1 demo"  data-message="<div style='text-align:center'><span style='color:green' uk-icon='icon: check'></span>&ensp;&ensp;Request has benn sendes successfully</div>">
                                </div>
                            </div>
                        </div>
                   </form>
                                
                       
                       <script>
                       jQuery('#sub').on('click', function() {
                            UIkit.notification($(this).data());
                        });
                            $('.singleSelect').fastselect();

                             function sel(){
                                if($("#table tbody tr").length == 0) 
                                {
                                    $("[id=th]").show();
                                    $("[id=ins]").show();
                                var I1=$("#myselect option:selected ").attr("id");
                                $("#table tbody ").prepend('<tr id="tr"><td class="info-author" class="info-author" id="td1">1<input type="text" name="ins1" id="ins1"  value="'+I1+'"  style="display:none"></td><td class="info-author" class="submission"  id="a"></td><td class="submission"  id="b"></td><td class="submission" id="c"></td><td id="s1" style="display:none"><i style="cursor:pointer;color:#139DF0" title="Swich" class="material-icons">autorenew</i></td><tr>'); 
                               
                               
                                document.getElementById('a').innerHTML=$("#myselect option:selected ").text();
                                 document.getElementById('b').innerHTML=$("#myselect option:selected ").val();
                                 document.getElementById('c').innerHTML=$("#myselect option:selected ").data("rowid");
                                $("[id=1s]").hide();
                                $("[id=2s]").slideDown();
                                 }
                                 else 
                                 {
                                    var I2=$("#myselect option:selected ").attr("id");
                                     $("#table tbody ").append('<tr id="tr"><td class="info-author" class="info-author" id="td2">2<input type="text" name="ins2" id="ins2" value="'+I2+'" style="display: none"></td><td class="info-author" class="submission"  id="d"></td><td class="submission"  id="e"></td><td class="submission" id="f"></td><td id="s2"  style="display:none"><i style="cursor:pointer;color:#139DF0" title="Swich" class="material-icons">autorenew</i></td><tr>'); 
                              
                                document.getElementById('d').innerHTML=$("#myselect option:selected ").text();
                                 document.getElementById('e').innerHTML=$("#myselect option:selected ").val();
                                 document.getElementById('f').innerHTML=$("#myselect option:selected ").data("rowid");
                                 $("[id=select]").slideUp("slow");
                                 $("[id=Create]").slideDown();
                                 $("[id=1s]").hide();
                                $("[id=2s]").hide();
                                 $("[id=s1]").show();
                                  $("[id=s2]").show();
                                 }
                               $("[id=s1]").click(function(){
                                document.getElementById('a').innerHTML='';
                                document.getElementById('b').innerHTML='';
                                document.getElementById('c').innerHTML='';

                                $("[id=select]").hide();
                                $("[id=select2]").hide();
                                $("[id=select1]").show();
                                $("[id=Create]").hide();
                                $("[id=ins1]").remove();
                                $("[id=1ss]").slideDown();
                               });
                                  $("[id=s2]").click(function(){
                                document.getElementById('d').innerHTML='';
                                 document.getElementById('e').innerHTML='';
                                 document.getElementById('f').innerHTML='';
                                $("[id=select]").hide();
                                $("[id=select1]").hide();
                                $("[id=select2]").show();
                                $("[id=ins2]").remove();
                                $("[id=2ss]").slideDown();
                               });
                                  
                                }

                            function sell(){
                                var I1=$("#myselect1 option:selected ").attr("id");
                                    $("#td1").append('<input type="text" name="ins1" id="ins1" value="'+I1+'" style="display: none">'); 
                                    document.getElementById('a').innerHTML=$("#myselect1 option:selected ").text();
                                    document.getElementById('b').innerHTML=$("#myselect1 option:selected ").val();
                                    document.getElementById('c').innerHTML=$("#myselect1 option:selected ").data("rowid");
                                    $("[id=select1]").hide();
                                    $("[id=select2]").hide();
                                    $("[id=select]").show();
                                    if($("#d").length) {
                                       $("[id=Create]").slideDown();
                                    $("[id=select]").slideUp("slow");
                                    $("[id=1ss]").slideUp();
                                    }
                                    
                             }
                              function selll(){
                                var I2=$("#myselect2 option:selected ").attr("id");
                                     $("#td2").append('<input type="text" name="ins2" id="ins2" value="'+I2+'" style="display: none">'); 
                                    document.getElementById('d').innerHTML=$("#myselect2 option:selected ").text();
                                    document.getElementById('e').innerHTML=$("#myselect2 option:selected ").val();
                                    document.getElementById('f').innerHTML=$("#myselect2 option:selected ").data("rowid");
                                    $("[id=select1]").hide();
                                    $("[id=select2]").hide();
                                    $("[id=select]").hide();
                                    $("[id=Create]").slideDown();
                                    $("[id=2ss]").slideUp();
                             }
                              function showprov(){
                                
                                var selectBox =$("#docetype option:selected ").text();
                                if (selectBox=='Other') {
                                    $("[id=oth]").slideDown();
                                     $("[id=dc]").slideUp();
                                     $("[id=Swich1]").show();
                                     $("[id=select]").slideDown();
                                     $("[id=1s]").slideDown();
                                } 
                                else {
                                   $("[id=oth]").slideUp();
                                    $("[id=dc]").slideDown();
                                    $("[id=Swich1]").hide();
                                    $("[id=select]").slideDown();
                                    $("[id=1s]").slideDown();

                                }
                                return false ;

                            }
                               
                              $("[id=Swich1]").click(function(){
                                $("[id=Swich1]").slideUp();
                                $("[id=dc]").slideDown();
                                 $("[id=oth]").slideUp();
                                 
                               });

                              $("[id=sub]").click(function(){
                                $("[id=form]").slideUp();
                                $("[id=req]").slideDown();
                                $("[id=ii1]").slideDown();
                                $("[id=ii2]").slideDown();
                                document.getElementById('i1').innerHTML=$("[id=a]").text();
                                document.getElementById('i2').innerHTML=$("[id=d]").text();
                               });
                        </script>
                           


                    </div>
                </div>

                 <?php } } } 
                 if ($_SESSION["m_role"] == 'Instructor'){   ?>
               


               <?php $sql="SELECT  * FROM attendance_letter where (($_SESSION[m_nId]=supervisor1_id AND s_sup1=0 ) OR ($_SESSION[m_nId]=supervisor2_id AND s_sup2=0 )) and State=0" ;
                            $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result))
                                {   ?>
                            <form method="POST" action="accept_att.php" enctype="multipart/form-data"  id="form1">
                             <table class="mc-table" id='table'>
                                <thead id=th >
                                    <tr  id='tr'>
                                        <th class="info-author"><span class="gris">Student name</span></th>
                                        <th class="submission"><span class="gris">Level</span></th>   
                                        <th class="submissions"><span class="gris">Category </span></th>
                                        <th class="submissions"><span class="gris">Accept </span></th>
                                    </tr>
                                </thead> 
                                   <?php  
                                   while($row=mysqli_fetch_assoc($result)) 
                                    { 
                                        $req=$row['requester_id'];
                                        $id=$row['att_letter_id'];
                             
                                            $po="SELECT * FROM member where m_nId =$req" ;
                                            $pos=mysqli_query($conn,$po);
                                                 if(mysqli_num_rows($pos))
                                                 {
                                                    while($row1=mysqli_fetch_assoc($pos))
                                                   {    
                                                        $rq=$row1['m_fName'].' '.$row1['m_lName'];
                                                        $lev=$row1['m_level'];
                                                        $cat=$row1['m_cat'];
                                        ?>
                             
                                    <tr id="int">
                                        <td class="info-author"><?php echo $rq ?><input type="hidden" name="id[]" value="<?php echo $id ?>"></td>
                                        <td class="submission"><?php echo $lev ?></td>
                                        <td class="submission"><?php echo $cat ?></td>
                                        <td class="submission">

                                             <div class="form-item form-checkbox checkbox-style" id="<?php echo $id?>">
                                                <input type="checkbox" id="sup<?php echo $id?>" value="1" name="sup[]" >
                                                <label for="sup<?php echo $id?>">
                                                    <i id="<?php echo $id?>" class="icon-checkbox icon md-check-2" type="checkbox" ></i>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                              
                                 <?php }}}?>
                            </table><br><br>
                            <div class="form-submit-1 col-md-2 pull-right" >
                                    <input type="submit" name="submit" value="Ok" class="mc-btn btn-style-1"  >
                                </div>
                            </form>

                 <?php }else {?>
           
                   <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                            You don't have any Request
                            
                              </td>
                           
                              
                            </tr>  
 </table><br><br>

                    
                <?php }} ?>
                <script>
                        document.getElementById('nb').innerHTML=$("#table tbody tr#int").length;
                    </script>
                
                 <?php if ($_SESSION["m_role"] == 'Administrator'){  ?>
                 
               <?php $sql="SELECT  * FROM attendance_letter where  s_sup1=1  AND s_sup2=1  and State=0" ;
                            $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result))
                                {   ?>
                            <form method="POST" action="accept_adm.php" enctype="multipart/form-data"  id="form1">
                             <table class="mc-table" id='table'>
                                <thead id=th >
                                    <tr  id='tr'>
                                        <th class="info-author"><span class="gris">Student name</span></th>
                                        <th class="submission"><span class="gris">Level</span></th>   
                                        <th class="submissions"><span class="gris">Category </span></th>
                                        <th class="submissions"><span class="gris">Accept </span></th>
                                    </tr>
                                </thead> 
                                   <?php  
                                   while($row=mysqli_fetch_assoc($result)) 
                                    { 
                                        $req=$row['requester_id'];
                                        $id=$row['att_letter_id'];
                             
                                            $po="SELECT * FROM member where m_nId =$req" ;
                                            $pos=mysqli_query($conn,$po);
                                                 if(mysqli_num_rows($pos))
                                                 {
                                                    while($row1=mysqli_fetch_assoc($pos))
                                                   {    
                                                        $rq=$row1['m_fName'].' '.$row1['m_lName'];
                                                        $lev=$row1['m_level'];
                                                        $cat=$row1['m_cat'];
                                        ?>
                             
                                    <tr id="adm">
                                        <td class="info-author"><?php echo $rq ?><input type="hidden" name="id[]" value="<?php echo $id ?>"></td>
                                        <td class="submission"><?php echo $lev ?></td>
                                        <td class="submission"><?php echo $cat ?></td>
                                        <td class="submission">

                                             <div class="form-item form-checkbox checkbox-style" id="<?php echo $id?>">
                                                <input type="checkbox" id="acc<?php echo $id?>" value="1" name="acc[]" >
                                                <label for="acc<?php echo $id?>">
                                                    <i id="<?php echo $id?>" class="icon-checkbox icon md-check-2" type="checkbox" ></i>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                              
                                 <?php }}}?>
                            </table><br><br>
                            <div class="form-submit-1 col-md-2 pull-right" >
                                    <input type="submit" name="submit" value="Ok" class="mc-btn btn-style-1"  >
                                </div>
                            </form>

                 <?php }else {?>
           
                   <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                            You don't have any Request
                            
                              </td>
                           
                              
                            </tr>  
 </table><br><br>
                   

                 <?php } }?>
                  <script>
                        document.getElementById('nb1').innerHTML=$("#table tbody tr#adm").length;
                    </script>
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
<script src="js/uikit-icons.min.js"></script>
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