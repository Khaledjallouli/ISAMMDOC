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
         <link rel="stylesheet" type="text/css" href="css/style.css">
            <link rel="icon" type="image/png" href="images/isamm1.png" />

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
        <title>Course Settings</title>
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
                                          <a href="studentattendance.php">  <span class="icon md-shopping pull-right" aria-hidden="true"></span> Attendance</a>                                       </li>
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
                <div style="margin-left: 100px;margin-right: 100px" >
                    <div class="table-asignment">
                        <ul class="nav-tabs" role="tablist">
                            <li class="active"><a href="#lstudentslist" role="tab" data-toggle="tab">Choose Your Teaching Courses</a></li>
                        </ul>
                        
                        <form action="savecoursesett.php" method="post" enctype="multipart/form-data" class="ajax">
                        <div id="other"   style="display: none">
                            <br><br><span  style="font-size: 15px;cursor: pointer;color: #37ABF2" >Add another Courses<i class="material-icons">add</i></span>
                        </div>
                            <div class="select">

                            <br><select class="singleSelect" name="language" id="myselect" onchange="sel()" >
                             <?php
                                        $sql="SELECT * FROM course where c_id NOT in(SELECT c_id from member_course where m_nId=$_SESSION[m_nId]    )"; 
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result))
                                        { 
                                            while($row=mysqli_fetch_assoc($result))
                                            { 
                                                $timely=$row["c_id"];
                                                $namecourse= $row["c_fullname"];
                            ?>          <
                                        <option class="<?php echo $row["c_level"] ;?>" value="<?php echo $timely ;?>" id="<?php echo $row["c_id"] ;?> " data-rowid="<?php echo $row["c_cat"] ;?>">
                                           <?php echo $namecourse ;?>
                                          
                                        </option> 
                                       
                                        <?php }} ?>

                                </select>
                                <span id="cancel" style="font-size: 15px;cursor: pointer;color: #37ABF2;margin-left: 20px;display: none" >Cancel</span>
                            </div><br>
                               
                             
                            <div style="float: left;display: none" class="grt"> 
                            <span class="gris" style="font-size: 15px">Select group(s) for this Course :<span id="tit" style="color:#37ABF2"></span> </span><br>
                            <span id='empty' style="display: none;color: red">you have to choose group(s)</span> <br><br>
                            <button type="button" id="gr" >1</button>
                            <button type="button" id="gr" >2</button>
                            <button type="button" id="gr" >3</button>
                            <button type="button" id="gr" >4</button>
                            <button type="button" id="gr" >5</button>
                            <button type="button" id="gr" >6</button>
                            <button type="button" id="gr" >7</button>
                            <button type="button" id="gr" >8</button>
                            <button type="button" id="gr" >9</button>
                            <button type="button" id="gr" >10</button>
                            <button type="button" id="gr" >11</button>
                            <button type="button" id="gr" >12</button>
                            <span id="cancel_" style="font-size: 15px;cursor: pointer;color: #37ABF2;margin-left: 20px;display: none" >Cancel</span> 
                            <div class="input-save" >
                              
                                <input type="submit" value="ok" id="ok" class="mc-btn btn-style-1 pull-right">
                            </div> 
                            </div> 
                            
                            
                            
                             <div class="tab-content">    
                            <table class="mc-table" id='table'>
                                <thead id=th>
                                    <tr style="display: none" id='tr'>
                                        <th class="info-author"><span class="gris">Course Name</span></th>
                                        <th class="submission"><span class="gris">Course Level</span></th>   
                                        <th class="submissions"><span class="gris">Course Category </span></th>
                                        <th class="latest-reply"><span class="gris">Group(s) Selection</span></th>
                                        <th class="latest-reply"><span class="gris"></span></th>
                                    </tr>
                                </thead> 

                         
                            
                                <tbody>
                                </tbody>
                            </table>
                        </div>
               

                            <div class="input-save" id='save' style="display: none">   
                                <a href="courses.php"><input  value="Save changes" hre class="mc-btn btn-style-1 pull-right"></a>
                            </div>   

                        </form>
                   

            
                        <script>
                    
                          
                            jQuery('#defaults').lwMultiSelect();
                            $('.singleSelect').fastselect();

                                function sel(){
                                    if($("#table tbody tr").length == 0) {
                                $("[id=th]").show();
                            }
                                $(".select").slideUp();
                                $("#cancel_").show();
                                $(".grt").slideDown();
                                $("[id=tr]").slideDown(); 

                                $("#table tbody").prepend('<tr id="trr" ><td class="info-author" id="aa"></td><td class="submission"  id="ab"></td><td class="submission"  id="ac"></td><td id="cc"></td><td id="md" ><i id="sup"  data-rowid="'+$("#myselect option:selected ").attr('id')+'" class="icon md-close-2" style="font-size:13px;cursor: pointer;display:none;margin-left:20px" ></i></td><script>var idd = $(this).data("rowid");$("[id=cancel]").click(function(){$("[id=gig]").remove();$("[id=trr]").remove();});<'+'/script>'); 
                                document.getElementById('aa').innerHTML=$("#myselect option:selected ").text();
                                 document.getElementById('tit').innerHTML=$("#myselect option:selected ").text();
                                document.getElementById('ab').innerHTML=$("#myselect option:selected ").attr('class');
                                document.getElementById('ac').innerHTML=$("#myselect option:selected ").data("rowid");
                                $('#myselect').find('option:selected').css('color', 'red'); 
                               
                               
                                }


                $("[id=gr]").click(function(){
                var v=$(this);
                v.slideUp();
                $("#cc").prepend('<button type="button" id="gig"><input id="reload" type="text" name="grp[]"" value="'+$(this).text()+'" style="display: none">'+$(this).text()+'</button>');
                     $("[id=gig]").click(function(){
                                
                                 if($(this).text() ==v.text())
                             {
                                $(this).remove();
                                v.slideDown();
                             }
                                
                               });        

                                 $("[id=edit]").click(function(){
                               
                                    if($("[id=gg]").text() ==v.text())
                             {
                               v.hide();
                             }

                             $("[id=gg]").click(function(){
                                
                                 if($(this).text() ==v.text())
                             {
                                $(this).slideUp();
                               v.slideDown();
                             }
                                
                               });        

                                $(".grt").slideDown();
                                
                                $("#save").slideUp();
                               
                               });
                                  $("[id=sup]").click(function(event){
                                     event.preventDefault();
                                    var id = $(this).data("rowid");
                                    var row = $(this).closest("tr");
                                        $.ajax({

                                            url: "delsetcourse.php",
                                            type: "POST",
                                            data: {
                                            operation: "remove",
                                            id: id
                                            },

                                            success: function(response){
                                              
                                               row.remove();   
                                               if($("#table tbody tr").length == 0)
                             {
                                $("[id=tr]").hide();
                                $("#save").hide();
                                $(".select").val('');   
                                $(".select").slideDown();
                                $("#other").slideUp();
                                $("#cancel").hide();
                             }       
                                            },
                                                       
                                            });

                                
                                
                                  
                               
                               
                            });

                                     
                                  
                                });
                             
                               
                               

                                 $("[id=ok]").click(function(){
                                    if ($("#gig").length == 0 ){
                                       $("#empty").slideDown();
                                    }else{
                                $(".grt").slideUp();
                                $(".select").slideUp();
                                $("#save").slideDown();
                                $("#other").slideDown();
                                $("#edit").show();
                                $("#sup").show();
                                $("[id=trr]").attr("id","trrr");
                                $("[id=gig]").attr("disabled", true);
                                $("[id=gig]").attr("id", "rem");
                                $("[id=th]").show();
                                $("#empty").slideUp();
                                $("#gig").remove();
                                }
                               });

                                $("[id=other]").click(function(){
                                $("#gig").remove();
                                $("[id=reload]").remove();
                                $("#other").slideUp();
                                $(".select").slideDown();
                                $("#save").slideUp();
                                $("#cancel").show();
                                $("[id=gr]").slideDown();
                                $("#edit").hide();
                                $("[id=th]").show();
                                 $("[id=cancel_]").hide();
                               });


                                $("[id=cancel]").click(function(){
                                $("#other").slideDown();
                                $(".select").slideUp();
                                $(".grt").slideUp();
                                $("#save").slideDown();
                                $("#cancel").hide();
                                $("[id=gig]").remove();
                                $("[id=trr]").remove();

                               });
                                $("[id=cancel_]").click(function(){
                                    $(".select").slideDown();
                                $(".grt").slideUp();
                                $("#save").slideUp();
                                $("#cancel_").hide();
                                $("[id=gig]").remove();
                                $("[id=trr]").remove();
                                
                                if($("#table tbody tr").length == 0) {
                                $("[id=th]").hide();
                            }else{
                                $("[id=th]").show();
                            }
                               });
                            
                               
                         
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


                 
            </script>

    </body>
</html>