<?php
    include "connect.php";
    session_start();
    
         if (empty($_SESSION['m_nId'])) {
    header('Location: index.php');
    exit();
}

     $nb =$_GET['group_nb'] ;
     $iid=$_GET['d_id'] ;
     $key = $_GET['c_id'] ;
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            { $timely=$row["c_id"];
                            
                            $level=$row["c_level"];
                            $cat=$row["c_cat"] ;
                            $cname=$row["c_fullname"] ;
                           
                           

                
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
    <link rel="stylesheet" type="text/css" href="css/library/animate.css">
    <link rel="stylesheet" type="text/css" href="css/md-font.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/uikit.min.css" />
    
   <link rel="icon" type="image/png" href="images/isamm1.png" />

        <link rel="stylesheet" type="text/css" href="src/DateTimePicker.css" />

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>List Submission documents</title>
</head>
<body id="page-top">
<!-- PAGE WRAP -->
<div id="page-wrap">
    <div class="top-nav">
        <ul class="top-nav-list ">
          <li class="prev-course"><a href="courses.php"></a> </li>
          <li>
            <div  style="display: none" class="test-upload uk-placeholder uk-text-center"></div>
          </li>
         </ul>
        <h4 class="sm black bold" style="margin-left: 30px"><?php echo  $row["c_fullname"]?></h4>

        <ul class="top-nav-list">
        <li class="prev-course"><a href="courses.php"><i class="icon md-angle-left"></i><span class="tooltip">Prev</span></a>
              <li class="discussion-learn">
                <a href="#"><i class="icon md-list"></i><span class="tooltip">Exam Dates</span></a>

           
                <div class="list-item-body outline-learn-body">
                
                <?php if ($_SESSION["m_role"] == 'Instructor' || $_SESSION["m_role"] == 'Administrator' ){ ?> 




                          <div class="section-learn-outline">
                            <h5 class="section-title">Add New Exams Dates</h5>
                            <ul class="section-list">
                              <li id="ex">
                                <div class="list-body" >
                                   <form action="<?php echo "saveexamdate.php?c_id=".$timely."" ?>" class="ajax" method="post" style=""> 
                                      <div class="form-item">
                                    
                                        <select class="form-control" id="sel" name= "ex_type"  >
                                        <option  disabled selected hidden class="text-hide">Exam Type</option>
                                          <option value="Midterm 1 ">Midterm 1</option>
                                          <option value="Midterm 2">Midterm 2</option>
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

                          
                          <?php } ?> 
                     <script src="jquery/jquery.js"></script>
                          <script src="jquery/jquery.form.min.js"></script>

                            <div class="section-learn-outline">
                        <h5 class="section-title">Exams Dates</h5>
                            <?php
                                $sqli="SELECT * FROM examdate where c_id = '$timely' order by ex_id desc"; 
                             $resulti=mysqli_query($conn,$sqli);
                            if(mysqli_num_rows($resulti))
                            { while($rowi=mysqli_fetch_assoc($resulti))
                             { 
                              $id=$rowi['ex_id'];
                             ?>
                        <ul id="hh" class="section-list">
                            <li class="list-body">
                               
                                         
                                      <?php if ($_SESSION["m_role"] == 'Instructor' || $_SESSION["m_role"] == 'Administrator' ){ ?> 
                                          <div class="rr pull-right">  
                                            <a style="cursor: pointer;" class="remove"  data-rowid="<?php echo $id ?>" title="delete"  >
                                            <i class="material-icons pull-right" style="font-size:20px; color:black">close</i></a>
                                          </div>
                                        
                                   
                                        <?php }
                                         if (!empty($rowi["ex_type"])) 
                                         echo "<span style='color:#3C79BA'>".$rowi["ex_type"]."</span>" ?> 
                                         
                                        <h6> <?php
                                        if (!empty($rowi["ex_date"])) 
                                         echo $rowi["ex_date"] ?>  </h6>

                                        <p><?php
                                        if (!empty($rowi["ex_description"])) 
                                         echo $rowi["ex_description"] ?></p>

                           
                              
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

         
 
            <!-- DISCUSSION -->
            <li class="discussion-learn">
                <a href="#"><i class="icon md-comments"></i><span class="tooltip">New Topic</span></a>
                <div class="list-item-body discussion-learn-body">
                    <div class="inner">


                        <div class="form-discussion" >
                        <div id="bb" style="display: none">
                                <form action="<?php echo "savediscussiontopic.php?c_id=".$timely."" ?>" method="post" class="ajax">

                                <div class="post-editor text-form-editor" style="margin-top: 30px">
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
                
                            <li style="display: none">lknjzdx</li>
                            <li id="li_topic<?php echo $dtid ?>" class="del_top">
                                <div class="list-body">
                                  
                                  <div class="list-content">
                                      
                                <ul class="commentlist">
                                    <li class="comment">
                                          <div class="comment-body">
                                            <div class="comment-author">
                                              
                                               <?php $poster="SELECT * FROM member where m_nId ='$mid' " ;
                                           $pos=mysqli_query($conn,$poster);
                                          if(mysqli_num_rows($pos))
                                            { while($poss=mysqli_fetch_assoc($pos)) {



                                              if (!empty($poss["m_Pic"] )){ 
                                                 $sk = $poss['m_Pic'] ; 
                                                 $mniid = $poss['m_nId'] ;  ?>
                                 <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>">   
                                                 <?php 
                                                   
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
                                                <cite class="fn sm black bold" style="font-size:15px;">      
                                                 <a href="<?php echo "profile.php?m_nId=".$mid."" ?>">   

                                                 <span style="color: #37ABF2; padding: 0px" > <?php echo $poss["m_fName"]." ".$poss["m_lName"] ?></span>
                                                </a>  </cite> <?php }}?>


                                               <div class="rr pull-right">  
                                            <a style="cursor: pointer;" class="remove"  data-rowid="<?php echo $dtid ?>" title="delete"  >
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
                                            { while($namecase=mysqli_fetch_assoc($rea)) { 
                                              $mniid =$namecase['m_nId'] ; ?>


                                       
                                        <ul class="children" style="padding: 0px;"  id="in<?php echo $dtid ?>">
                                            <li class="comment" id="za<?php echo $dtid ?>" style="display: none;height: 45px" >
                                                <div class="comment-body" >
                                                    <div class="comment-author" >
                                                       
                                                  
                                                    
                                                        <cite class="fn sm black bold" style="font-size:10px;margin-left: 15px; color: #37ABF2">
                                                       <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>">   
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
                  <?php if ($_SESSION["m_role"] == 'Instructor' ||$_SESSION["m_role"] == 'Administrator'){ ?> 

           
             <!-- NOTE LEARN -->
            <li class="backpage">
              <a href="<?php echo "adddocument.php?c_id=".$timely."" ?>"> 
             <i class="icon md-file"></i><span class="tooltip">New Doc</span></a>      
            </li>

            <li class="backpage" >
                <a href="index.php"><i  class="icon md-close-1"></i><span class="tooltip">Home</span></a>
            </li>
          <?php }if ($_SESSION["m_role"] == 'Student' ){?>
            <li class="backpage" style="width:230px">
                <a href="index.php"><i style="width:230px" class="icon md-close-1"></i><span class="tooltip">Home</span></a>
            </li>
        
            <?php }?>
  <li class="backpage">
                ..
            </li>

        </ul>

        
    </div>
   


    <!-- COURSE CONCERN -->
    <section  class="course-concern" >
            <div class="container " >
                <div class="table-asignment">

                <ul class="nav-tabs" role="tablist">
            
                           
                    <li> <a href="#announcement" role="tab" data-toggle="tab"></a></li>
                     
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
           
                    <!-- MY SUBMISSIONS -->
                      <div>



<?php 


$sql="SELECT * FROM sub_doc WHERE d_id=$iid and poster_groupnb in (select group_nb from member_course where group_nb ='$nb')";
 $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)){
?>
<form method="POST"  action="<?php echo "savesub_doc.php?c_id=".$timely."&d_id=".$iid."&group_nb=".$nb ?>"  >
 <table class="uk-table uk-table-hover">


                                <thead >
                                  <tr >
                                    <th>
                                      Poster National ID 
                                    </th>
                                    <th>Poster Name </th>
                                    <th> Submission Document</th>
                                    <th> Grade</th>
                                  </tr>
                                </thead>

<?php
while ($row = mysqli_fetch_array($result)){ 
     $subid= $row['sh_id'];
          $mniid= $row['sh_posterid'];


 ?>
    <tr>
  
  
    
     <td>

    <input type="hidden" name="sh_id[]" value="<?php echo $row['sh_id']; ?>" >

                                  <img src="images/lecture1.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row["sh_posterid"] ?></span>
                              </td>

   
                              <td > <a href="<?php echo "profile.php?m_nId=".$mniid."" ?>"> <?php echo $row["sh_postername"] ?></a></td>
                                 <td>

                                 <a href="<?php echo "downloadsub.php?sh_id=".$subid."" ?>">
                                     <i class="material-icons dp48" style="color:#3a7ff5;margin-left:60px; ">play_for_work</i>

                                    
                                  </a>
                              </td>
                             
  
    <td><input class="uk-input uk-form-width-medium" type="text" name="sh_grade[]" value="<?php echo $row['sh_grade'];?>" /></td>


    </tr>
    <?php } ?>



</table>
<input type="submit"  class="mc-btn btn-style-1 pull-right" value="Submit" name="submit">
</form> 


 <?php 




}    else {?> <table class="mc-table">
                                              <tr> 
                                                 <td style="text-align: center">
                          
                             No student submit yet in  <b><?php  echo "$cname" ?></b> course
                            
                              </td>
                           
                              
                            </tr>  
 </table>
                              <?php  }?>
                  
                     
              </div>
            </div>
            
          </div>
        </div>
      </section>
  </div>
    <!-- END / COURSE CONCERN -->


<?php   }}?>


<!-- END / PAGE WRAP -->


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
                            

                        $("#topicc").prepend('<li class="del"><div class="list-body"><div class="list-content"><ul class="commentlist"><li class="comment"><div class="comment-body"><div class="comment-author"><a href="#"><img style="width : 40px ;height: 40px;"" src="images/<?php echo $kk ?>"></div><div class="comment-content"><cite class="fn sm black bold" style="font-size:15px;"><a href=""><span style="color: #37ABF2"><?php echo $_SESSION["m_fName"]." ".$_SESSION["m_lName"] ?></span></a></cite><div class="rr pull-right"><a href="<?php echo "coursedetails.php?c_id=".'$timely'."&deli=".'$dtid'."" ?>"  title="delete" ><i class="material-icons pull-right" style="font-size:20px; color:black">close</i></a></div><p  id="'+c2+'"style="font-size:15px;">'+c2+' </p></div></div><span id="nb" style="color:gray;font-size: 10px;"></span><ul class="children" style="padding: 0px;"  id="in"></ul><ul class="children" style="padding: 0px;" id="inn"></ul><a href="#"><i id="az" style="display: none;" class="material-icons">keyboard_arrow_down</i></a><a id="az0" href="#" style="display: none"><i class="material-icons">keyboard_arrow_up</i></a> <span id="at" style="cursor: pointer;font-size:10px;float: right;color:gray;">Comment</span><span id="at"><i style="cursor: pointer;color:gray;font-size: 15px;float: right" class="material-icons" >question_answer</i></span><hr style="color:#3a7ff5"><div id="att" style="display:none"><div class="post-editor text-form-editor"><textarea name="comm_text" placeholder="Write a comment..." style="height:40px" id="com1" ></textarea></div><br><div class="form-submit"><input type="submit" value="Post"  id="com" class="mc-btn-2 btn-style-2 pull-right"></div></div></li></ul></div></li>'); 
                                             
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
                               $(function(){

                             var values = {
                                    'com': document.getElementById('com1').value,
                                    'id': $(this).closest("li.dell")
                            };

                                $.ajax({
                                url: "savenewcom.php",
                                type: "POST",
                                data: {com:com,id:id
                               },
                                dataType: 'JSON',
                                success: function(data){

                                }
                        
                              });
                            });
          
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
                      <script>
                        $("a.remove").click(function(event){
                            event.preventDefault();
                            var id = $(this).data("rowid");
                            var row = $(this).closest("li");  

                            $.ajax({
                               url: "deleteEx.php",
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
                        $("a.remove").click(function(event){
                            event.preventDefault();
                            var id = $(this).data("rowid");
                            var row = $(this).closest("li.del_top");  

                            $.ajax({
                               url: "deletetopic.php",
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
                        $("[id=com]").click(function(){
                          
                           
                         });
                      </script>
      
     

</body>
</html>