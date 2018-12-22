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
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/uikit.min.css" />
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
                           <li class='menu-item-has-children '>
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
                           <li class='menu-item-has-children '>
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
                                      <a href="studentattendance.php">  <span class="icon md-shopping pull-right" aria-hidden="true"></span> Attendance</a>                    
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
           

            <!-- BODY -->
    <section id="quizz-intro-section" class="quizz-intro-section learn-section">
        <div class="container">

            <div class="question-content-wrap">
                <div class="row">
                    <div class="col-md-8">
                        <div class="question-content">
                            <h4 class="sm">Courses Results</h4>
                            
                            <table class="table-question">
                                <thead>
                                    <tr>
                                        <th colspan="2">Course name</th>
                                        <th style="text-align: center;">Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                                    $sql="SELECT * FROM course
                                     left JOIN member ON course.c_level = member.m_level and course.c_cat = member.m_cat where member.m_nId=$_SESSION[m_nId] "; 
                                     $result=mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($result))
                                    { 
                                        while($row=mysqli_fetch_assoc($result))
                                        { $timely=$row["c_id"];
                                ?>
                                    <tr>
                                        <td><i class="icon icon-val md-check-2"></td><!--<i class="icon icon-err md-close-2"></i> -->
                                        <td class="td-quest " type="button" uk-toggle="target: #offcanvas-flip<?php echo $timely ?>" style="cursor: pointer;"><?php echo $row["c_fullname"]?></td>
                                        <td class="td-right-answer">-</td>
                                    </tr>


                                


                                <div class="uk-offcanvas-content">
                                    <div id="offcanvas-flip<?php echo $timely ?>" uk-offcanvas="flip: true; overlay: true">
                                        <div class="uk-offcanvas-bar"  style="background-color: #eeeeee;width: 35%;">

                                        <div href="grade" style="margin-top: 30px">
                                            <aside class="question-sidebar">
                                                <div class="score-sb">
                                                    <h4 class="title-sb sm bold"><?php echo $row["c_fullname"]?>
                                                        <span id="grad<?php echo $timely ?>" style='display: none;'>
                                                            <?php 
                                                            
                                                            $total=0;
                                                    $sqqq = "SELECT * from doc left JOIN sub_doc on doc.d_id = sub_doc.d_id where sh_posterid=$_SESSION[m_nId] and c_id ='$timely' " ;
                                                    $res=mysqli_query($conn,$sqqq);

                                                      if(mysqli_num_rows($res))
                                                    {
                                                        while($rex=mysqli_fetch_assoc($res))

                                                        { 
                                                             if (empty($rex["sh_grade"])) {
                                                            echo "<span id='null'>-</span>";
                                                        }  else
                                                                $total+=$rex["sh_grade"];
                                                    }}
                                                       ?>
                                                            <?php if ($total!=0) {?>
                                                               <span id='grade<?php echo $timely?>'><?php echo round($total/3, 2) ?></span>
                                                            <?php } ?>
                                                           
                                                        
                                                                
                                                            
                                                    </h4>
                                                     <ul>
                                                     <?php 
                                                        $sqqq = "SELECT * from doc left JOIN sub_doc on doc.d_id = sub_doc.d_id where sh_posterid=$_SESSION[m_nId] and c_id ='$timely' " ;
                                                        $res=mysqli_query($conn,$sqqq);

                                                    if(mysqli_num_rows($res)){
                                                      while($rex=mysqli_fetch_assoc($res)){ 
                                                        $id=$rex["d_id"];

                                                    ?>
                                                    <li class="<?php if (empty($rex["sh_grade"])) {
                                                                       echo '' ;
                                                                    }
                                                                    else{ if ($rex["sh_grade"]> 15) {
                                                                        echo 'success' ;

                                                                    }else if($rex["sh_grade"]>= 10){
                                                                        echo 'active' ;
                                                                    } else
                                                                    {
                                                                        echo 'err' ;
                                                                    }
                                                                   }?>"   >


                                                                    <i class="icon"></i> <?php echo $rex["d_title"] ?> 
                                                                        <span id="grd<?php echo $id?>">

                                                                            <?php 
                                                                                if (empty($rex["sh_grade"])) {
                                                                                   echo '-' ;
                                                                                }
                                                                                else
                                                                                {
                                                                                    echo $rex["sh_grade"] ;
                                                                                }
                                                                               
                                                                            ?>
                                                                        </span>
                                                                    </li>
                                                    <?php }} ?>
                                                     <?php    
                                                        $sq="SELECT * FROM grade WHERE m_nid = '$_SESSION[m_nId]' and c_id= '$timely'  "; 
                                                        $resu=mysqli_query($conn,$sq);

                                                        if(mysqli_num_rows($resu)){
                                                            while($r=mysqli_fetch_assoc($resu)){
                                                                $iddd = $r['c_id'] ;

                                                    ?>
                                                    
                                                        <li class="<?php if (empty($r["g_midt1"])) {
                                                                       echo '' ;
                                                                    }
                                                                    else{ if ($r["g_midt1"]> 15) {
                                                                        echo 'success' ;

                                                                    }else if($r["g_midt1"]>= 10){
                                                                        echo 'active' ;
                                                                    } else
                                                                    {
                                                                        echo 'err' ;
                                                                    }
                                                                   }?>">
                                                        <i class="icon"></i>Midterm 1
                                                            <span>
                                                                <?php 
                                                                    if (empty($r["g_midt1"])) {
                                                                       echo '-' ;
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $r["g_midt1"] ;
                                                                    }
                                                                   
                                                                ?>
                                                            </span>
                                                        </li>
                                                        <li  class="<?php if (empty($r["g_midt2"])) {
                                                                       echo '' ;
                                                                    }
                                                                    else{ if ($r["g_midt2"]> 15) {
                                                                        echo 'success' ;

                                                                    }else if($r["g_midt2"]>= 10){
                                                                        echo 'active' ;
                                                                    } else
                                                                    {
                                                                        echo 'err' ;
                                                                    }
                                                                   }?>"  >
                                                            <i class="icon"></i>Midterm 2
                                                                <span>
                                                                <?php 
                                                                    if (empty($r["g_midt2"])) {
                                                                       echo '-' ;
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $r["g_midt2"] ;
                                                                    }
                                                                   
                                                                ?>
                                                            </span>
                                                        </li>
                                                        <li class="<?php if (empty($r["g_finalexam"])) {
                                                                       echo '' ;
                                                                    }
                                                                    else{ if ($r["g_finalexam"]> 15) {
                                                                        echo 'success' ;

                                                                    }else if($r["g_finalexam"]>= 10){
                                                                        echo 'active' ;
                                                                    } else
                                                                    {
                                                                        echo 'err' ;
                                                                    }
                                                                   }?>">
                                                            <i class="icon"></i>Final Exam
                                                            <span>
                                                                <?php 
                                                                    if (empty($r["g_finalexam"])) {
                                                                       echo '-' ;
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $r["g_finalexam"] ;
                                                                    }
                                                                   
                                                                ?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <?php }} ?>
                                                </div>
                                            </aside>
                                        </div>
                                        <button class="uk-offcanvas-close" type="button" uk-close></button>
                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $timely ?>" type="button">Close</button>

                                            
                                        </div>
                                    </div>

                                </div>



                                    <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </div>


  
                </div>
            </div>
        </div>
    </section>
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
        <script>

            if ( $("[id=grad<?php echo $timely?>]").text().match('-'))
            {
                $("[id=grade<?php echo $timely?>]").hide();
            }
        </script>

</body>
</html>