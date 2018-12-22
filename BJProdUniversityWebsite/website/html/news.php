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
 
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
       <link rel="icon" type="image/png" href="images/isamm1.png" />


     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    

    <!-- Theme CSS -->
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/creative.min.css" rel="stylesheet">
      
    
        
        <title>News</title>
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
                            <li class='menu-item-has-children current-menu-item'>
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
                            <li class="menu-item-has-children ">
                                <a href='courses.php'>Courses</a>
                                 
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children current-menu-item'>
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
                            <li class="menu-item-has-children ">
                                <a href='courses.php'>Courses</a>
                        
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item-has-children current-menu-item'>
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
                    
              <!-- SUB BANNER -->
    <section class="sub-banner sub-banner-course">
        <div class="awe-static bg-sub-banner-course"></div>
        <div class="container">
            <div class="sub-banner-content">
                <h2 class="text-center">NEWS</h2>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->



 <section class="page-control">
        <div class="container">
            <div class="page-info">
                 <a href="newannouncement.php">
                    <i class="icon md-arrow-right"></i>Add new announcement 
                </a>      
            </div>
           
        </div>
    </section>


    <!-- BLOG -->
    <section class="blog">

        <div class="container">
         <!-- SIDEBAR --> <?php 

            
            $sqli="SELECT * FROM member where m_nId=$_SESSION[m_nId]"; 
            $resulti=mysqli_query($conn,$sqli);
                              if(mysqli_num_rows($resulti))
                                {   
                                    while($rowi=mysqli_fetch_assoc($resulti))
                                    {
                                        $level=$rowi["m_level"];
                                        $cat=$rowi["m_cat"];
                               
        ?>
                <div class="col-md-3 col-md-offset-1 pull-right" style="display: inline;">
                    <aside class="blog-sidebar">

                        <!-- WIDGET SEARCH -->
                         <div class="widget widget_categories" style="margin-bottom: 0px">
                        <?php 
                            if ($_SESSION["m_role"] == 'Student') {
                               
                            
                        ?>
                            <h4 class="sm">Upcoming events</h4>
                            
                            <?php 

                                $sql="SELECT * FROM doc where d_type ='HomeWork Announcment' 
                                and c_id in (SELECT c_id from course where c_level='$level' and c_cat='$cat')  and d_id NOT IN(SELECT d_id from sub_doc) 
                                 order by d_id desc "; 
                              $result1=mysqli_query($conn,$sql);
                              $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result1))
                                {   $row1=mysqli_fetch_assoc($result1);
                                        $time=$row1["d_sdl"];
                                         date_default_timezone_set('Europe/Istanbul');
                                        $dt = new DateTime($time);

                                        date_default_timezone_set('Europe/Istanbul');
                                        $date = new DateTime(date('y-m-d h:i:s a'));

                                        if ($dt>$date) { ?>
                                    <h5 class="black">Homeworks</h5>
                                    <?php
                                    while($row=mysqli_fetch_assoc($result))
                                    {



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
                                                        
                                                        echo '<span style="color:green">'.$week.' Weeks remaining</span>';
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
                                 <br>
                                <span class="black" style="font-size: 10px; margin-left: 26px"> [<?php echo $ism?>] </span>
                               <br>
                             <?php }}}
                                $sql="SELECT * FROM doc where d_type ='Project Announcment' 
                                and c_id in (SELECT c_id from course where c_level='$level' and c_cat='$cat')  and d_id NOT IN(SELECT d_id from sub_doc) 
                                 order by d_id desc "; 
                              $result1=mysqli_query($conn,$sql);
                              $result=mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result1))
                                {   $row1=mysqli_fetch_assoc($result1);
                                        $time=$row1["d_sdl"];
                                         date_default_timezone_set('Europe/Istanbul');
                                        $dt = new DateTime($time);

                                        date_default_timezone_set('Europe/Istanbul');
                                        $date = new DateTime(date('y-m-d h:i:s a'));

                                        if ($dt>$date) { ?>
                                    <h5 class="black">Projects</h5>
                                    <?php
                                    while($row=mysqli_fetch_assoc($result))
                                    {



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
                             
                                    
                             <?php }}}}}} 
                            if ($_SESSION["m_role"] == 'Instructor') { ?>
                                 <h4 class="sm">Requests</h4> 
                                 <h5 class="black">Events</h5>
                                 <h5 class="black">Attendence Letters</h5>
                              <?php } 
                               if ($_SESSION["m_role"] == 'Administrator') { ?>
                                 <h4 class="sm">Requests</h4> 
                                 <h5 class="black">Events</h5>
                                 <h5 class="black">Attendence Letters</h5>
                              <?php } ?>
                        </div>

                    </aside>
                </div>
                <!-- END / SIDEBAR -->

            <div class="row"  style="display: inline;">
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



                                     ?>
                <!-- BLOG LIST -->
                <div class="col-md-8">
                    <div class="blog-list-content">
                        <!-- POST -->
                        <div class="post">
                        <?php   if ($_SESSION["m_role"]=='Administrator' || ($_SESSION["m_role"]=='Instructor' && $poster==$_SESSION['m_nId'])){ ?>
                           <div class="post-link">  
                                
            <div uk-toggle="target: #offcanvas-flip<?php echo $aid ?>" id="y"><i class="material-icons pull-right" style="font-size:20px; color:gray;cursor: pointer">close</i></div>



            <div class="uk-offcanvas-content"  >
                <div id="offcanvas-flip<?php echo $aid ?>" uk-offcanvas="flip: true; overlay: true"  >
                    <div class="uk-offcanvas-bar" style="margin-top:15%;height: 140px;width: 400px;right:35%;border-radius: 5px;background-color: #eee;text-align: center"> 
                         <span class="black">Are you sure you want to delete this News?</span>     
                        <br><br>
                         <a style="cursor: pointer;color: gray"     >
                                 <button class="uk-button uk-button-default uk-offcanvas-close uk-margin" style="color:gray;border-color: gray;border-radius: 5px"  type="button">
                                        Cancel
                                 </button> 
                        </a> 


                        <a style="cursor: pointer;color: white" class="remove"  data-rowid="<?php echo $aid ?>" title="delete"  id="demo-position" uk-margin>
                                <button class="uk-button uk-button-default uk-offcanvas-close uk-margin demo" data-message="<div style='text-align:center'><span style='color:green' uk-icon='icon: check'></span>&ensp;&ensp;successfully Deleted</div>" data-pos="top-center" style="background-color:#175690;border-radius: 5px"  type="button">
                                        Delete
                                </button>   
                                
                        </a>  

                    </div>
                </div>
            </div>
            
           
           
                            </div>
                            <?php } ?>
                            <div class="post-media">
                                <div class="image-thumb" >
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
                            </div>
                            <!-- END / POST MEDIA -->

                            <!-- POST BODY -->
                            <div class="post-body">
                                <div class="post-title">
                                    <h3 class="md">  <?php echo $title ;  ?></h3>
                                </div>
                                <div class="post-meta">
                                    by <a href="#">

                                               <?php $poster="SELECT * FROM member where m_nId ='$poster' " ;
                                           $pos=mysqli_query($conn,$poster);
                                          if(mysqli_num_rows($pos))
                                            { while($poss=mysqli_fetch_assoc($pos)) { $mniid =$poss['m_nId'] ;

                                $name = $poss['m_fName'] . " ".$poss['m_lName']  ; ?>
                                <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>">   <?php   echo $name ; }} ?> </a>
                                    </a> 
                                </div>
                                <div class="post-content">
                                    <p> <?php echo $msg ;  ?></p>
                                </div>
                                <div class="post-meta">
                                         <?php echo $time ;  ?>
                                </div>
                            </div>

                           
                        </div>
                        <!-- END / POST -->

                      
                    </div>
                </div>
                <!-- END / BLOG LIST -->

 <?php } ?>
       <?php }  else{?> 

                <div class="col-md-8">
                    <div class="blog-list-content">
                        <!-- POST -->
                        <div class="post">
               

                            <!-- POST BODY -->
                            <div class="post-body">
                                <div class="post-title">
                                    <h3 class="md"><a> You had no announcement </a></h3>
                                </div>
                               
                            </div>
                            <!-- END / POST BODY -->
                        </div>
                        <!-- END / POST -->

                      
                    </div>
                </div>
                <!-- END / BLOG LIST -->

<?php }  mysqli_close($conn); ?>

            </div>
        </div>

    </section>
    <!-- END / BLOG -->   
        

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

<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
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
        <script>
                        $("a.remove").click(function(event){
                            event.preventDefault();
                            var id = $(this).data("rowid");
                            var row = $(this).closest(".post");  

                            $.ajax({
                               url: "deletenew.php",
                               type: "POST",
                               data: {
                                  operation: "remove",
                                  id: id
                               },
                               success: function(response){
                                  row.slideUp("slow");
                               },
                              
                            });
                          
                        });
                      </script>
                      <script>
                            jQuery('#demo-position button.demo').on('click', function() {
                                UIkit.notification($(this).data());
                            });
                        </script>


   
</body>
</html>