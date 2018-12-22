<?php 
    session_start();
        include "connect.php";

               if (empty($_SESSION['m_nId'])) {
            header('Location: index.php');
            exit();
        }
             $key = $_GET['m_nId'] ;
               $sqzz="SELECT * FROM member where m_nId= '$key' ";
                                         $resu=mysqli_query($conn,$sqzz);
                                         if(mysqli_num_rows($resu))
                                {   $rowr1=mysqli_fetch_assoc($resu);
                                         $nameprofile =$rowr1["m_fName"]. " ".$rowr1["m_lName"] ;
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
   <link rel="icon" type="image/png" href="images/isamm1.png" />

       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <title><?php echo $nameprofile?></title>
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
                            <li class='menu-item current-menu-item'>
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

 <?php  if ( $_SESSION['m_nId']== $key ) { ?>

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
    <!-- END / PROFILE FEATURE -->


    <!-- CONTEN BAR -->
    <section class="content-bar">
        <div class="container">
            <ul>
             
                <li class="current">
                   <a href="<?php $mniid = $_SESSION["m_nId"]  ;echo "profile.php?m_nId=".$mniid."" ?>">
                        <i class="icon md-shopping"></i>
                        Profile
                    </a>
                </li>
                  <?php  if ($_SESSION["m_role"]=='Student') { ?>
                <li>
                    <a href="grades.php">
                        <i class="icon md-user-minus"></i>
                        Grades
                    </a>
                </li>
                 <?php }?>
                <li >
                    <a href="inbox.php">
                        <i class="icon md-email"></i>
                        Inbox
                    </a>
                </li>
            </ul>
        </div>
    </section>
   <!-- END / CONTENT BAR -->
 <?php }?>
    
    <!-- COURSE CONCERN -->
   <section class="course-top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="sidebar-course-intro">
                        <div class="breadcrumb">
                            
                            
                        </div>   
                        <div class="video-course-intro">
                            <div class="inner">



                             <?php  $sql1="SELECT * FROM member where   m_nId =$key"; 
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
                                            <?php } } ?> 
                                    
                               
                            </div>
                          
                                
                        </div>


                                <div class="new-course ">
                                    <div class="item course-code ">
                                        <i class="icon md-user-minus"></i>
                                        <h4><a href="#">Role</a></h4>
                                        <p class="detail-course"><?php echo $row1["m_role"] ; ?></p>
                                    </div>
                                    <div class="item course-code ">
                                        <i class="material-icons" style="font-size:20px;color:#7D7872">chrome_reader_mode</i>
                                        <h4><a href="#">&ensp;Nat. ID</a></h4>
                                        <p class="detail-course"><?php echo $row1["m_nId"] ; ?></p>
                                    </div>
                                    <div class="item course-code ">
                                        <i class="icon md-img-check"></i>
                                        <h4><a href="#">Reg. number</a></h4>
                                        <p class="detail-course"><?php echo $row1["m_rn"] ; ?></p>
                                    </div>
                                </div>

                            </div>
                            </div>



                     <div class="col-md-7">
                    <div class="tabs-page">
                                            
                        <div class="tab-content">
                            <!-- INTRODUCTION -->
                                <h4 class="sm black bold">EDUCATION INFORMATION</h4>
                                 <?php  if ( $_SESSION['m_nId']== $key ) { ?>
                                <div class="button pull-right">   <a href="changeinfo.php">  <i class="fa fa-edit " style="font-size:20px; color:#139DF0"></i> Edit </a></div>
                                                                <?php }?>

                                <div class="edit">
                                <table class="table table-hover">
                                <tr><td class="col-md-8">Full Name </td><td><?php echo $row1["m_fName"]." ".$row1["m_lName"] ; ?></td></tr>
                                
                                                             <?php  if ( $row1['m_role']== 'Student' ) { ?>
                   
<tr ><td class="col-md-2">Group </td><td ><?php echo $row1["m_level"]." ".$row1["m_cat"]." ".$row1["m_groupnb"] ; ?></td></tr>
<?php }?>

 <tr ><td class="col-md-3">Gender </td><td ><?php echo $row1['m_gender']; ?></td></tr>


</table>
                               
                                <h4 class="sm black bold">CONTACT INFORMATION</h4>
                                               <table class="table table-hover">
                                              <tr> <td class="col-md-8"> Mobile Phone</td> 
                                                  <td>  
                                                   <?php 
                                                     $sk = $row1['m_phNumber'] ; 
                                                   echo "$sk" ;
                                                   

                                                 ?>
                                                    </td>
                                             </tr>
                                                <tr> 
                                                <td class="col-md-8">Email </td> 
                                                <td>
                                                <?php 
                                                     $sk = $row1['m_email'] ; 
                                                   echo "$sk" ;
                                                   

                                                 ?>  </td></tr>

  <tr> <td class="col-md-8"> Skype </td> <td>   <?php 
                                                     $sk = $row1['m_skype'] ; 
                                                   echo "$sk" ;
                                                   

                                                 ?>    </td> </tr>

</table>
                                
                                <h4 class="sm black bold">BASIC INFORMATION</h4>
                                                <table class="table table-hover">
  <tr> <td class="col-md-8"> Birth Date </td> <td>   <?php 
                                                     $sk = $row1['m_bdate'] ; 
                                                   echo "$sk" ;
                                                   

                                                 ?> </td> </tr>
    <?php 
                                                 

     }}?>  


</table>

                          
          </div>
</div>
</div>
</div>
                            <!-- END / INTRODUCTION -->
    
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
        <script src="jquery/jquery.form.min.js"></script>
    </body>



</body>
</html>