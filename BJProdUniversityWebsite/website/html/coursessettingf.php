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
        <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
        <link rel="stylesheet" href="../multiple-select.css" />
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link href="jquery.lwMultiSelect.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery.lwMultiSelect.js"></script>
        <link rel="stylesheet" href="dist/fastselect.min.css">
        <script src="dist/fastselect.standalone.js"></script>
        <style>
            .fstElement { font-size: 0.8em; }
            .fstToggleBtn { min-width: 18.5em; min-height: 1.5em;}
            .submitBtn { display: none; }
            .fstMultipleMode { display: block; }
            .fstMultipleMode .fstControls { width: 100%; }
        </style>

         <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <title>ISAMMDOCs</title>
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
                        if(empty($_SESSION["m_nId"])){?>
                        <ul class="menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="register.php">Sign Up</a>
                            </li>
                        </ul>

                        <?php }  else{
                        if ($_SESSION["m_role"] == 'Administrator'){?>

                        <ul class="menu">
                            <li class="menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item'>
                                <a href='listm.php'>Members</a>
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
                                            <?php }  } }} ?>
                                </div> 

                                
                                <ul class="dropdown-menu " role="menu" style="background-color:#012340">
                                    <li>
                                        <h4 style="text-align:center;color:#D8D8D8"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h4>
                                        <h6 style="text-align:center ;color:#139DF0"><?php echo $_SESSION["m_role"]; ?></h6>   
                                    </li>

                                    <li class="divider"></li>

                                    <li> 
                                        <a href="profile.php"><span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
                                    </li>
                                    <li>
                                        <a href="profile.php"><span class="fa fa-list-alt pull-right"></span> Grades </a>
                                    </li>
                                    <li>       
                                        <a href="logout.php"><span class="fa fa-sign-out pull-right" aria-hidden="true"></span> Sign Out</a>    
                                    </li>
                                </ul>
                            </li>
                        </ul>



                        <?php } 
                        if ($_SESSION["m_role"]=='Instructor'){ ?>


                        <ul class="menu">
                            <li class="menu-item"> 
                                
                                <a href='index.php'>Home</a>
                            </li>
                        </ul>

                        <ul class='menu'>
                            <li class='menu-item'>
                                <a href='listm.php'>Members</a>
                            </li>
                           
                        </ul>

                        <ul class='menu'>
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
                                            <?php }  } }} ?>
                                </div> 
                            
                                
                                <ul class="dropdown-menu " role="menu" style="background-color:#012340">
                                    <li>
                                        <h4 style="text-align:center;color:#D8D8D8"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h4>
                                        <h6 style="text-align:center ;color:#139DF0"><?php echo $_SESSION["m_role"]; ?></h6>   
                                    </li>

                                    <li class="divider"></li>

                                    <li> 
                                        <a href="profile.php"><span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
                                    </li>
                                    <li>
                                        <a href="profile.php"><span class="fa fa-list-alt pull-right"></span> Grades </a>
                                    </li>
                                    <li>       
                                        <a href="logout.php"><span class="fa fa-sign-out pull-right" aria-hidden="true"></span> Sign Out</a>    
                                    </li>
                                </ul>
                            </li>
                        </ul>                              
                                         

                        <?php  }
                        if ($_SESSION["m_role"]=='Student') { ?>


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
                                            <?php }  } }} ?>
                                </div> 
                            
                                <ul class="dropdown-menu " role="menu" style="background-color:#012340">
                                    <li>
                                        <h4 style="text-align:center;color:#D8D8D8"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"]; ?></h4>
                                        <h6 style="text-align:center ;color:#139DF0"><?php echo $_SESSION["m_role"]; ?></h6>   
                                    </li>

                                    <li class="divider"></li>

                                    <li> 
                                        <a href="profile.php"><span class="icon md-user-minus pull-right" style="font-size:12px"></span> Profile </a>
                                    </li>
                                    <li>
                                        <a href="profile.php"><span class="fa fa-list-alt pull-right"></span> Grades </a>
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
                    <div class="trophies">
                        <span>Group</span>
                            <p style="text-align: center">
                                <?php if (empty($_SESSION["m_group"] )){
                                    echo '-';
                                }
                                else{
                                echo $_SESSION["m_group"]; }?>   
                            </p>
                    </div>
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
    
            <section  class="course-concern">
                <div class="container">
                    <div class="table-asignment">
                        <ul class="nav-tabs" role="tablist">
                            <li class="active"><a href="#lstudentslist" role="tab" data-toggle="tab">Choose Your Teaching Courses</a></li>
                        </ul>
                        
                        <form action="coursessetting.php" method="post" enctype="multipart/form-data" runat="server">
                            <div>
                                <select class="singleSelect" name="language" onChange="verif('singleSelect')">
                                    <?php
                                        $sql="SELECT * FROM course "; 
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result))
                                        { 
                                            while($row=mysqli_fetch_assoc($result))
                                            { 
                                                $timely=$row["c_id"];
                                                $namecourse= $row["c_fullname"];
                                        ?>
                                    <option value="<?php echo $timely ;?> "> <?php echo $namecourse ;?> </option> 
                                    <?php }} ?>
                                </select>
                            </div>

                            <select id="defaults" multiple="multiple" name="group_nb[]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>

                            <div class="input-save">   
                                <input type="submit" value="Save changes"  class="mc-btn btn-style-1 pull-right">
                            </div>   

                        </form>
                        <script  type='text/javascript'>

                          
                                var val=document.getElementById('singleSelect').onchange.value;
                                        <?php $abc = "<script>document.write(val)</script>";?>
                            
                                                

                                           
                                    </script>

                        <div class="tab-content">    
                            <table class="mc-table">
                                <thead >
                                    <tr>
                                        <th class="info-author"><span class="gris">Course Name</span></th>
                                        <th class="submission"><span class="gris">Course Level</span></th>   
                                        <th class="submissions"><span class="gris">Course Category </span></th>
                                        <th class="latest-reply"><span class="gris">Group(s) Selection</span></th>
                                    </tr>
                                </thead> 

                                <tbody>
                                    <tr >
                                        <td class="info-author"><?php echo $abc ; ?></td>
                                        <td class="submission"></td>
                                        <td class="submission"></td>
                                        <td class="latest-reply"></td>                            
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        

                        <?php
                            if (isset($_POST['language']) ) 
                            {
                                $var =  $_POST['language'];
                                $groupnb=0 ; 
                                $sess= $_SESSION['m_nId'] ;

                                if ($_POST) 
                                {
                                    $groupnb = $_POST['group_nb'];
                                    foreach ($groupnb as $grp) 
                                    {
                                        $sql = 'INSERT INTO member_course (m_nId,c_id,group_nb)VALUES ('. $sess .','. $var .',"'.$grp .'"    ) ';
                                        if(!mysqli_query($conn, $sql))
                                        {
                                            die("ERROR:". $sql."<br>");
                                        }
                                    }
                                }
                            }
                        ?>

                        <script>
                            jQuery('#defaults').lwMultiSelect();
                            $('.singleSelect').fastselect();
                        </script>
                    </div>
                </div>
            </section>

            <!-- END / SETTING -->
              
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
        <script src="assets/jquery.min.js"></script>
        <script src="../multiple-select.js"></script>
        <script type="text/javascript" src="sh/shCore.js"></script>
        <script type="text/javascript" src="sh/shBrushJScript.js"></script>
        <link type="text/css" rel="stylesheet" href="sh/shCore.css"/>
        <link type="text/css" rel="stylesheet" href="sh/shThemeDefault.css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.searchabledropdown-1.0.8.min.js"></script>

        <script>
            function verif(field1,output)
            {
                val = document.getElementById(field1).value;
                document.getElementById(output).innerHTML=val;
            }
        </script>
    </body>
</html>