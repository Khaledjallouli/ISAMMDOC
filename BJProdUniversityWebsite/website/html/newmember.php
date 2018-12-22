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
   <link rel="icon" type="image/png" href="images/isamm1.png" />

          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
   <style type="text/css"> a:hover { text-decoration: none; }
    </style>
    <title>Add New Member</title>
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
                    <div class="logo"><a href="index.php"><img src="images/isamm1.png" alt=""></a></div>

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
                            <li class='menu-item current-menu-item'>
                                <a href='listm.php'>Members</a>
                                  <ul class='sub-menu'>
                                    <li class='menu-item current-menu-item' ><a href='newmember.php'>New Member</a></li>
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
                        if ($_SESSION["m_role"]=='Instructor'){ $mniid =  $_SESSION["m_nId"]?>


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

            <!-- END / HEADER -->
    <!-- CREATE COURSE CONTENT -->
     <section id="create-course-section" class="create-course-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="create-course-sidebar">
                            <ul class="list-bar">
                                <li class="active"><span class="count"><img src="images/add1.png" width="12px"></span>Add new Member</li>
                              
                            </ul>
                         
                        </div>
                    </div>

                <div class="col-md-9">
                    <div class="create-course-content">
                    <form id="loginForm" method="post" action="save.php">
                        <!-- COURSE BANNER -->
                        <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Member First name</h4>
                                </div>
                                <div class="col-lg-9">
                                     <div class="form-item">
                                         <input type="text" name="m_fName" placeholder="Member First Name" required>
                                     </div>
                                </div>
<br><br><br>
                                <div class="col-md-3">
                                    <h4>Member Last name</h4>
                                </div>
                                <div class="col-lg-9">
                                     <div class="form-item">
                                         <input type="text" name="m_lName" placeholder="Member Last Name" required>
                                     </div>
                                </div>                            </div>
                        </div>
         
                         <div class="course-banner create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Member National ID</h4>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-item">
                                      <input type="text" name ="m_nId" placeholder="Member National ID" >
                                    </div>
                                </div>
                            </div>
                            <br> 
                             <div class="row">
                                <div class="col-md-3">
                                    <h4>Member Registration Number</h4>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-item">
                                      <input type="text" name ="m_rn" placeholder="Member Registration Number" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END / COURSE BANNER -->
                          <div class="for-level-from create-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Gender </h4>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-item form-radio radio-style">
                                        <input type="radio" id="health" name ="m_gender" value="Male" >
                                        <label for="health">
                                            <i class="icon-radio"  style="float: left"></i>
                                          <span style="float: right;color:gray">Male</span>
                                        </label>
                                    </div>

                                    <div class="form-item form-radio radio-style">

                                        <input type="radio" id="social-science" name ="m_gender" value="Female">
                                        <label for="social-science">
                                            <i class="icon-radio" style="float: left"></i>
                                            <span style="float: right;color:gray">Female</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                                          <div class="course-banner create-item">
                                         <div class="row">
                                           <div class="form-item">
                                             <select class="form-control" name="m_role" id="docetype" onchange="select()" >
                                          <option value="">Role</option>
                                     <option value="Administrator">Administrator</option>
                                     <option value="Instructor">Instructor</option>
                                     <option value="Student">Student</option>
                                                 </select>
                                             </div>
                                        </div>
                                      
                                            <script>
                                                function select(){
                                                    var userInput =$("#docetype option:selected").text();
                                                    if (userInput=='Student') {
                                                        $("[id=duedate]").slideDown();
                                                    } 
                                                    else 
                                                    {
                                                         $("[id=duedate]").slideUp();
                                                    }
                                                }

                                        
                                        </script>
  </div>
                 
                        <!-- FOR LEVEL FROM -->
                        <div class="for-level-from create-item" id="duedate" style="display: none">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Level*  </h4>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-item form-radio radio-style">
                                        <input type="radio" id="beginer" value="1" name="m_level">
                                        <label for="beginer">
                                            <i class="icon-radio" style="float: left"></i>
                                            <span style="float: right;color:gray">1</span>
                                        </label>
                                    </div>

                                    <div class="form-item form-radio radio-style">

                                        <input type="radio" id="intermediate" value="2"  name="m_level" >
                                        <label for="intermediate">
                                            <i class="icon-radio" style="float: left"></i>
                                            <span style="float: right;color:gray">2</span>
                                        </label>
                                    </div>

                                         <div class="form-item form-radio radio-style">

                                        <input type="radio" id="final" value="3"  name="m_level" >
                                        <label for="final">
                                            <i class="icon-radio" style="float: left"></i>
                                            <span style="float: right;color:gray">3</span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>                            
                       <br><br> 
                        <!-- END / FOR LEVEL FROM -->

                    
                        <!-- CATEGORIES -->
                    
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Category*</h4>
                                </div>
                                <div class="col-md-9">
                                    <table class="table-categories">
                                        <tr>
                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="business" value="IM" name="m_cat">
                                                    <label for="business">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                        <span style="float: right;color:gray">IM</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="lifestyle" value="CM" name="m_cat">
                                                    <label for="lifestyle">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                       <span style="float: right;color:gray">CM</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="game" value="AV" name="m_cat">
                                                    <label for="game">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                       <span style="float: right;color:gray">AV</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="design" value="3D" name="m_cat">
                                                    <label for="design">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                       <span style="float: right;color:gray">3D</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="math-and-science" value="JV" name="m_cat">
                                                    <label for="math-and-science">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                       <span style="float: right;color:gray">JV</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="crafts-and-hobbies" value="Engineering" name="m_cat">
                                                    <label for="crafts-and-hobbies">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                        <span style="float: right;color:gray">Engineering</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="photography" value="Research Master" name="m_cat" >
                                                    <label for="photography">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                      <span style="float: right;color:gray">Research Master</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="education" value="Professional Master" name="m_cat" >
                                                    <label for="education">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                       <span style="float: right;color:gray">Professional Master</span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-item form-checkbox checkbox-style">
                                                    <input type="radio" id="music" value="Production Master" name="m_cat">
                                                    <label for="music">
                                                        <i class="icon-checkbox icon md-check-1" style="float: left"></i>
                                                        <span style="float: right;color:gray">Production Master</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                       
                                    </table>
                                </div>
                            </div> 
                            <br> <br> <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Group Number</h4>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-item">
                                      <input type="text" name ="m_groupnb" placeholder="Group Number" >
                                    </div>
                                </div>
                            </div>     
                            </div>
                        <div class="form-submit-1">
                                <input type="submit" value="Create" class="mc-btn btn-style-1">
                            </div>                      
                        
                      
                  
                           
                      
                    </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- END / CREATE COURSE CONTENT -->


        

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



<script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'en-BR'
      });
    </script>

   
            
          

   

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