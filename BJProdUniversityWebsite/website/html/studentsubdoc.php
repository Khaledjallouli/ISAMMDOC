<?php
    include "connect.php";
    session_start();
    
         if (empty($_SESSION['m_nId'])) {
    header('Location: index.php');
    exit();
}

       $id = $_GET['d_id'] ;
$grp = $_GET['poster_groupnb'];
     $key = $_GET['c_id'] ;
     
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            { $timely=$row["c_id"];
                            $name=$row["c_fullname"];
                            $level=$row["c_level"];
                            $cat=$row["c_cat"] ;
                            $i=0 ; 

                           


                
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


    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Student submission document</title>
</head>
<body id="page-top">

<!-- PAGE WRAP -->
<div id="page-wrap">
    <div class="top-nav">
        <ul class="top-nav-list ">
          <li class="prev-course"><a href="courses.php"><i class="icon md-angle-left"></i><span class="tooltip">Prev</span></a></li>
         </ul>
        <h4 class="sm black bold"><?php echo  $row["c_fullname"]?></h4>

        <ul class="top-nav-list">
            <li class="outline-learn">
                <a href="#"><i class="icon md-list"></i></a>
                <div class="list-item-body outline-learn-body">
                    <div class="section-learn-outline">
                        <h5 class="section-title">Sect 1 : Introduction</h5>
                        <ul class="section-list">
                            <li>
                                <div class="list-body">
                                    <a href="#">
                                        <h6>Unit 1</h6>
                                        <p>Duis vel ullamcorper mauris, eu pretium felis. Duis gravida laoreet velit.</p>
                                    </a>
                                </div>
                                <div class="download">
                                    <a href="#"><i class="icon md-download-1"></i></a>
                                    <div class="download-ct">
                                        <span>Reference 12 mb</span>
                                    </div>
                                </div>
                                <div class="div-x"><i class="icon md-check-2"></i></div>
                            </li>

                            <li>
                                

                            <li class="o-view">
                                <div class="list-body">
                                    <a href="#">
                                        <h6>Quizz 1</h6>
                                        <p>12 questions</p>
                                    </a>
                                </div>
                                <div class="div-x"><i class="icon md-check-2"></i></div>
                            </li>

                           
                        </ul>
                    </div>

                    <div class="section-learn-outline">
                        <h5 class="section-title">Sect 2 : This is long title for the section</h5>
                        <ul class="section-list">
                            <li>
                                <div class="list-body">
                                    <a href="#">
                                        <h6>Unit 5</h6>
                                        <p>Duis vel ullamcorper mauris, eu pretium felis. Duis gravida laoreet velit.</p>
                                    </a>
                                </div>
                                <div class="div-x"><i class="icon md-check-2"></i></div>
                            </li>
                        </ul>
                    </div>

                </div>
            </li>



            <!-- DISCUSSION -->
            <li class="discussion-learn">
                <a href="#"><i class="icon md-comments"></i><span class="tooltip">New Topic</span></a>
                <div class="list-item-body discussion-learn-body">
                    <div class="inner">

                        <div class="form-discussion">
                            <form action="<?php echo "savediscussiontopic.php?c_id=".$timely."" ?>" method="post">
                                <div class="text-title">
                                    <input type="text" name= "dt_title" placeholder="Topic title here">
                                </div>
                                <div class="post-editor text-form-editor">
                                    
                                    <textarea name="dt_description" placeholder="Discussion content"></textarea>
                                </div>
                              
                                <div class="form-submit">
                                    <input type="submit" value="Post" class="mc-btn-2 btn-style-2">
                                </div>

                                <h5> Topics</h5>
                            </form>
                        </div>

                         <?php
                    $sql="SELECT * FROM disc_topic where c_id = '$timely' "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        { while($row=mysqli_fetch_assoc($result))
                            { 
                ?>
                
                        <ul class="list-discussion">
                
                            <!-- LIST ITEM -->
                            <li>
                                <div class="list-body">
                                    <div class="list-content">
                                        <cite class="name-author"> <?php echo $row["m_fName"]." ".$row["m_lName"] ?></cite>
                                        <br>
                                        <?php echo $row["dt_title"] ?>

                                        <p><?php echo $row["dt_description"] ?></p>

                                        <div class="comment-meta">
                                            <a href="#"><i class="icon md-back"></i> Comments </a>
                                        </div>
                                         
                                    </div>

                                    <div class="tbody">
                                        <!-- ITEM -->
                                        <div class="item">
                                           <div class="form-discussion">
                                                          <form action="<?php echo "savediscussiontopic.php?c_id=".$timely."" ?>" method="post"> 
                                                                 <div class="post-editor text-form-editor">
                                                                  <textarea name="dt_comment" placeholder="Comment"></textarea>
                                                                 </div>
                                                                   <div class="form-submit">
                                                                    <input type="submit" value="Comment" name="comment" class="mc-btn-2 btn-style-2">
                                                                      </div>
                                                             </form>
                                                            <?php  $sql="INSERT INTO disc_topic (commenter_fname,commenter_lname) VALUES('$fname','$lname')"; ?>
                                            </div>
                                        </div>
                                        <!-- END / ITEM -->
                                    </div>

                                     <div class="list-content">
                                        <cite class="name-author"> <?php echo $row["commenter_fname"]." ".$row["commenter_lname"] ?></cite>
                                        <br>
                                     
                                         
                                    </div>




                                 
                            </li>
                            <!-- END / LIST ITEM -->
                
                          
                        </ul>
                        <?php 
                        }
                        }
                        ?>
                    </div>
                </div>
            </li>
             <!-- NOTE LEARN -->
            <li class="backpage">
              <a href="<?php echo "adddocument.php?c_id=".$timely."" ?>"> 
             <i class="icon md-file"></i><span class="tooltip">New Doc</span></a>      
            </li>

          
            <li class="backpage">
                <a href="index.php"><i class="icon md-close-1"></i><span class="tooltip">Home</span></a>
            </li>
        </ul>
        
    </div>
   



    <!-- COURSE CONCERN -->
    <section  class="course-concern" >
               

      
            <div class="container " >
               
                <!-- Tab panes -->
                <div class="tab-content">
           
                    <!-- MY SUBMISSIONS -->
                      <div class="tab-pane fade" id="announcement">
                            <?php
                        
                                    $sql1="SELECT * FROM sub_doc where d_id = $id and poster_groupnb IN (SELECT group_nb from member_course )";

                           
                              $result1=mysqli_query($conn,$sql1);
                              if(mysqli_num_rows($result1))
                                {   
                                  ?>
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
                                while($row1=mysqli_fetch_assoc($result1))
                                  { 
                                    $postername = $row1['sh_postername'] ;
                                    $name = $row1['sh_file'];
                                    $path = $row1['sh_path'];
                                   $posterid= $row1['sh_posterid'];
                                   $subid= $row1['sh_id'];
                           
                                ?>
                                <tbody>
                            <tr > 
                              <td>
                          
                               
                                  <img src="images/lecture1.png" width="20px" height="20px">&ensp;&ensp;
                                  <span ><?php echo $row1["sh_posterid"] ?></span>
                                
                            
                              </td>
                              <td ><?php echo $row1["sh_postername"] ?></td>
                              <td>
                                 <a href="<?php echo "downloadsub.php?sh_id=".$subid."" ?>">
                                    <i class="material-icons dp48" style="color:#3a7ff5 ">play_for_work</i>
                                  </a>
                              </td>

                                  <td><form method="post" action="<?php echo "sub_doc.php?c_id=".$timely."&d_id=".$id ?>"> 
                                <div class="uk-margin">
        <input class="uk-input uk-form-width-medium" type="text" name='sh_grade' value=' <?php 
                                                         $sk = $row1['sh_grade'] ; 
                                                       echo "$sk" ;
                                                        ?>'>
    </div> 
    
                               
                                 

                                   <?php    if (isset($_POST['submit'.$subid])) {

                                                                              $newgrade=$_POST["sh_grade"];

                                                                     $update="UPDATE sub_doc SET sh_grade='$newgrade' WHERE sh_id='$subid' ";
                                                                            if(mysqli_query($conn,$update)){
                                                                                              }    
                                                                             }
?> </span>
                                  </td>



                            </tr>  

                         <?php } }  else {echo "No student submit yet"; }
                         ?>
                         <tr> <td colspan="3"> </td> <td> <input type="submit" class="uk-button uk-button-default" name="<?php echo "submit".$subid."" ?>" value="Submit"> 
                                  </form></td> 
                                </tr>

                                  </tbody>
  
                     
                      </table>
                    </div>
                    
                    <!-- END / MY SUBMISSIONS -->

         

                <?php   } }?>

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


<script type="text/javascript">

    $.each($('.table-wrap'), function() {
        $(this)
            .find('.table-item')
            .children('.thead:not(.active)')
            .next('.tbody').hide();
        $(this)
            .find('.table-item')
            .delegate('.thead', 'click', function(evt) {
                evt.preventDefault();
                if ($(this).hasClass('active')==false) {
                    $('.table-item')
                        .find('.thead')
                        .removeClass('active')
                        .siblings('.tbody')
                            .slideUp(200);
                }
                $(this)
                    .toggleClass('active')
                    .siblings('.tbody')
                        .slideToggle(200);
        });
    });

</script>

       
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

</body>
<iframe src="about:blank" name="hiddenFrame" width=0 height=0 frameborder=0></iframe>
</html>