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
    <link rel="stylesheet" type="text/css" href="css/library/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/library/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/md-font.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
         <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="icon" type="image/png" href="images/isamm1.png" />

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Courses</title>
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

                        <ul class='menu'>
                            <li class='menu-item'>
                                <a href='listm.php'>Members</a>
                                  <ul class='sub-menu'>
                                    <li><a href='newmember.php'>New Member</a></li>
                                </ul>
                            </li>
                           
                        </ul>

                        <ul class="menu">
                            <li class="menu-item-has-children current-menu-item">
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
                        if ($_SESSION["m_role"]=='Instructor'){  $mniid =  $_SESSION["m_nId"]?>


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
                            <li class="menu-item-has-children current-menu-item">
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



                        <?php  } ?> 
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
    <!-- END / PAGE CONTROL -->
                    

 <section id="quizz-intro-section" class="quizz-intro-section learn-section">
        <div class="container">
            <div class="title-ct">
                <h3><strong>Courses List</strong></h3>
            </div>

            <div class="table-student-submission">

                <?php

                if ($_SESSION["m_role"]=='Administrator' ) {  
                    $sql="SELECT * FROM course order by c_level, c_cat"; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        { ?>

                <table class="mc-table">
                    <thead>
                        <tr>
                            <th class="submissions">Course Full Name</th>
                            <th class="score">COF <span class="caret"></span></th>
                            <th class="score">Credit <span class="caret"></span></th>
                            <th class="score">Level <span class="caret"></span></th>
                            <th class="author">Category <span class="caret"></span></th>
                           
                        </tr>
                    </thead>
                            <?php  while($row=mysqli_fetch_assoc($result))
                                { $timely=$row["c_id"];
                       
                                 
                            ?>

                    <tbody>
                        <tr class="new" >
                           <td class="submissions" >
                              
                                    <img src="images/courses3.png" width="40px" height="40px">&ensp;&ensp;
                                        <span style="color: black"><?php echo $row["c_fullname"] ?></span>
                                
                            </td>

                            <td class="score"><?php echo $row["c_credit"] ?></td>
                            <td class="score"><?php echo $row["c_level"] ?></td>
                            <td class="author"> <?php echo $row["c_cat"] ?></td>
                            <td class="rep">
                                <a href=<?php echo "updatecourse.php?c_id=".$timely?>  title="edit">
                                    <i class="fa fa-edit" style="font-size:20px; color:#139DF0" ></i>
                                </a> 
                            </td> 
                           
                            <td class="repl"> 

    <div uk-toggle="target: #offcanvas-flip<?php echo $timely ?>" id="y"> <i class="icon md-recycle" style="font-size:15px; color:#139DF0;cursor: pointer" ></i></div>
    <div class="uk-offcanvas-content"  >
        <div id="offcanvas-flip<?php echo $timely ?>" uk-offcanvas="flip: true; overlay: true"  >
            <div class="uk-offcanvas-bar" style="margin-top:15%;height: 130px;width: 400px;right:35%;border-radius: 5px;background-color: #eee;text-align:center" id="demo-position" uk-margin> 
                <span class="black">Are you sure you want to delete this Cours?</span><br>
                         
        <button class="uk-button uk-button-default uk-offcanvas-close uk-margin" style="color:gray;border-color: gray;border-radius: 5px"  type="button">Cancel</button> 
        <button id="remove"  data-rowid="<?php echo $timely ?>" class="uk-button uk-button-default uk-offcanvas-close uk-margin demo" data-message="<div style='text-align:center'><span style='color:green' uk-icon='icon: check'></span>&ensp;&ensp;successfully Deleted</div>" data-pos="top-center" style="background-color:#175690;border-radius: 5px"  type="button">
                                        Delete
                                </button>    
                            
            </div>
        </div>
    </div>

                            </td>


                        <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                        <script src="js/main.js"></script>
                        <script src="jquery/jquery.js"></script>
                        <script src="jquery/jquery.form.min.js"></script>


                        
                            <?php   
                                 } 

                        }
                            else 
                                {
                                     echo "You had no course";
                                }

}

                          if ($_SESSION["m_role"]=='Instructor' ) { ?>
                            <div class="page-info">

                       
                        <button type="button" class="btn btn-info btn-style-3" onclick="javascript:window.location='coursessetting.php';"><i class="icon md-config"></i>&ensp;Courses Setting</button>


               

                                              

                            <?php
                            $sql1="SELECT *from course where c_id IN (select distinct c_id from member_course where m_nId=$_SESSION[m_nId] )   ";
                         
                                $resu=mysqli_query($conn,$sql1);
                                if(mysqli_num_rows($resu))
                                { 

                                    
                            ?>

                            <table class="mc-table">
                                <thead>
                                    <tr>
                                        <th class="submissions">Course Full Name</th>
                                        <th class="score" colspan="1">Credit <span class="caret"></span></th>
                                       
                            <th class="score">COF <span class="caret"></span></th>
                                        <th class="score" colspan="1">Level <span class="caret"></span></th>
                                        <th class="author" colspan="1">Category <span class="caret"></span></th>
                                        <th class="author" colspan="3">Groups <span class="caret"></span></th>
                                    </tr>
                                </thead>
                                <?php  
                                    while($row=mysqli_fetch_assoc($resu))
                                    { 
                                        $timely=$row["c_id"];
                                ?>


                                <tbody>
                                    <tr >
                                        <td class="submissions" >
                                            <a href="<?php echo "coursedetails.php?c_id=".$timely."" ?>">
                                                <img src="images/courses3.png" width="40px" height="40px">&ensp;&ensp;
                                                <span style="color: black"><?php echo $row["c_fullname"] ?></span>
                                            </a>  
                                        </td>
                                         <td class="score" colspan="1"><?php echo $row["c_credit"] ?></td>
                                        <td class="score" colspan="1"><?php echo $row["c_level"] ?></td>
                                        <td class="author" colspan="1"> <?php echo $row["c_cat"] ?></td>
                                        <td class="author" colspan="3">

                                            <?php 
                                                $sqli="SELECT * FROM member_course where m_nId=$_SESSION[m_nId] and c_id='$timely' ORDER BY group_nb "; 
                                                    $resulti=mysqli_query($conn,$sqli);
                                                    if(mysqli_num_rows($resulti))
                                                    {   
                                                        while($rowi=mysqli_fetch_assoc($resulti))
                                                            {
                                                                $grp = $rowi["group_nb"];  
                                            ?>  
                                            <button type="button" ><?php echo $grp?></button>
                                            <?php }}?>
                                        </td>
                                        <td uk-toggle="target: #offcanvas-flip<?php echo $timely ?>" id="y"> <i id="edit" class="fa fa-edit" style="font-size:15px; color:#139DF0;cursor: pointer" ></i></td>
                                      
                                       <div class="uk-offcanvas-content"  >
                                        <div id="offcanvas-flip<?php echo $timely ?>" uk-offcanvas="flip: true; overlay: true"  >
                                            <div class="uk-offcanvas-bar" style="margin-top:120px;height: 130px;width: 400px;right:38%;border-radius: 25px;background-color: #eee"> 
                                           <div style="text-align: center">
                                            <?php 
                                                $sqli="SELECT * FROM member_course where m_nId=$_SESSION[m_nId] and c_id='$timely' ORDER BY group_nb "; 
                                                    $resulti=mysqli_query($conn,$sqli);
                                                    if(mysqli_num_rows($resulti))
                                                    {   ?> <?php
                                                        while($rowi=mysqli_fetch_assoc($resulti))
                                                            {
                                                                $grp = $rowi["group_nb"];  
                                            ?>  
                                        <button type="button" id="gr<?php echo $grp?>" style="color: black"><input type="text" id="chg1<?php echo $grp?>" name="chg" value="<?php echo $grp?>" style="display: none"><?php echo $grp?></button>
                                               
                                            <?php }?>

                                            </div>
                                            <div>
                                            <br>
                                            <?php for ($i=1; $i < 13; $i++) { 
                                           ?>  
                                        <button type="button" style="color: black" id="rg<?php echo $i?>" ><input type="text" id="chg<?php echo $grp?>" name="chg" value="<?php echo $i?>" style="display: none"><?php echo $i?></button>

                                                 
                                            <?php } }?> 
                                             
                       
                                            </div>
                                      

                                            

                                            </div>
                                        </div>
                                        </div>
                                    </tr>  
                                     
                                <?php } }  else { ?>
                                                 <br><br><table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                            Please select your teaching courses
                            
                              </td>
                           
                              
                            </tr>  
 </table><br><br>
                                           <?php }
                                        }?>
                                            
   <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
                                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                                            <script src="js/main.js"></script>
                                            <script src="jquery/jquery.js"></script>
                                            <script src="jquery/jquery.form.min.js"></script>
                                              <script>

                                            
                                               
                                             
                                                if ($("[id=chg<?php echo $grp?>]").text()==$("[id=chg1<?php echo $grp?>]").text())
                                                {
                                                    $("[id=rg<?php echo $grp?>]").hide();
                                                }
                                               
                                          
                                                            </script>    
                                        

                                        <?php if ($_SESSION["m_role"]=='Student') 
                                        { 
                                            $sql="SELECT * FROM course
                                            left JOIN member ON course.c_level = member.m_level and course.c_cat = member.m_cat where member.m_nId=$_SESSION[m_nId] "; 
                                            $result=mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($result))
                                            { 
                                ?>
                               
                <table class="mc-table">
                    <thead>
                        <tr>
                            <th class="submissions">Course Full Name</th>
                            <th class="score">Credit <span class="caret"></span></th>
                            <th class="score">Level <span class="caret"></span></th>
                            <th class="author">Category <span class="caret"></span></th>
                            <th class="author" ><span>Attendence</span></th>
                        </tr>
                    </thead>
                        <?php  while($row=mysqli_fetch_assoc($result))
                            { $timely=$row["c_id"];
                        ?>

                    <tbody>
                        <tr >
                            <td class="submissions">
                                <a href="<?php echo "coursedetails.php?c_id=".$timely."" ?>">
                                    <img src="images/courses3.png" width="40px" height="40px">&ensp;&ensp;
                                        <?php echo $row["c_fullname"] ?>
                                </a>  
                            </td>
                             <td class="score"><?php echo $row["c_credit"] ?></td>
                            <td class="score"><?php echo $row["c_level"] ?></td>
                            <td class="author"> <?php echo $row["c_cat"] ?></td>
                            <td class="latest-reply col-md-1 " colspan="2">
                    <?php 
                        
                        $sq = "SELECT count(*) as total from attendance WHERE  c_id= '$timely' and m_nId='$_SESSION[m_nId]' ";
                        $resu=mysqli_query($conn,$sq);
                        mysqli_num_rows($resu);
                        $r=mysqli_fetch_assoc($resu);
                    
                        $j=$row['c_totalabsence']-$r['total'];
                        for ($i=0; $i < $r['total']; $i++) { 
                            if ($row['c_totalabsence']==$r['total']){
                                echo '  <span style="left:200px"><i class="material-icons " style="font-size:20px; color:red">close</i></span>';
                            }
                            else if ($r['total']<=($row['c_totalabsence']/2)) {
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
                             if ($row['c_totalabsence']<=$r['total']) {
                            echo '  <span  style="color:gray">Eliminated</span>';
                        }
                        ?>
                        </td>
                      
                                        

                            <?php   
                                 } 

                        }
                           else
                                {
                                     echo "You had no course";
                                }


}
                              mysqli_close($conn);
                            ?>
                        </tr>

                      
                    </tbody>
                </table>
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
                   url: "deletecourse.php",
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
 <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
         
</body>
</html>