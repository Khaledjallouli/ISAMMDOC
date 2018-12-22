<?php
    include "connect.php";
    session_start();
     
                
         if (empty($_SESSION['m_nId'])) {
    header('Location: index.php');
    exit();
}
if (isset($_GET['del'])) { 
    $number =$_GET['del'];

    $sql = "DELETE FROM doc where d_id='$number' " ;
     $result=mysqli_query($conn,$sql);
    }
     
    $sql3="SELECT * FROM member WHERE m_nId =$_SESSION[m_nId] "; 
                    $result3=mysqli_query($conn,$sql3);
                    if(mysqli_num_rows($result3))
                        {  while($rowh=mysqli_fetch_assoc($result3))
                    {$kk = $rowh['m_Pic'] ;
                  }}

     $key = $_GET['c_id'] ;
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            { $timely=$row["c_id"];
                             $fname = $_SESSION['m_fName'];
                             $lname = $_SESSION['m_lName'] ;

                            $level=$row["c_level"];
                            $cat=$row["c_cat"] ;
                            $cname = $row["c_fullname"];
                           


    ?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
    <link rel="stylesheet" type="text/css" href="css/library/animate.css">
    <link rel="stylesheet" type="text/css" href="css/md-font.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/uikit.min.css" />
    

        <link rel="stylesheet" type="text/css" href="src/DateTimePicker.css" />

   

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Course details</title>
</head>
<body id="page-top">

<!-- PAGE WRAP -->
<div id="page-wrap">
    <div class="top-nav">
        <ul class="top-nav-list ">
          <li class="prev-course"><a href="courses.php"><i class="icon md-angle-left"></i><span class="tooltip">Prev</span></a>
             <div  style="display: none" class="test-upload uk-placeholder uk-text-center"></div></li>
         </ul>
        <h4 class="sm black bold"><?php echo  $row["c_fullname"]?></h4>

        <ul class="top-nav-list">
              <li class="discussion-learn">
                <a href="#"><i class="icon md-list"></i><span class="tooltip">Exam Dates</span></a>

           
                <div class="list-item-body outline-learn-body">
                
                <?php if ($_SESSION["m_role"] == 'Instructor' ||$_SESSION["m_role"] == 'Administrator'){ ?> 




                          <div class="section-learn-outline">
                            <h5 class="section-title">Add New Exams Dates</h5>
                            <ul class="section-list">
                              <li id="ex">
                                <div class="list-body" >
                                   <form action="<?php echo "saveexamdate.php?c_id=".$timely."" ?>" class="ajax" method="post" style=""> 
                                      <div class="form-item">
                                    
                                        <select class="form-control" id="sel" name= "ex_type"  >
                                        <option  disabled selected hidden class="text-hide">Exam Type</option>
                                          <option value="Midterm 1 (DS 1) ">Midterm 1 (DS 1)</option>
                                          <option value="Midterm 2 (DS 2)">Midterm 2 (DS 2)</option>
                                          <option value="Final Exam">Final Exam</option>
                                        </select>
                                      </div><br>

                                     <div class="form-group">
                                      <input type="text" class="form-control" id="text" name="ex_date" placeholder=' Exam Date' data-field="datetime" data-format="dd-MMM-yyyy hh:mm:ss AA" readonly>
                                    </div>

                                    <div id="dtBox"></div>
                                    <div class="form-submit">
                                      <textarea name="ex_description" id='des'  style="height:50px" placeholder="Discussion content"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-submit">
                                      <input type="submit" value="Post" id="sd" class="mc-btn-2 btn-style-2">
                                    </div>
                                  </form>
                                </div>
                                <div class="div-x"><i class="icon md-check-2"></i></div>
                              </li>

                              <li id="ex1" style="display: none;cursor: pointer;">
                                Add New Exams Dates
                              </li>
                            </ul>

                          </div>

                          <script src="jquery/jquery.js"></script>
                          <script src="jquery/jquery.form.min.js"></script>
                          <?php } ?> 
                     

                            <div class="section-learn-outline">
                        <h5 class="section-title">Exams Dates</h5>
                            <?php
                                $sqli="SELECT * FROM examdate where c_id = '$timely' order by ex_id desc"; 
                             $resulti=mysqli_query($conn,$sqli);
                            if(mysqli_num_rows($resulti))
                            { while($rowi=mysqli_fetch_assoc($resulti))
                             { 
                             ?>
                        <ul id="hh" class="section-list">
                            <li >
                                <div class="list-body">
                                        <div class="rr pull-right">
                                          <a href="#"  title="delete" class="pull-right">
                                            <img class="pull-right" src="images/clear.png" width="15px" height="15px">
                                          </a>
                                        </div>
                                   
                                        <?php
                                         if (!empty($rowi["ex_type"])) 
                                         echo "<span style='color:#3C79BA'>".$rowi["ex_type"]."</span>" ?> 
                                         
                                        <h6> <?php
                                        if (!empty($rowi["ex_date"])) 
                                         echo $rowi["ex_date"] ?>  </h6>

                                        <p><?php
                                        if (!empty($rowi["ex_description"])) 
                                         echo $rowi["ex_description"] ?></p>

                                 
                                </div>
                              
                                <div class="div-x"><i class="icon md-check-2"></i></div>
                            </li>
                           
                        </ul>
                          <?php }}
                                    else { ?>   
                          <ul id="hh" class="section-list">
                            <li id="mm">
                                <div class="list-body">
                                  
                                   
                                        <h6>There is no exam dates right now</h6>

                                 
                                </div>
                              
                                <div class="div-x"><i class="icon md-check-2"></i></div>
                            </li>
                           
                        </ul> <?php }?>
                        <script type="text/javascript">
                                                  
                            $("[id=sd]").click(function(){
                                
                               
                                
                                $("[id=ex]").slideUp();
                                $("[id=mm]").slideUp();
                                $("[id=ex1]").show();
                                
                                
                                var c1 = document.getElementById("text").value;
                                var c2 = document.getElementById("sel").value;
                                var c3 = document.getElementById("des").value;

                                $("#hh").prepend('<li><div class="list-body"><h6 ><span id="'+c2+'" style="color:#3C79BA"></span></h6><h6 id="'+c1+'"></h6><p id="'+c3+'"></p><div class="div-x"><i class="icon md-check-2"></i></div></div></li>').slideDown('slow');
                               
                                document.getElementById(c2).innerHTML=document.getElementById("sel").value ;
                                 document.getElementById(c1).innerHTML=document.getElementById("text").value ;
                                document.getElementById(c3).innerHTML=document.getElementById("des").value ;



                             
                                                                                        
                            });

                            $("[id=ex1]").click(function(){
                              $("[id=text]").val('');
                                $("[id=sel]").val('Exam Type');
                                $("[id=des]").val('');
                              $("[id=ex]").slideDown();
                              $("[id=ex1]").hide();

                             
                                                                                        
                            });

                                  
                          </script>
                    </div>

                </div>
            </li>

            <li class="discussion-learn">
            <a href="#"><i class="icon md-comments"></i><span class="tooltip">New Topic</span></a>
                <div class="list-item-body discussion-learn-body">
                    <div class="inner">
                    </div>
                </div>    

            </li>
 
            <!-- DISCUSSION -->
            <li class="discussion-learn">
                <a href="#"><i class="icon md-comments"></i><span class="tooltip">New Topic</span></a>
                <div class="list-item-body discussion-learn-body">
                    <div class="inner">


                        <div class="form-discussion" >
                        <div id="bb" style="display: none">
                                <form action="<?php echo "savediscussiontopic.php?c_id=".$timely."" ?>" method="post" class="ajax">
                                <div class="text-title">
                                    <input type="text" name= "dt_title" id="text1" placeholder="Topic title here">
                                </div>
                                <div class="post-editor text-form-editor">
                                    
                                    <textarea name="dt_description" id="des1" placeholder="Discussion content"></textarea>
                                </div>
                              
                                <div class="form-submit">
                                    <input type="submit" value="Post" id="aa" class="mc-btn-2 btn-style-2">
                                </div>
                              </div>
                                <h5 id="ex2" style="cursor: pointer;">Add new Topic <i class="material-icons">add</i></h5>

                                <h5 style="color:gray"><i class="material-icons">list</i> Topics</h5>
                            </form>
                        </div>
                        <ul class="list-discussion" id="topicc">
                            <li id='any'><hr style="color:#3a7ff5"> 
                          <span style="color: #DCDCDC;font-size: 20px;">Any Topcis posted yet</span></li>
                          </ul>

                         <?php
                    $sql="SELECT * FROM disc_topic where c_id = '$timely' order by dt_id desc "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        { while($row=mysqli_fetch_assoc($result))
                            { $dtid=$row['dt_id'];
                            $mid=$row['m_nId'];
                ?>

                         
              
                        <ul class="list-discussion" id="topic">
                
                            <!-- LIST ITEM -->
                            <li id="li_topic<?php echo $dtid ?>" class='del_top'>
                                <div class="list-body">
                                  
                                  <div class="list-content">
                                      
                                <ul class="commentlist">
                                    <li class="comment">
                                          <div class="comment-body">
                                            <div class="comment-author">
                                                <a href="#">
                                               <?php $poster="SELECT * FROM member where m_nId ='$mid' " ;
                                           $pos=mysqli_query($conn,$poster);
                                          if(mysqli_num_rows($pos))
                                            { while($poss=mysqli_fetch_assoc($pos)) {



                                              if (!empty($poss["m_Pic"] )){ 
                                                 $sk = $poss['m_Pic'] ; 
                                                   
                                  echo "<img id='blah' style='width : 40px ;height: 40px;' src='images/".$sk."'>" ; } 

                                        
                                  
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
                                            </div>
                                            <div class="comment-content">
                                                <cite class="fn sm black bold" style="font-size:15px;"><a href="">
                                                 <span style="color: #37ABF2; padding: 0px" > <?php echo $poss["m_fName"]." ".$poss["m_lName"] ?></span>
                                                </a>  </cite> <?php }}?>


                                               <div class="rr pull-right">  
                                            <a href="<?php echo "coursedetails.php?c_id=".$timely."&deli=".$dtid."" ?>"  title="delete" >
                                              <i class="material-icons pull-right" style="font-size:20px; color:black">close</i></a>
                                              </div>
                                              
                                     

                                                 

                                                <p style="font-size:15px;"> <?php echo $row["dt_description"] ?></p>
                                                  
                                                
                                           
                                     
                                          
                                           
                                         
                                 
                                        
    
                                            </div>
                                        </div>

                                         <span id="nb<?php echo $dtid ?>" style="color:gray;font-size: 10px;"></span>
                                    <?php $qs = "SELECT * FROM disc_comments where dt_id = '$dtid' ORDER BY comm_id ";
                                          $re=mysqli_query($conn,$qs);
                                          if(mysqli_num_rows($re))
                                            { while($raa=mysqli_fetch_assoc($re)) {
                                              $mnid= $raa['comm_m_nId'] ;
                                             


                                      ?>

                                        <?php $name="SELECT * FROM member where m_nId ='$mnid' " ;
                                           $rea=mysqli_query($conn,$name);
                                          if(mysqli_num_rows($rea))
                                            { while($namecase=mysqli_fetch_assoc($rea)) {?>


                                       
                                        <ul class="children" style="padding: 0px;"  id="in<?php echo $dtid ?>">
                                            <li class="comment" id="za<?php echo $dtid ?>" style="display: none;height: 45px" >
                                                <div class="comment-body" >
                                                    <div class="comment-author" >
                                                       
                                                  
                                                    
                                                        <cite class="fn sm black bold" style="font-size:10px;margin-left: 15px; color: #37ABF2">
                                                        <a href=""> 

                                        <?php  if (!empty($namecase["m_Pic"] )){ 
                                                 $sk = $namecase['m_Pic'] ; 
                                                   
                                  echo "<img id='blah' style='width : 20px ;height: 20px;' src='images/".$sk."'>" ; } 

                                        
                                  
                                       if (empty($namecase["m_Pic"] )){ 

                                        if ($namecase["m_gender"]=='Female') { ?>

                                       <img style='width : 20px ;height: 20px;' src="images/female.png" /> 
                                            <?php  }
                                            else  if ($namecase["m_gender"]=='Male'){ ?>
                                         <img style='width : 20px ;height: 20px;' src="images/male.jpg" /> 
                                            <?php  } 
                                            else {  ?>
                                       <img style='width : 20px ;height: 20px;' src="images/male.jpg" /> 
                                            <?php }  } ?>


                                                  <span style="color: #37ABF2" >
                                                    <?php echo $namecase["m_fName"]." ".$namecase["m_lName"] ;?>
                                                  </span>
                                          </a>
                                                        </cite>
                                                        <span  style="font-size:10px; margin-bottom: 0px;margin-left: 15px; color: #666669"> <?php echo  $raa["comm_text"];  }} ?> </span>
                                                    </div>
                                                </div>
                                            </li>
                                           
                                        </ul>
                       
                                      
                                          <?php }} ?>
                                         
                                          <ul class="children" style="padding: 0px;"  id="inn<?php echo $dtid ?>">
                                          </ul>    

                                          <a  href="#"  ><i id="az<?php echo $dtid ?>" style="display: none;" class="material-icons">keyboard_arrow_down</i></a>
                                           
                                           <a id="az0<?php echo $dtid ?>" href="#" style="display: none"><i class="material-icons">keyboard_arrow_up</i></a> 
                                            <span id="at<?php echo $dtid ?>" style="cursor: pointer;font-size:10px;float: right;color:gray;">Comment</span>
                                            <span id="at<?php echo $dtid ?>"><i style="cursor: pointer;color:gray;font-size: 15px;float: right" class="material-icons" >question_answer</i></span>
                                            <hr style="color:#3a7ff5"> 



                                          <div id="att<?php echo $dtid ?>" style="display:none">
                                            <form action="<?php echo "savecommdiscussiontopic.php?c_id=".$timely."&dt_id=".$dtid ?>" method="post" class="ajax"> 
                                              <div class="post-editor text-form-editor">
                                                <textarea name="comm_text" placeholder="Write a comment..." style="height:40px" id="com1<?php echo $dtid ?>" ></textarea>
                                              </div>
                                              <br>
                                              <div class="form-submit">
                                                <input type="submit" value="Post" name="comment" id="com<?php echo $dtid ?>" class="mc-btn-2 btn-style-2 pull-right">
                                              </div>
                                            </form> 
                                           </div>
                                             <form action="#" method="post"> 
                                    </li>
                                    
                                  </ul>  

                                </div>
                              </li>
                          </ul>

                             
                           <script >

                    




                                $("[id=any]").hide();

                                var length1 =$("ul#in<?php echo $dtid ?>").children().length;
                                var length2 =$("ul#inn<?php echo $dtid ?>").children().length;
                                var length=length1+length2;
                                 document.getElementById('nb<?php echo $dtid ?>').innerHTML=length+' Comments';



                                if($('#za<?php echo $dtid ?>').length ) 
                                {
                                $("[id=az<?php echo $dtid ?>]").show();
                                }
                                                                             
                                  
                   
                                                
                                             

                                           $("[id=az<?php echo $dtid ?>]").click(function(){
                                                    $("[id=za<?php echo $dtid ?>]").slideDown();
                                                    $("[id=az<?php echo $dtid ?>]").hide();
                                                    $("[id=az0<?php echo $dtid ?>]").show();

                                                                                                    
                                                  });
                                            $("[id=az0<?php echo $dtid ?>]").click(function(){
                                                  $("[id=za<?php echo $dtid ?>]").slideUp();
                                                  $("[id=az0<?php echo $dtid ?>]").hide();
                                                  $("[id=az<?php echo $dtid ?>]").show();

                                                                                                  
                                                });



                                   $("[id=at<?php echo $dtid ?>]").click(function () { 
                                  if ($("[id=att<?php echo $dtid ?>]").is(':visible'))
                                  {
                                      $("[id=att<?php echo $dtid ?>]").slideUp();
                                  }
                                  else
                                  {
                                      $("[id=att<?php echo $dtid ?>]").slideDown();
                                      $("[id=com1<?php echo $dtid ?>]").val('');
                                      $("[id=com1<?php echo $dtid ?>]").focus();
                                  }
                                });



                            $("[id=com<?php echo $dtid ?>]").click(function(){

                              



                              $("[id=az<?php echo $dtid ?>]").click(function(){
                                                    $("[id=za<?php echo $dtid ?>]").slideDown();
                                                    $("[id=az<?php echo $dtid ?>]").hide();
                                                    $("[id=az0<?php echo $dtid ?>]").show();

                                                                                                    
                                                  });
                                            $("[id=az0<?php echo $dtid ?>]").click(function(){
                                                  $("[id=za<?php echo $dtid ?>]").slideUp();
                                                  $("[id=az0<?php echo $dtid ?>]").hide();
                                                  $("[id=az<?php echo $dtid ?>]").show();

                                                                                                  
                                                });
                            $("[id=za<?php echo $dtid ?>]").slideDown();
                            $("[id=az<?php echo $dtid ?>]").hide();
                            $("[id=az0<?php echo $dtid ?>]").show();
                            $("[id=att<?php echo $dtid ?>]").slideUp();
                            $("[id=az0<?php echo $dtid ?>]").show();
                            $("[id=az<?php echo $dtid ?>]").hide();

                            
                            var c4 = document.getElementById("com1<?php echo $dtid ?>").value;
                            $("#inn<?php echo $dtid ?>").append('<li id="za<?php echo $dtid ?>" class="comment"><div class="comment-body" ><div class="comment-author" ><cite class="fn sm black bold" style="font-size:10px;margin-left: 15px; color: #37ABF2"><a href=""><img style="width : 20px ;height: 20px;"" src="images/<?php echo $kk ?>"><span style="color: #37ABF2"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"] ?></span></a></cite><span id="'+c4+'" style="font-size:10px; margin-bottom: 0px;margin-left: 15px; color: #666669">'+c4+'</span></div></div></li>');


                               
                            document.getElementById(c4).innerHTML=document.getElementById("com1<?php echo $dtid ?>").value ;
                            var length1 =$("ul#in<?php echo $dtid ?>").children().length;
                                var length2 =$("ul#inn<?php echo $dtid ?>").children().length;
                                var length=length1+length2;
                                document.getElementById('nb<?php echo $dtid ?>').innerHTML=length+' Comments';

                          }); 


                          </script>

                          <?php } }?>
                          
                    </div>
                </div>
           
             <!-- NOTE LEARN -->
            <li class="backpage">
              <a href="<?php echo "adddocument.php?c_id=".$timely."" ?>"> 
             <i class="icon md-file"></i><span class="tooltip">New Doc</span></a>      
            </li>

          
            <li class="backpage">
                <a href="index.php"><i class="icon md-close-1"></i><span class="tooltip">Home</span></a>
            </li>

  <li class="backpage">
                ..
            </li>

        </ul>

        
    </div>
   



    <!-- COURSE CONCERN -->
    <section  class="course-concern" >
               

      
            <div class="container " >

                <div class="table-asignment">
                  <?php  if ($_SESSION["m_role"] == 'Instructor'){ ?>
                <ul class="nav-tabs" role="tablist">
                 <li class="active"><a href="#attendance" role="tab" data-toggle="tab">Attendance</a></li>
               <li><a href="#lecturenote" role="tab" data-toggle="tab">Lecture Note</a></li>
                    <li><a href="#homeworkannouncement" role="tab" data-toggle="tab">Homework</a></li>
                     <li><a href="#projectannouncement" role="tab" data-toggle="tab">Project</a></li>
                    <li><a href="#examresult" role="tab" data-toggle="tab">Exam's Result</a></li>

                </ul>
                <?php } else { ?>
                 <ul class="nav-tabs" role="tablist">
                
               <li class="active"><a href="#lecturenote" role="tab" data-toggle="tab">Lecture Note</a></li>
                    <li><a href="#homeworkannouncement" role="tab" data-toggle="tab">Homework</a></li>
                     <li><a href="#projectannouncement" role="tab" data-toggle="tab">Project</a></li>
                </ul>
            <?php } ?>
                <!-- Tab panes -->
                <div class="tab-content">
                       <?php  if ($_SESSION["m_role"] == 'Instructor'){ ?>
                      <div class="tab-pane fade in active" id="attendance">
                      <?php
                           $sq="SELECT group_nb FROM member_course WHERE c_id =$key and m_nId=$_SESSION[m_nId]" ;
                                 $resul=mysqli_query($conn,$sq);
                    if(mysqli_num_rows($resul))
                        { ?> 
                        <table class="mc-table">
                                <thead >
                                  <tr >
                                    <th class="submissions"><span class="gris">&ensp;&ensp;Group(s)</span></th>
                                   
                                  </tr>
                                </thead>
                          <?php
                                     while($ro=mysqli_fetch_assoc($resul))
                                     { $nb = $ro["group_nb"]; 
                     
                              ?>

                             <tr> 
                               <td>
                          
                                <a href="<?php echo "attendance.php?c_id=".$timely."&group_nb=".$nb ?>" > 
                                  <img src="images/lecture.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo  "$level $cat $nb"?> </span>
                                </a>
                            
                              </td>
                           
                              
                            </tr>  
                     

                         <?php } }  
                             else {?> <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                            You don't have any group in <span style="text-decoration: underline  "><b><?php  echo "$cname" ?> </b></span> course
                            
                              </td>
                           
                              
                            </tr>  
 </table>
                       <?php  }?>
                      </table>
                   
              
                      </div>
 <?php }?>



     <?php  if ($_SESSION["m_role"] == 'Instructor'){ ?>
      <div class="tab-pane fade" id="lecturenote">
    
      <?php } else {?>
                    <div class="tab-pane fade in active" id="lecturenote">
                      <?php }
                            $sql1="SELECT * FROM doc where  d_type = 'Lecture Note' and c_id = '$timely' order by d_id desc" ; 
                              $result1=mysqli_query($conn,$sql1);
                              if(mysqli_num_rows($result1))
                                {   
                                  ?>
                               
                        <table class="mc-table">
                                <thead >
                                  <tr >
                                    <th class="submissions"><span class="gris">&ensp;&ensp;Title</span></th>
                                    <th class=""><span class="gris">Post date </span></th>
                                    <th class="latest-reply"><span class="gris"></span></th>
                                  <th class="repl"><span class="gris"></span></th>

                                  </tr>
                                </thead>
                          <?php
                                    while($row1=mysqli_fetch_assoc($result1))
                                      { 
                                      
                                        $id = $row1['d_id'];
                                        $name = $row1['d_file'];
                                        $path = $row1['f_path'];
                                        $row1['c_id'] = $timely ;

                          
                             
                                  if ($_SESSION["m_role"] == 'Student'){ ?>

                            <tr > 
                              <td   class="submissions uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-reveal<?php echo $id ?>">
                          
                                <a href="<?php echo "coursedetails.php?c_id=".$timely."&d_id" ?>" > 
                                  <img src="images/lecture2.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["d_title"] ?></span>
                                </a>
                            
                              </td>
                              <td class="total-subm"><span class="gris"><?php echo $row1["d_postdate"] ?></span></td>
                              <td class="latest-reply">
                                 <a href="<?php echo "download.php?d_id=".$id."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>
                            </tr>  


                                                                  <div id="offcanvas-reveal<?php echo $id ?>" uk-offcanvas="mode: reveal; overlay: true">
                                      <div class="uk-offcanvas-bar" style="background-color: #024A87">

                                        <h3>Title</h3>
                                        <h4><?php echo $row1["d_title"] ?></h4>
                                        <img src="images/PJ1.png" width="40px" height="40px">&ensp;&ensp;TD Attached : 
                                         <?php echo "<br><br>";
                                      $query="SELECT * from td where d_id=$id order by td_id desc"  ;
                                       $res=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($res))
                                        {
                                          while($r=mysqli_fetch_assoc($res)) {
                                            $tdid=$r['td_id'];
                                            $tdname=$r['td_title'];
                                            $tdfile=$r['td_file']; ?>
                                              
                                         <div >
                                        <a  id="io<?php echo $id ?>" href="<?php echo "downloadtd.php?td_id=".$tdid ?>" style="text-decoration: none;" >
                                        <img src="images/des3.png" width="15px" height="15px">&ensp;&ensp;
                                          <span style="font-size: 13px">
                                            <?php
                                                if(strlen($tdname) > 15)
                                                {
                                                $vv=substr($tdname,0,12)."...";
                                                }
                                                else 
                                                $vv=$tdname; 
                                              echo $vv;
                                            ?> 
                                          </span>
                                        </a>
                                          
                                        </div>    
                                      

                                        <?php    }  } else { ?>
                                            <div id="no" style='color:#242221;margin-left:45px'>Any attache posted yet</div><br>
                                        <?php } ?>
                                        


                                       <br><img src="images/des4.png" width="20px" height="20px">&ensp;&ensp;Description  : <br><div style="font-size: 13.5px;margin-left:35px"><?php echo $row1["d_description"] ?></div>

                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $id ?>" type="button">Close</button>


                                    </div>
                                  </div>

                            <?php }

                              else {  ?>

                            <tr > 
                              <td   class="submissions uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-reveal<?php echo $id ?>">
                          
                                <a href="coursedetails.php?d_id=$id" > 
                                  <img src="images/lecture.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["d_title"] ?></span>
                                </a>
                            
                              </td>
                              <td class="total-subm"><span class="gris"><?php echo $row1["d_postdate"] ?></span></td>
                              <td class="latest-reply">
                                 <a href="<?php echo "download.php?d_id=".$id."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>
                       </tr>  
                     

                                 <div id="offcanvas-reveal<?php echo $id ?>" uk-offcanvas="mode: reveal; overlay: true">
                                      <div class="uk-offcanvas-bar" style="background-color: #024A87">

                                        <h3>Title</h3>
                                        <h4><?php echo $row1["d_title"] ?></h4>
                                        <img src="images/PJ1.png" width="40px" height="40px">&ensp;&ensp;TD Attached : <br>
                                         <?php 
                                      $query="SELECT * from td where d_id=$id order by td_id desc"  ;
                                       $res=mysqli_query($conn,$query);
                                        if(mysqli_num_rows($res))
                                        {
                                          echo "<br>";
                                          while($r=mysqli_fetch_assoc($res)) {
                                            $tdid=$r['td_id'];
                                            $tdname=$r['td_title'];
                                            $tdfile=$r['td_file']; ?>


                                         <div class="new">
                                        <a  id="io<?php echo $id ?>" href="<?php echo "downloadtd.php?td_id=".$tdid ?>" style="text-decoration: none;" >
                                        <span id="tdt<?php echo $tdid ?>" >
                                        <img src="images/des3.png" width="15px" height="15px">&ensp;&ensp;
                                          <span  style="font-size: 13px">
                                            <?php
                                                if(strlen($tdname) > 15)
                                                {
                                                $vv=substr($tdname,0,12)."...";
                                                }
                                                else 
                                                $vv=$tdname; 
                                              echo $vv;
                                            ?> 
                                             </span>
                                             </span>
                                          </a>
                                            <span class="repl pull-right" id="del<?php echo $tdid ?>" style="cursor: pointer;">
                                            <i class="icon md-recycle" style="font-size:10px;" ></i></a>
                                            </span>
                               
                                        </div>    
                                       

                                        <?php    }  }
                                        else {  ?>
                                    
                                      <?php $query="SELECT * from td where d_id=$id order by td_id desc"  ;
                                       $res=mysqli_query($conn,$query);
                                        $r=mysqli_fetch_assoc($res);
                                            $tdid=$r['td_id'];
                                            $tdname=$r['td_title'];
                                            $tdfile=$r['td_file']; ?>
                                      <div id="no" style='color:#242221;margin-left:45px'>Any attache posted yet<br></div>
                                       <br><a  id="io<?php echo $id ?>" href="<?php echo "downloadtd.php?td_id=".$tdid ?>" style="text-decoration: none;" >

                                        </a>
                                        <?php } ?>
                                         

                                       <br>
                                        <div id="butt<?php echo $id ?>" style="cursor: pointer;" >&ensp;You want to Add TD  ?&ensp;&ensp;<img src="images/add.png" width="20px" height="20px"></div>

                                          <form method="POST" action="<?php echo "savetd.php?c_id=".$timely."&d_id=".$id ?>" enctype="multipart/form-data" class="ajax" id="form">
                                          <div id="test<?php echo $id ?>"  style="display: none">
                                          <div id="an<?php  echo $id ?>" style="margin-left:260px"><img src="images/an.png" width="15px" height="15px"></div>
                                          <div class="test-upload uk-placeholder uk-text-center"  >

                                              <label for="file<?php echo $id ?>">
                                                <img src="images/ok.png" width="20px" height="20px">
                                                <span style="color:white">&ensp;&ensp;<div>Upload files </div></span>
                                              </label>
                                        
                                            <input  type="file" id="file<?php echo $id ?>"
                                                    name="td_file" 

                                                    onchange='
                                                    if(this.value.length > 15){
                                                      var val=this.value.substr(0,12)+"...";  
                                                    }
                                                    else {
                                                     var val=this.value;
                                                    }
                                                    $("[id=tl<?php  echo $id ?>]").slideDown();
                                                     $("[id=aff<?php  echo $id ?>]").show();
                                                     $("[id=kl<?php  echo $id ?>]").hide();
                                                    document.getElementById("aff<?php echo $id ?>").innerHTML=val ;
                                                    
                                                
                                               
                                                   
                                           

                                                    '> 
                                                    <div id="aff<?php echo $id ?>"></div>
                                                    <div id="doc<?php echo $id ?>"></div>
                                                    
                                          </div>

                                          <div class='form-password' id="tl<?php  echo $id ?>" style="display: none;margin-top: 0px;">
                                            <span style="font-size: 13px;margin: 0px;padding: 0px">Add Title :&ensp;</span>
                                            <input type="text" name="td_title" id='text<?php echo $id ?>' style="background-color:transparent;border: 1px solid #0080FF;height:20px;width:217px;"
                                             onchange='
                                             $("[id=klt<?php  echo $id ?>]").hide(); '>
                                          </div>

                                          <div id="kl<?php   echo $id ?>" style="display: none;margin-left: 90px">
                                            <span  style="color: red;">you have to select file !</span>
                                          </div><br>
                                           <div id="klt<?php   echo $id ?>" style="display: none;margin-left: 80px">
                                            <span  style="color: red;" >you have to add title !</span>
                                          </div><br>
                                     
                                        <div  class="form-submit uk-text-center">
                                              <input type="submit" value="Post"  id="sb<?php echo $id ?>" class="mc-btn-2 btn-style-2">
                                        </div>

                                        <div id="loader" style="display: none"> <img src="images/loader.gif" alt="loader"></div>
                                         <div id=lo></div>
                                        </div>

                                      </form>

                                       <br><img src="images/des4.png" width="20px" height="20px">&ensp;&ensp;Description  : <br><div style="font-size: 13.5px;margin-left:35px"><?php echo $row1["d_description"] ?></div>

                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $id ?>" type="button">Close</button>


                                    </div>
                                  </div>
                                 
                                       <script src="jquery/jquery.js"></script>
                                                  <script src="jquery/jquery.form.min.js"></script>
                                                  <script type="text/javascript">

                                                      $("[id=del<?php  echo $tdid ?>]").click(function() {
                                                        var nom = '<?php echo $tdid; ?>';
                                                        $.post("deletetd.php",{del:'296'},function(data){
                                                            $.ajax({
                                                                   url: 'deletetd.php',
                                                                   success: function () {
                                                                   $("[id=tdt<?php  echo $tdid ?>]").slideUp();
                                                                  
                                                                   }
                                                                   })

                                                        });
                                                        
                                                         
                                                                         
                                                        
                                                       

                                                     
                                                      });
                                               



                                                      $("[id=butt<?php  echo $id ?>]").click(function(){
                                                      $("[id=test<?php echo $id ?>]").slideDown();
                                                      $("[id=butt<?php  echo $id ?>]").hide();
                                                      $("[id=an<?php  echo $id ?>]").show();
                                                    
                                                      
                                                  
                                                    });
                                                                             

                                                       $("[id=close<?php echo $id ?>]").click(function(){
                                                        $("[id=test<?php echo $id ?>]").hide();
                                                        $("[id=butt<?php  echo $id ?>]").show();
                                                         $("[id=aff<?php  echo $id ?>]").hide();
                                                        $("[id=tl<?php  echo $id ?>]").hide();
                                                        $("[id=kl<?php  echo $id ?>]").hide();
                                                        $("[id=klt<?php  echo $id ?>]").hide();
                                                        document.getElementById("text<?php echo $id ?>").value='';
                                                        document.getElementById("file<?php echo $id ?>").value='';




                                                      });
                                                       $("[id=an<?php echo $id ?>]").click(function(){
                                                        $("[id=an<?php  echo $id ?>]").hide();
                                                        $("[id=test<?php echo $id ?>]").slideUp();
                                                        $("[id=butt<?php  echo $id ?>]").show();
                                                        $("[id=aff<?php  echo $id ?>]").hide();
                                                        $("[id=tl<?php  echo $id ?>]").hide();
                                                        $("[id=kl<?php  echo $id ?>]").hide();
                                                        $("[id=klt<?php  echo $id ?>]").hide();
                                                        document.getElementById("text<?php echo $id ?>").value='';
                                                        document.getElementById("file<?php echo $id ?>").value='';

                                                  

                                                      });
                                                       
                                                      $("[id=sb<?php echo $id ?>]").click(function(){
                                                        if (document.getElementById("file<?php echo $id ?>").value=='')
                                                        {
                                                          $("[id=kl<?php   echo $id ?>]"  ).slideDown();
                                                        }
                                                        else if (document.getElementById("text<?php echo $id ?>").value==''){
                                                          $("[id=klt<?php   echo $id ?>]"  ).slideDown();
                                                        }
                                                        else{
                                                          
                                                        $("[id=test<?php echo $id ?>]").slideUp(function(){
                                                          document.getElementById("text<?php echo $id ?>").value='';
                                                          $("[id=aff<?php  echo $id ?>]").hide();
                                                          $("[id=no").hide();
                                                        });

                                                      

                                                      var c = document.getElementById("text<?php echo $id ?>").value;
                                                      $("#io<?php echo $id ?>").prepend('<div><img src="images/des3.png" width="15px" height="15px">&ensp;&ensp;<span id="'+c+'"  style="font-size: 13px"></span></div>').slideDown('slow');
                                                      document.getElementById(c).innerHTML=' '+document.getElementById("text<?php echo $id ?>").value ;


                                                          $("[id=butt<?php echo $id ?>]").show().click(function(){
                                                            $("#u<?php echo $id ?>").hide();
                                                            $("#r<?php echo $id ?>").show();

                                                          }); 
                                                          
                                                        }
                                                                                         
                                                       });
                                                    

                                                  </script>

                         <?php } } } 
                              else {?> <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                             There is no lecutre note in <b><?php  echo "$cname" ?></b> course
                            
                              </td>
                           
                              
                            </tr>  
 </table>
                              <?php  }?>
                     
                      </table>
                   
               
                      </div>
                                  
                              
     
                              
                               
                         

                    <!-- MY SUBMISSIONS -->
              <div class="tab-pane fade" id="homeworkannouncement">
                    <?php
                            $sql1="SELECT * FROM doc where d_type ='HomeWork Announcment' and c_id = '$timely' order by d_id desc  "; 
                              $result1=mysqli_query($conn,$sql1);
                              if(mysqli_num_rows($result1))
                                {   
                                  ?>
                       <table class="mc-table">
                                <thead >
                                  <tr >
                                    <th class="submissions"><span class="gris">&ensp;&ensp;Title</span></th>
                                    <th class="total-subm"><span class="gris">Post date </span></th>
                                    <th class="latest-reply"><span class="gris"></span></th>
                                  </tr>
                                </thead>

                          <?php
                            
                                while($row1=mysqli_fetch_assoc($result1))
                                  { 
                                    $id = $row1['d_id'];
                                    $name = $row1['d_file'];
                                    $path = $row1['f_path'];
                                    $row1['c_id'] = $timely ;
                         
                                  if ($_SESSION["m_role"] == 'Student'){ ?>
                            <tr > 
                              <td   class="submissions uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-reveal<?php echo $id ?>">
                          
                                <a href="<?php echo "coursedetails.php?c_id=".$timely."&d_id" ?>" > 
                                  <img src="images/lecture2.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["d_title"] ?></span>
                                </a>
                            
                              </td>
                              <td class="total-subm"><span class="gris"><?php echo $row1["d_postdate"] ?></span></td>
                              <td class="latest-reply">
                                 <a href="<?php echo "download.php?d_id=".$id."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>
                            </tr>  

                                     <?php 
                                      $sql_1="SELECT * FROM sub_doc where d_id =$id and sh_posterid = $_SESSION[m_nId]"; 
                                        $result_1=mysqli_query($conn,$sql_1);
                                        $row_1=mysqli_fetch_assoc($result_1);
                                        $subid=$row_1['sh_id'];
                                     
                                 ?>
                                  
                                

                                 <div id="offcanvas-reveal<?php echo $id ?>"   uk-offcanvas="mode: reveal; overlay: true">
                                      <div class="uk-offcanvas-bar" style="background-color: #024A87">

                                          <h3>Title</h3>
                                        <h4><?php echo $row1["d_title"] ?></h4>
                                        <img src="images/dd5.png" width="20px" height="20px">&ensp;&ensp;Due date  :&ensp;<?php echo $row1["d_sdl"] ?><br><br>
                                        <img src="images/tr1.png" width="20px" height="20px">&ensp;&ensp;Time remaining  :<br>&ensp;&ensp;&ensp;&ensp;&ensp;
                                        <?php  
                                            date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($row1["d_sdl"]);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                            if($date>$dt)
                                            {
                                              echo "<span style='color:red;'>Time Out !!</span>";
                                            }
                                            else
                                            {
                                              $interval = $dt->diff($date);
                                              $h = $interval->format('%h');
                                              $d = $interval->format('%d');
                                              $m = $interval->format('%m');
                                              $y = $interval->format('%y');
                                              $s = $interval->format('%s');
                                            
                                                                                             
                                               if ($y==0) 
                                               {
                                                  if ($m==0) 
                                                  {
                                                    if($d<=3)
                                                    {
                                                      if ($d<1) 
                                                      {
                                                        echo $interval->format('<span style="color:#FF4500">%d Days, %h Hours, %i minutes</span>');
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format('<span style="color:#FFA500">%d Days, %h Hours, %i minutes</span>');
                                                      }
                                                    }else
                                                    {
                                                      echo $interval->format('<span style="color:#7BBF28">%d Days, %h Hours, %i minutes</span>');
                                                    }
                                                  }else 
                                                  {
                                                    echo $interval->format('<span style="color:#7BBF28">%m Month, %d Days, %h Hours, %i minutes</span>');
                                                  }
                                                
                                               }
                                                else{
                                                  echo $interval->format('<span style="color:#7BBF28">%y years,%m Month, %d Days, %h Hours, %i minutes</span>');
                                                }
                                            }

                                        ?>
                                        <br><br>

                                        <?php if(mysqli_num_rows($result_1)){
                                            ?>
                                         <img src="images/sub.png" width="25px" height="25px">&ensp;&ensp;Submission  :&ensp;&ensp;
                                         <span id="img1<?php echo $id ?>" style="display: none"><img src="images/notsub.png" width="25px" height="25px"></span>
                                         <span id="img2<?php echo $id ?>">
                                       
                                          <img src="images/okok.png" width="25px" height="25px">
                                        </span>
                                        <a href="<?php echo "downloadsub.php?sh_id=".$subid.""?>" style="text-decoration: none" >
                                          <span id="doc<?php echo $id ?>" style="color: #7BBF28;margin-left:10px">
                                            <?php
                                                if(strlen($row_1["sh_file"]) > 15)
                                                {
                                                echo substr($row_1["sh_file"],0,12)."...";
                                                }
                                                else 
                                                echo $row_1["sh_file"]; 
                                            ?> 
                                          </span>
                                        </a>
                                        <span id="doc1<?php echo $id ?>" style="font-size: 14px;margin-left:10px" ></span>
                                        
                                        
                                     
                                        <?php } else {?>
                                         <img src="images/sub.png" width="25px" height="25px">&ensp;&ensp;Submission  :&ensp;&ensp;
                                         <span id="img1<?php echo $id ?>" ><img src="images/notsub.png" width="25px" height="25px"></span>
                                         <span id="img2<?php echo $id ?>"style="display: none">
                                        
                                          <img src="images/okok.png" width="25px" height="25px">
                                        </span>
                                        <a href="<?php echo "downloadsub.php?sh_id=".$subid.""?>" style="text-decoration: none" >
                                          <span id="doc<?php echo $id ?>" style="color: #7BBF28;margin-left:10px">
                                             <?php
                                                if(strlen($row_1["sh_file"]) > 15)
                                                {
                                                echo substr($row_1["sh_file"],0,12)."...";
                                                }
                                                else 
                                                echo $row_1["sh_file"]; 
                                            ?> 
                                          
                                          </span>
                                        </a>
                                        <span id="doc1<?php echo $id ?>" style="font-size: 14px;margin-left:10px" >

                                        </span>
                                        <?php  }?>
                                        
                                       

                                        <br><br><img src="images/des4.png" width="20px" height="20px">&ensp;&ensp;Description  : <br><div style="font-size: 13.5px;margin-left:35px"><?php echo $row1["d_description"] ?></div><br><br><br>

                                        
                                          <?php if(mysqli_num_rows($result_1)){ ?>
                                        <form method="POST" action="<?php echo "savesub.php?c_id=".$timely."&d_id=".$id ?>" enctype="multipart/form-data" class="ajax" id="form">
                                        <div id="test<?php echo $id ?>"  style="display: none">
                                        
                                            <div class="test-upload uk-placeholder uk-text-center" >
                                            
                                            
                                              <label for="file<?php echo $id ?>">
                                                <img src="images/ok.png" width="25px" height="25px">
                                                <span style="color:white">&ensp;&ensp;<div id="u<?php echo $id ?>">Upload files </div><div id="r<?php echo $id ?>" style="display: none;">Change files</div></span>
                                              </label>
                                        
                                            <input  type="file" id="file<?php echo $id ?>"
                                                    name="sh_file" 

                                                    onchange='
                                                    if(this.value.length > 15){
                                                      var val=this.value.substr(0,12)+"...";  
                                                    }
                                                    else {
                                                     var val=this.value;
                                                    }
                                                    document.getElementById("aff<?php echo $id ?>").innerHTML="File Selected : <br> "+val ;
                                                    document.getElementById("doc1<?php echo $id ?>").innerHTML=val;
                                                    document.getElementById("doc<?php echo $id ?>").innerHTML =val;
                                                    $("[id=doc<?php  echo $id ?>]").hide();
                                                    $("[id=aff<?php  echo $id ?>]").show();
                                                    $("[id=doc1<?php  echo $id ?>]").show(); '> 
                                                    <div id="aff<?php echo $id ?>"></div>
                                                    <div id="doc<?php echo $id ?>"></div>
                                                   
                                            </div>
                                        <div id="kl<?php   echo $id ?>" style="display: none"><span  style="color: red;" >&ensp;&ensp;&ensp;&ensp;you have to select file !</span></div><br>
            
                                            <div  class="form-submit uk-text-center">
                                              <input type="submit" value="Post"  id="sb<?php echo $id ?>" class="mc-btn-2 btn-style-2">
                                             </div>
                                         </div>
                                         <?php  
                                            date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($row1["d_sdl"]);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                            if($date>$dt)
                                            {
                                              echo "<span style='color:red;'>You Cannot Change any documents! </span>";
                                            }
                                            else
                                            { ?>
                                         <div id="butt<?php echo $id ?>" style="cursor: pointer;" >&ensp;Do you want to change file ?&ensp;&ensp;<img src="images/re.png" width="25px" height="25px"></div>
                                                <?php } ?>
                                                <div id="loader" style="display: none"> <img src="images/loader.gif" alt="loader"></div>
                                         <div id=lo></div>
                                      </form>
                                      

                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $id ?>" type="button">Close</button>


                                                <script src="jquery/jquery.js"></script>
                                                  <script src="jquery/jquery.form.min.js"></script>
                                                  <script type="text/javascript">
                                                      $("[id=butt<?php  echo $id ?>]").click(function(){
                                                      $("[id=test<?php echo $id ?>]").slideDown();
                                                      $("[id=butt<?php  echo $id ?>]").hide();
                                                      $("#u<?php echo $id ?>").hide();
                                                      $("#r<?php echo $id ?>").show();
                                                      $("#aff<?php echo $id ?>").show();
                                                  
                                                    });
                                                                             

                                                       $("[id=close<?php echo $id ?>]").click(function(){
                                                        $("[id=test<?php echo $id ?>]").slideUp();
                                                        $("[id=butt<?php  echo $id ?>]").show();

                                                      });
                                                       
                                                      $("[id=sb<?php echo $id ?>]").click(function(){
                                                        if (document.getElementById("file<?php echo $id ?>").value=='')
                                                        {
                                                         
                                                          $("[id=kl<?php   echo $id ?>]"  ).slideDown();
                                                             
                                                        }
                                                        else{
                                                        $("[id=test<?php echo $id ?>]").slideUp();
                                                         $("#img1<?php echo $id ?>").hide();
                                                          $("#img2<?php echo $id ?>").show();
                                                          $("#doc<?php echo $id ?>").show();
                                                          $("#doc1<?php echo $id ?>").hide();

                                                          
                                                       
                                                          $("[id=butt<?php echo $id ?>]").show().click(function(){
                                                            $("#u<?php echo $id ?>").hide();
                                                            $("#r<?php echo $id ?>").show();

                                                          }); 
                                                        }
                                                                                            
                                                       });
                                                    

                                                  </script>
                                            <?php } else {?>
                                            <form method="POST" action="<?php echo "savesub.php?c_id=".$timely."&d_id=".$id ?>" enctype="multipart/form-data" class="ajax" id="form">

                                        <?php  
                                            date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($row1["d_sdl"]);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                            if($date>$dt)
                                            {
                                              echo "<span style='color:red;'>You Cannot upload any documents! </span>";
                                            }
                                            else
                                            { ?>
                                              
                                           



                                               <div id="test1<?php echo $id ?>">
                                        
                                            <div class="test-upload uk-placeholder uk-text-center" >
                                            
                                            
                                              <label for="file<?php echo $id ?>">
                                                <img src="images/ok.png" width="25px" height="25px">
                                                <span style="color:white">&ensp;&ensp;<div id="u<?php echo $id ?>">Upload files </div><div id="r<?php echo $id ?>" style="display: none;">Change files</div></span>
                                              </label>
                                          
                                            <input  type="file" id="file<?php echo $id ?>"
                                                    name="sh_file" 
                                                    onchange='
                                                    if(this.value.length > 15){
                                                      var val=this.value.substr(0,12)+"..."; 
                                                    }
                                                    else {
                                                     var val=this.value;
                                                    }
                                                    document.getElementById("aff<?php echo $id ?>").innerHTML="File Selected : <br> "+val ;
                                                    document.getElementById("doc1<?php echo $id ?>").innerHTML=val;
                                                    document.getElementById("doc<?php echo $id ?>").innerHTML =val;
                                                    $("[id=doc<?php  echo $id ?>]").hide();
                                                    $("[id=aff<?php  echo $id ?>]").show();
                                                    $("[id=doc1<?php  echo $id ?>]").show(); '> 
                                                    <div id="aff<?php echo $id ?>"></div>
                                            </div>
                                            <div id="kl<?php   echo $id ?>" style="display: none"><span  style="color: red;" >&ensp;&ensp;&ensp;&ensp;you have to select file !</span></div><br>
            
                                            <div  class="form-submit uk-text-center">
                                              <input type="submit" value="Post" id="sb1<?php echo $id ?>" class="mc-btn-2 btn-style-2">
                                             </div>
                                         </div>
                                         <div id="butt<?php echo $id ?>" style="display: none; cursor: pointer;" >&ensp;Do you want to change file ?&ensp;&ensp;<img src="images/re.png" width="25px" height="25px"></div>
                                          <?php }
                                        ?>
                                         <div id="loader" style="display: none"> <img src="images/loader.gif" alt="loader"></div>
                                         <div id=lo></div>
                                      </form>
                                     
                                       <script type="text/javascript"> </script>
                                    
                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $id ?>" type="button">Close</button>
                                            <script src="jquery/jquery.js"></script>
                                                  <script src="jquery/jquery.form.min.js"></script>
                                                  <script type="text/javascript">

                                                      $("[id=butt<?php      echo $id ?>]" ).click(function()
                                                      {
                                                        $("[id=test1<?php   echo $id ?>]"  ).slideDown();
                                                        $("[id=butt<?php    echo $id ?>]"  ).hide();
                                                        $("[id=u<?php       echo $id ?>]"  ).hide();
                                                        $("[id=r<?php       echo $id ?>]"  ).show();
                                                      });
                                                                                                                                                    
                                                       
                                                      $("[id=sb1<?php       echo $id ?>]"  ).click(function()
                                                      {
                                                        if (document.getElementById("file<?php echo $id ?>").value=='')
                                                        {
                                                         
                                                          $("[id=kl<?php   echo $id ?>]"  ).slideDown();
                                                             
                                                        }
                                                        else{
                                                          $("[id=test1<?php   echo $id ?>]"  ).slideUp();
                                                          $("[id=img1<?php    echo $id ?>]"  ).hide();
                                                          $("[id=img2<?php    echo $id ?>]"  ).show();
                                                          $("[id=doc<?php     echo $id ?>]"  ).show();
                                                          $("[id=aff<?php     echo $id ?>]"  ).hide();
                                                          $("[id=doc1<?php    echo $id ?>]"  ).hide();
                                                          $("[id=butt<?php    echo $id ?>]"  ).show();
                                                          $("[id=kl<?php   echo $id ?>]"  ).hide();
                                                          $("[id=butt<?php    echo $id ?>]"  ).click(function()
                                                          {
                                                            $("[id=u<?php     echo $id ?>]"  ).hide();
                                                            $("[id=r<?php     echo $id ?>]"  ).show();
                                                          });
                                                        }
                                                      });

                                                      </script>
                                            <?php  }?>
                                    </div>
                                  </div>

                            <?php }

                            else {  ?>

                                 <tr class="new"> 
                               <td>
                          
                                <a href=" <?php echo "sub_doc.php?c_id=".$timely."&d_id=".$id."" ?>" > 
                                  <img src="images/lecture2.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["d_title"] ?></span>
                                </a>
                            
                              </td>
                              <td class="total-subm"><span class="gris"><?php echo $row1["d_postdate"] ?></span></td>
                              <td class="latest-reply">
                                 <a href="<?php echo "download.php?d_id=".$id."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>
                                 <td class="repl">
                                            <a href="<?php echo "coursedetails.php?c_id=".$timely."&del=".$id."" ?>"  title="delete"  >
                                            <i class="icon md-recycle" style="font-size:15px; color:#139DF0" ></i></a>
                                        </td>
                              
                            </tr>  
                     

                         <?php } } } 
                              else {?> <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                             There is no home work in <b><?php  echo "$cname" ?> </b> course
                            
                              </td>
                           
                              
                            </tr>  
 </table>
                              <?php  }?>
                     
                      </table>
                </div>
                    
                    <!-- END / MY SUBMISSIONS -->

              <!-- MY SUBMISSIONS -->
              <div class="tab-pane fade" id="projectannouncement">
                    <?php
                            $sql1="SELECT * FROM doc where d_type ='Project Announcment' and c_id = '$timely' order by d_id desc  "; 
                              $result1=mysqli_query($conn,$sql1);
                              if(mysqli_num_rows($result1))
                                {   
                                  ?>
                        <table class="mc-table">
                                <thead >
                                  <tr >
                                    <th class="submissions"><span class="gris">&ensp;&ensp;Title</span></th>
                                    <th class="total-subm"><span class="gris">Post date </span></th>
                                    <th class="latest-reply"><span class="gris"></span></th>
                                  </tr>
                                </thead>

                          <?php
                            
                                while($row1=mysqli_fetch_assoc($result1))
                                  { 
                                    $id = $row1['d_id'];
                                    $name = $row1['d_file'];
                                    $path = $row1['f_path'];
                                    $row1['c_id'] = $timely ;
                         
                                  if ($_SESSION["m_role"] == 'Student'){ ?>
                            <tr > 
                              <td   class="submissions uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-reveal<?php echo $id ?>">
                          
                                <a href="<?php echo "coursedetails.php?c_id=".$timely."&d_id" ?>" > 
                                  <img src="images/lecture2.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["d_title"] ?></span>
                                </a>
                            
                              </td>
                              <td class="total-subm"><span class="gris"><?php echo $row1["d_postdate"] ?></span></td>
                              <td class="latest-reply">
                                 <a href="<?php echo "download.php?d_id=".$id."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>
                            </tr>  

                                     <?php 
                                      $sql_1="SELECT * FROM sub_doc where d_id =$id and sh_posterid = $_SESSION[m_nId]"; 
                                        $result_1=mysqli_query($conn,$sql_1);
                                        $row_1=mysqli_fetch_assoc($result_1);
                                        $subid=$row_1['sh_id'];
                                     
                                 ?>
                                  
                                

                                 <div id="offcanvas-reveal<?php echo $id ?>"   uk-offcanvas="mode: reveal; overlay: true">
                                      <div class="uk-offcanvas-bar" style="background-color: #024A87">

                                          <h3>Title</h3>
                                        <h4><?php echo $row1["d_title"] ?></h4>
                                        <img src="images/dd5.png" width="20px" height="20px">&ensp;&ensp;Due date  :&ensp;<?php echo $row1["d_sdl"] ?><br><br>
                                        <img src="images/tr1.png" width="20px" height="20px">&ensp;&ensp;Time remaining  :<br>&ensp;&ensp;&ensp;&ensp;&ensp;
                                        <?php  
                                            date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($row1["d_sdl"]);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                            if($date>$dt)
                                            {
                                              echo "<span style='color:red;'>Time Out !!</span>";
                                            }
                                            else
                                            {
                                              $interval = $dt->diff($date);
                                              $h = $interval->format('%h');
                                              $d = $interval->format('%d');
                                              $m = $interval->format('%m');
                                              $y = $interval->format('%y');
                                              $s = $interval->format('%s');
                                            
                                                                                             
                                               if ($y==0) 
                                               {
                                                  if ($m==0) 
                                                  {
                                                    if($d<=3)
                                                    {
                                                      if ($d<1) 
                                                      {
                                                        echo $interval->format('<span style="color:#FF4500">%d Days, %h Hours, %i minutes</span>');
                                                      }
                                                      else 
                                                      {
                                                        echo $interval->format('<span style="color:#FFA500">%d Days, %h Hours, %i minutes</span>');
                                                      }
                                                    }else
                                                    {
                                                      echo $interval->format('<span style="color:#7BBF28">%d Days, %h Hours, %i minutes</span>');
                                                    }
                                                  }else 
                                                  {
                                                    echo $interval->format('<span style="color:#7BBF28">%m Month, %d Days, %h Hours, %i minutes</span>');
                                                  }
                                                
                                               }
                                                else{
                                                  echo $interval->format('<span style="color:#7BBF28">%y years,%m Month, %d Days, %h Hours, %i minutes</span>');
                                                }
                                            }

                                        ?>
                                        <br><br>

                                        <?php if(mysqli_num_rows($result_1)){
                                            ?>
                                         <img src="images/sub.png" width="25px" height="25px">&ensp;&ensp;Submission  :&ensp;&ensp;
                                         <span id="img1<?php echo $id ?>" style="display: none"><img src="images/notsub.png" width="25px" height="25px"></span>
                                         <span id="img2<?php echo $id ?>">
                                       
                                          <img src="images/okok.png" width="25px" height="25px">
                                        </span>
                                        <a href="<?php echo "downloadsub.php?sh_id=".$subid.""?>" style="text-decoration: none" >
                                          <span id="doc<?php echo $id ?>" style="color: #7BBF28;margin-left:10px">
                                            <?php
                                                if(strlen($row_1["sh_file"]) > 15)
                                                {
                                                echo substr($row_1["sh_file"],0,12)."...";
                                                }
                                                else 
                                                echo $row_1["sh_file"]; 
                                            ?> 
                                          </span>
                                        </a>
                                        <span id="doc1<?php echo $id ?>" style="font-size: 14px;margin-left:10px" ></span>
                                        
                                        
                                     
                                        <?php } else {?>
                                         <img src="images/sub.png" width="25px" height="25px">&ensp;&ensp;Submission  :&ensp;&ensp;
                                         <span id="img1<?php echo $id ?>" ><img src="images/notsub.png" width="25px" height="25px"></span>
                                         <span id="img2<?php echo $id ?>"style="display: none">
                                        
                                          <img src="images/okok.png" width="25px" height="25px">
                                        </span>
                                        <a href="<?php echo "downloadsub.php?sh_id=".$subid.""?>" style="text-decoration: none" >
                                          <span id="doc<?php echo $id ?>" style="color: #7BBF28;margin-left:10px">
                                             <?php
                                                if(strlen($row_1["sh_file"]) > 15)
                                                {
                                                echo substr($row_1["sh_file"],0,12)."...";
                                                }
                                                else 
                                                echo $row_1["sh_file"]; 
                                            ?> 
                                          
                                          </span>
                                        </a>
                                        <span id="doc1<?php echo $id ?>" style="font-size: 14px;margin-left:10px" >

                                        </span>
                                        <?php  }?>
                                        
                                       

                                        <br><br><img src="images/des4.png" width="20px" height="20px">&ensp;&ensp;Description  : <br><div style="font-size: 13.5px;margin-left:35px"><?php echo $row1["d_description"] ?></div><br><br><br>

                                        
                                          <?php if(mysqli_num_rows($result_1)){ ?>
                                        <form method="POST" action="<?php echo "savesub.php?c_id=".$timely."&d_id=".$id ?>" enctype="multipart/form-data" class="ajax" id="form">
                                        <div id="test<?php echo $id ?>"  style="display: none">
                                        
                                            <div class="test-upload uk-placeholder uk-text-center" >
                                            
                                            
                                              <label for="file<?php echo $id ?>">
                                                <img src="images/ok.png" width="25px" height="25px">
                                                <span style="color:white">&ensp;&ensp;<div id="u<?php echo $id ?>">Upload files </div><div id="r<?php echo $id ?>" style="display: none;">Change files</div></span>
                                              </label>
                                        
                                            <input  type="file" id="file<?php echo $id ?>"
                                                    name="sh_file" 

                                                    onchange='
                                                    if(this.value.length > 15){
                                                      var val=this.value.substr(0,12)+"...";  
                                                    }
                                                    else {
                                                     var val=this.value;
                                                    }
                                                    document.getElementById("aff<?php echo $id ?>").innerHTML="File Selected : <br> "+val ;
                                                    document.getElementById("doc1<?php echo $id ?>").innerHTML=val;
                                                    document.getElementById("doc<?php echo $id ?>").innerHTML =val;
                                                    $("[id=doc<?php  echo $id ?>]").hide();
                                                    $("[id=aff<?php  echo $id ?>]").show();
                                                    $("[id=doc1<?php  echo $id ?>]").show(); '> 
                                                    <div id="aff<?php echo $id ?>"></div>
                                                    <div id="doc<?php echo $id ?>"></div>
                                                   
                                            </div>
                                        <div id="kl<?php   echo $id ?>" style="display: none"><span  style="color: red;" >&ensp;&ensp;&ensp;&ensp;you have to select file !</span></div><br>
            
                                            <div  class="form-submit uk-text-center">
                                              <input type="submit" value="Post"  id="sb<?php echo $id ?>" class="mc-btn-2 btn-style-2">
                                             </div>
                                         </div>
                                         <?php  
                                            date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($row1["d_sdl"]);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                            if($date>$dt)
                                            {
                                              echo "<span style='color:red;'>You Cannot Change any documents! </span>";
                                            }
                                            else
                                            { ?>
                                         <div id="butt<?php echo $id ?>" style="cursor: pointer;" >&ensp;Do you want to change file ?&ensp;&ensp;<img src="images/re.png" width="25px" height="25px"></div>
                                                <?php } ?>
                                                <div id="loader" style="display: none"> <img src="images/loader.gif" alt="loader"></div>
                                         <div id=lo></div>
                                      </form>
                                      

                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $id ?>" type="button">Close</button>


                                                <script src="jquery/jquery.js"></script>
                                                  <script src="jquery/jquery.form.min.js"></script>
                                                  <script type="text/javascript">
                                                      $("[id=butt<?php  echo $id ?>]").click(function(){
                                                      $("[id=test<?php echo $id ?>]").slideDown();
                                                      $("[id=butt<?php  echo $id ?>]").hide();
                                                      $("#u<?php echo $id ?>").hide();
                                                      $("#r<?php echo $id ?>").show();
                                                      $("#aff<?php echo $id ?>").show();
                                                  
                                                    });
                                                                             

                                                       $("[id=close<?php echo $id ?>]").click(function(){
                                                        $("[id=test<?php echo $id ?>]").slideUp();
                                                        $("[id=butt<?php  echo $id ?>]").show();

                                                      });
                                                       
                                                      $("[id=sb<?php echo $id ?>]").click(function(){
                                                        if (document.getElementById("file<?php echo $id ?>").value=='')
                                                        {
                                                         
                                                          $("[id=kl<?php   echo $id ?>]"  ).slideDown();
                                                             
                                                        }
                                                        else{
                                                        $("[id=test<?php echo $id ?>]").slideUp();
                                                         $("#img1<?php echo $id ?>").hide();
                                                          $("#img2<?php echo $id ?>").show();
                                                          $("#doc<?php echo $id ?>").show();
                                                          $("#doc1<?php echo $id ?>").hide();

                                                          
                                                       
                                                          $("[id=butt<?php echo $id ?>]").show().click(function(){
                                                            $("#u<?php echo $id ?>").hide();
                                                            $("#r<?php echo $id ?>").show();

                                                          }); 
                                                        }
                                                                                            
                                                       });
                                                    

                                                  </script>
                                            <?php } else {?>
                                            <form method="POST" action="<?php echo "savesub.php?c_id=".$timely."&d_id=".$id ?>" enctype="multipart/form-data" class="ajax" id="form">

                                        <?php  
                                            date_default_timezone_set('Europe/Istanbul');
                                            $dt = new DateTime($row1["d_sdl"]);

                                            date_default_timezone_set('Europe/Istanbul');
                                            $date = new DateTime(date('y-m-d h:i:s a'));

                                            if($date>$dt)
                                            {
                                              echo "<span style='color:red;'>You Cannot upload any documents! </span>";
                                            }
                                            else
                                            { ?>
                                              
                                           



                                               <div id="test1<?php echo $id ?>">
                                        
                                            <div class="test-upload uk-placeholder uk-text-center" >
                                            
                                            
                                              <label for="file<?php echo $id ?>">
                                                <img src="images/ok.png" width="25px" height="25px">
                                                <span style="color:white">&ensp;&ensp;<div id="u<?php echo $id ?>">Upload files </div><div id="r<?php echo $id ?>" style="display: none;">Change files</div></span>
                                              </label>
                                          
                                            <input  type="file" id="file<?php echo $id ?>"
                                                    name="sh_file" 
                                                    onchange='
                                                    if(this.value.length > 15){
                                                      var val=this.value.substr(0,12)+"..."; 
                                                    }
                                                    else {
                                                     var val=this.value;
                                                    }
                                                    document.getElementById("aff<?php echo $id ?>").innerHTML="File Selected : <br> "+val ;
                                                    document.getElementById("doc1<?php echo $id ?>").innerHTML=val;
                                                    document.getElementById("doc<?php echo $id ?>").innerHTML =val;
                                                    $("[id=doc<?php  echo $id ?>]").hide();
                                                    $("[id=aff<?php  echo $id ?>]").show();
                                                    $("[id=doc1<?php  echo $id ?>]").show(); '> 
                                                    <div id="aff<?php echo $id ?>"></div>
                                            </div>
                                            <div id="kl<?php   echo $id ?>" style="display: none"><span  style="color: red;" >&ensp;&ensp;&ensp;&ensp;you have to select file !</span></div><br>
            
                                            <div  class="form-submit uk-text-center">
                                              <input type="submit" value="Post" id="sb1<?php echo $id ?>" class="mc-btn-2 btn-style-2">
                                             </div>
                                         </div>
                                         <div id="butt<?php echo $id ?>" style="display: none; cursor: pointer;" >&ensp;Do you want to change file ?&ensp;&ensp;<img src="images/re.png" width="25px" height="25px"></div>
                                          <?php }
                                        ?>
                                         <div id="loader" style="display: none"> <img src="images/loader.gif" alt="loader"></div>
                                         <div id=lo></div>
                                      </form>
                                     
                                       <script type="text/javascript"> </script>
                                    
                                        <button class="uk-button uk-button-default uk-offcanvas-close uk-width-1-1 uk-margin" id="close<?php echo $id ?>" type="button">Close</button>
                                            <script src="jquery/jquery.js"></script>
                                                  <script src="jquery/jquery.form.min.js"></script>
                                                  <script type="text/javascript">

                                                      $("[id=butt<?php      echo $id ?>]" ).click(function()
                                                      {
                                                        $("[id=test1<?php   echo $id ?>]"  ).slideDown();
                                                        $("[id=butt<?php    echo $id ?>]"  ).hide();
                                                        $("[id=u<?php       echo $id ?>]"  ).hide();
                                                        $("[id=r<?php       echo $id ?>]"  ).show();
                                                      });
                                                                                                                                                    
                                                       
                                                      $("[id=sb1<?php       echo $id ?>]"  ).click(function()
                                                      {
                                                        if (document.getElementById("file<?php echo $id ?>").value=='')
                                                        {
                                                         
                                                          $("[id=kl<?php   echo $id ?>]"  ).slideDown();
                                                             
                                                        }
                                                        else{
                                                          $("[id=test1<?php   echo $id ?>]"  ).slideUp();
                                                          $("[id=img1<?php    echo $id ?>]"  ).hide();
                                                          $("[id=img2<?php    echo $id ?>]"  ).show();
                                                          $("[id=doc<?php     echo $id ?>]"  ).show();
                                                          $("[id=aff<?php     echo $id ?>]"  ).hide();
                                                          $("[id=doc1<?php    echo $id ?>]"  ).hide();
                                                          $("[id=butt<?php    echo $id ?>]"  ).show();
                                                          $("[id=kl<?php   echo $id ?>]"  ).hide();
                                                          $("[id=butt<?php    echo $id ?>]"  ).click(function()
                                                          {
                                                            $("[id=u<?php     echo $id ?>]"  ).hide();
                                                            $("[id=r<?php     echo $id ?>]"  ).show();
                                                          });
                                                        }
                                                      });

                                                      </script>
                                            <?php  }?>
                                    </div>
                                  </div>

                            <?php }

                            else {  ?>

                                 <tr class="new"> 
                               <td>
                          
                                <a href=" <?php echo "sub_doc.php?c_id=".$timely."&d_id=".$id."" ?>" > 
                                  <img src="images/lecture2.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["d_title"] ?></span>
                                </a>
                            
                              </td>
                              <td class="total-subm"><span class="gris"><?php echo $row1["d_postdate"] ?></span></td>
                              <td class="latest-reply">
                                 <a href="<?php echo "download.php?d_id=".$id."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>
                                 <td class="repl">
                                            <a href="<?php echo "coursedetails.php?c_id=".$timely."&del=".$id."" ?>"  title="delete"  >
                                            <i class="icon md-recycle" style="font-size:15px; color:#139DF0" ></i></a>
                                        </td>
                              
                            </tr>  
                     

                         <?php } } } 
                               else {?> <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                             There is no project in <b><?php  echo "$cname" ?> </b> course
                            
                              </td>
                           
                              
                            </tr>  
 </table>
                       <?php  }?>
                     
                      </table>
                </div> 




<div class="tab-pane fade" id="examresult">
                      <?php
                           $squle="SELECT group_nb FROM member_course WHERE c_id =$key and m_nId=$_SESSION[m_nId]" ;
                                 $resule=mysqli_query($conn,$squle);
                    if(mysqli_num_rows($resule))
                        { ?> 
                        <table class="mc-table">
                                <thead >
                                  <tr >
                                    <th class="submissions"><span class="gris">&ensp;&ensp;Group <?php if (count ($resul)>1)
                                    echo"s" ;?></span></th>
                                   
                                  </tr>
                                </thead>
                          <?php
                                     while($roe=mysqli_fetch_assoc($resule))
                                     { $nb = $roe["group_nb"]; 
                     
                              ?>

                             <tr> 
                               <td>
                          
                                <a href="<?php echo "examresult.php?c_id=".$timely."&group_nb=".$nb ?>" > 
                                  <img src="images/lecture.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo  "$level $cat $nb"?> </span>
                                </a>
                            
                              </td>
                           
                              
                            </tr>  
                     

                         <?php } }  
                             else {?> <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                            You don't have any group in<b><?php  echo "$cname" ?> </b> course
                            
                              </td>
                           
                              
                            </tr>  
 </table>
                       <?php  }?>
                      </table>
                   
              
                      </div>
 
<?php }}?>
            </div>










        </div>
    </section>

</div>
    <!-- END / COURSE CONCERN -->




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






    
       
</script>
<script src="js/uikit-icons.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
<script src="js/jquery.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<script>

    (function ($) {

        var bar = $("#progressbar")[0];

        UIkit.upload('.test-upload', {

            url: '',
            

            beforeSend: function() { console.log('beforeSend', arguments); },
            beforeAll: function() { console.log('beforeAll', arguments); },
            load: function() { console.log('load', arguments); },
            error: function() { console.log('error', arguments); },
            complete: function() { console.log('complete', arguments); },

            loadStart: function (e) {
                console.log('loadStart', arguments);

                bar.removeAttribute('hidden');
                bar.max =  e.total;
                bar.value =  e.loaded;
            },

            progress: function (e) {
                console.log('progress', arguments);

                bar.max =  e.total;
                bar.value =  e.loaded;

            },

            loadEnd: function (e) {
                console.log('loadEnd', arguments);

                bar.max =  e.total;
                bar.value =  e.loaded;
            },

            completeAll: function () {
                console.log('completeAll', arguments);

                setTimeout(function () {
                    bar.setAttribute('hidden', 'hidden');
                }, 1000);

             
            }



        });

    })
    (jQuery);

</script>
<script type="text/javascript">
  function up().submit() {
this.form.submit();
}

</script>
 <script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
        
    });

    </script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
            

                    <script type="text/javascript" src="src/DateTimePicker.js"></script>
    
        <script type="text/javascript">
        
            $(document).ready(function()
            {
                $("#dtBox").DateTimePicker({
                
                    dateFormat: "MM-dd-yyyy",
                    timeFormat: "HH:mm",
                    dateTimeFormat: "MM-dd-yyyy HH:mm:ss AA"
                
                });
            });
        
        </script>
                        <script >

   $("[id=ex2]").click(function(){
                          $("[id=text1]").val('');
                          $("[id=des1]").val('');
                          $("[id=bb]").slideDown();
                          $("[id=ex2]").hide();                                                          
                        });  
                          

                        $("[id=aa]").click(function(){
                          $("[id=bb]").slideUp();
                          $("[id=ex2]").show();
                          $("[id=any]").hide();


                        var c1 = document.getElementById("text1").value;
                        var c2 = document.getElementById("des1").value;
                            

                        $("#topicc").prepend('<li><div class="list-body"><div class="list-content"><ul class="commentlist"><li class="comment"><div class="comment-body"><div class="comment-author"><a href="#"><img style="width : 40px ;height: 40px;"" src="images/<?php echo $kk ?>"></div><div class="comment-content"><cite class="fn sm black bold" style="font-size:15px;"><a href=""><span style="color: #37ABF2"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"] ?></span></a></cite><div class="rr pull-right"><a href="<?php echo "coursedetails.php?c_id=".'$timely'."&deli=".'$dtid'."" ?>"  title="delete" ><i class="material-icons pull-right" style="font-size:20px; color:black">close</i></a></div><p  id="'+c2+'"style="font-size:15px;">'+c2+' </p></div></div><span id="nb" style="color:gray;font-size: 10px;"></span><ul class="children" style="padding: 0px;"  id="in"></ul><ul class="children" style="padding: 0px;" id="inn"></ul><a href="#"><i id="az" style="display: none;" class="material-icons">keyboard_arrow_down</i></a><a id="az0" href="#" style="display: none"><i class="material-icons">keyboard_arrow_up</i></a> <span id="at" style="cursor: pointer;font-size:10px;float: right;color:gray;">Comment</span><span id="at"><i style="cursor: pointer;color:gray;font-size: 15px;float: right" class="material-icons" >question_answer</i></span><hr style="color:#3a7ff5"><div id="att" style="display:none"><div class="post-editor text-form-editor"><textarea name="comm_text" placeholder="Write a comment..." style="height:40px" id="com1" ></textarea></div><br><div class="form-submit"><input type="submit" value="Post" name="comment" id="com" class="mc-btn-2 btn-style-2 pull-right"></div></div></li></ul></div></li>');
                                             
                          document.getElementById(c1).innerHTML=document.getElementById("text1").value ;
                          document.getElementById(c2).innerHTML=document.getElementById("des1").value ;
                          var length1 =$("ul#in").children().length;
                          var length2 =$("ul#inn").children().length;
                          var length=length1+length2;
                          document.getElementById('nb').innerHTML=length+' Comments';
                                                                                       
                         
                         $("[id=at]").click(function () { 
                                  if ($("[id=att]").is(':visible'))
                                  {
                                      $("[id=att]").slideUp();
                                  }
                                  else
                                  {
                                      $("[id=att]").slideDown();
                                      $("[id=com1]").val('');
                                      $("[id=com1]").focus();
                                  }
                                });


                             $("[id=com]").click(function(){
                              $("[id=az]").click(function(){
                                                    $("[id=za]").slideDown();
                                                    $("[id=az]").hide();
                                                    $("[id=az0]").show();

                                                                                                    
                                                  });
                                            $("[id=az0]").click(function(){
                                                  $("[id=za]").slideUp();
                                                  $("[id=az0]").hide();
                                                  $("[id=az]").show();

                                                                                                  
                                                });
                            $("[id=za]").slideDown();
                            $("[id=az]").hide();
                            $("[id=az0]").show();
                            $("[id=att]").slideUp();
                            $("[id=az0]").show();
                            $("[id=az]").hide();

                            var c4 = document.getElementById("com1").value;
                            $("#inn").append('<li id="za" class="comment"><div class="comment-body" ><div class="comment-author" ><cite class="fn sm black bold" style="font-size:10px;margin-left: 15px; color: #37ABF2"><a href=""><img style="width : 20px ;height: 20px;"" src="images/<?php echo $kk ?>"><span style="color: #37ABF2"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"] ?></span></a></cite><span id="'+c4+'" style="font-size:10px; margin-bottom: 0px;margin-left: 15px; color: #666669">'+c4+'</span></div></div></li>');


                               
                            document.getElementById(c4).innerHTML=document.getElementById("com1").value ;
                            var length1 =$("ul#in").children().length;
                                var length2 =$("ul#inn").children().length;
                                var length=length1+length2;
                                document.getElementById('nb').innerHTML=length+' Comments';

                          });

                        });
                      </script>

</body>

</html>