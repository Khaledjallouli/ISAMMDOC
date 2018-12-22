<?php


    include "connect.php";
    session_start();

       if (empty($_SESSION['m_nId'])) {
            header('Location: index.php');
            exit();
        }

     $key = $_GET['c_id'] ;
                    $sql="SELECT * FROM course WHERE c_id =$key "; 
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result))
                        {  while($row=mysqli_fetch_assoc($result))
                            {$timely=$row["c_id"];
                                 $fname = $_SESSION['m_fName'];
                             $lname = $_SESSION['m_lName'] ;

                           

                             

                             
                         
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
   <link rel="icon" type="image/png" href="images/isamm1.png" />

     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 



        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="src/DateTimePicker.css" />
        
    
        
    <!--[if lt IE 9]>



        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Add new document</title>
</head>
<body id="page-top">

<!-- PAGE WRAP -->
<div id="page-wrap">
    <div class="top-nav">
        <ul class="top-nav-list ">
          <li class="prev-course"><a href="courses.php"></a> </li>
            
         </ul>
        <h4 class="sm black bold"><?php echo  $row["c_fullname"]?></h4>

        <ul class="top-nav-list">
        <li class="prev-course">                                 <a href="<?php echo "coursedetails.php?c_id=".$timely."" ?>">
 <i class="icon md-angle-left"></i><span class="tooltip">Prev</span></a></li>
                <li class="backpage">
                <a href="index.php"><i class="icon md-close-1"></i><span class="tooltip">Home</span></a>
            </li>
                                  </ul>  

                                </div>
                              </li>
                          </ul>

                             
                        
                       
         
        
         

  
        </ul>

        
    </div>
   

    <!-- BANNER CREATE COURSE -->
    <section class="sub-banner sub-banner-create-course">
      
        <div class="container">
          
            <i class="icon md-pencil"></i>
        </div>
    </section>
    <!-- END / BANNER CREATE COURSE -->

    <!-- CREATE COURSE CONTENT -->
    <section id="create-course-section" class="create-course-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="create-course-sidebar">
                        <ul class="list-bar">
                    
                            <li class="active" >Add Document</li>
                  
                        </ul>
                       
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="create-course-content">

                        <!-- COURSE BANNER -->
                        <ul class="design-course-tabs" role="tablist">
                            <li class="active">
                                <a href="coursedetails.php" role="tab" data-toggle="tab"><i class="icon md-list"></i>Outline</a>
                            </li>
 
                        </ul>
                        <div class="tab-content">
                            <!-- DESIGN OUTLINE -->
                            <div class="tab-pane fade in active" id="design-outline">
                              
                                <!-- SECTIONS -->
                                <div class="dc-sections">
                                    <!-- DC SECTION INFO -->
                                    <div class="dc-section-info">
                                 

                                        <!-- DC SECTION BODY -->
                                        <div class="dc-section-body">
             
                      <form action="<?php echo "savedocument.php?c_id=".$timely."" ?>" method="post" enctype="multipart/form-data">
                                            <!-- DC UNIT -->
                                          
                                            <div class="dc-unit-info dc-course-item">
                                                <div class="dc-content-title">

                                                    <h5 class="xsm black">Add document </h5>
                                                   
                                                </div>

                                                <div class="unit-body dc-item-body">
                                                    <table class="tb-course">
                                                        <tbody>
                                                         <tr class="tb-unit-title">
                                                                <td class="label-info">
                                                                    <label for="">Document Type</label>
                                                                </td>
                                                                <td class="td-form-item">
                                                                    <div class="form-item">
                                                                           <select class="form-control" name="d_type" id="docetype" onchange="return showprov();">
                                                                           <option value=""></option>
                                                                          <option value="Lecture Note">Lecture Note</option>
                                                                          <option value="HomeWork Announcment">HomeWork Announcment</option>
                                                                          <option value="Project Announcment">Project Announcment</option>
                                                                     </select>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                          
                                                            <tr class="tb-unit-title">
                                                                <td class="label-info">
                                                                    <label for="">Title</label>
                                                                </td>
                                                                <td class="td-form-item">
                                                                    <div class="form-item">
                                                                        <input name="d_title" type="text">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="tb-desc">
                                                                <td class="label-info">
                                                                    <label for="">Description</label>
                                                                </td>
                                                                <td class="td-form-item">
                                                                    <div class="form-textarea-wrapper">
                                                                        <textarea name="d_description"></textarea>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                
                                                           
                                                            <tr class="tb-upload-content">
                                                                <td class="label-info">
                                                                    <label for="">Content</label>
                                                                </td>
                                                                <td class="td-form-item">
                                                                             
                                                                                <div class="input-group image-preview">
                                                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> 
                                                                                        <span class="input-group-btn">
                                                                                           <button type="button" class="btn btn-default btn-file  image-preview-clear" style="display:none; ">
                                                                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                                                                            </button>
                                                                                            <div class="btn btn-default btn-file image-preview-input">
                                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                                <span class="image-preview-input-title">Browse</span>
                                                                                                <input type="file" accept="image/png, image/jpeg, image/gif, image/jpg"  name="d_file" required /> 
                                                 

                                                                                                <!-- rename it -->
                                                                                            </div>
                                                                                        </span>
                                                                                </div><!-- /input-group image-preview [TO HERE]--> 
                                                                          



                                                                </td>
                                                            </tr>
                                                            
                                                            <tr class="tb-unit-title" id="duedate" style="visibility: hidden;">
                                                                <td class="label-info">
                                                                    <label for="">Due Date</label>
                                                                </td>
                                                                <td>
                   
        
                <div class="form-group">
                    <input type="text" class="form-control" name="d_sdl" data-field="datetime" data-format="dd-MMM-yyyy hh:mm:ss AA" readonly>
                </div>
    
           

     

        <div id="dtBox"></div>


        





                                                                </td>
                                                            </tr>
                                                             <tr class="tr-footer">
                                                             <td></td>
                                                             <td>
                                                                  <input type="submit" class="mc-btn-3 btn-style-1" style="margin-left: 170px;" value="Submit">
                                                                  <a href="<?php echo "coursedetails.php?c_id=".$timely."" ?>" class="cancel mc-btn-3 btn-style-5">Cancel</a>
                                                            </td>
                                                            </tr>
                                                           
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                            <!-- END / DC UNIT -->

                        
                                </div>
                                <!-- END / ADD QUESTION POPUP -->
                                
                                
                            </div>
                            <!-- END / DESIGN OUTLINE -->
    
                         
                </form>
    
                        </div>
                        
                    </div>
                </div>
<?php   
             } 
         }
         
         ?>
            </div>
        </div>
    </section>
    <!-- END / CREATE COURSE CONTENT -->


    
    
      
    <!-- FOOTER -->
    <footer id="footer" class="footer">
        <div class="first-footer">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="widget megacourse">
                            <h3 class="md">MegaCourse</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat</p>
                            <a href="#" class="mc-btn btn-style-1">Get started</a>
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
                                    <h3 class="md">News letter</h3>
                                    <p>Don’t miss a course sale! Join our network today and keep it up!</p>
                                </div>
                                <div class="letter">
                                    <form>
                                        <input class="input-text" type="text">
                                        <span class="no-spam">* No spam guaranteed</span>
                                        <input type="submit" value="Submit now" class="mc-btn btn-style-2">
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
                        <a href="#">course@megadrupal.com</a>
                    </div>
                    <div class="phone">
                        <i class="fa fa-mobile"></i>
                        <span>+84 989 999 888</span>
                    </div>
                    <div class="address">
                        <i class="fa fa-map-marker"></i>
                        <span>Maecenas sodales, nisl eget</span>
                    </div>
                </div>
                <p class="copyright">Copyright © 2014 Megadrupal. All rights reserved.</p>
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
<script type="text/javascript" src="js/library/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

<script type="text/javascript">
    if ($('.popup-with-zoom-anim').length) {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
        $('.design-course-popup').delegate('.cancel', 'click', function(evt) {
            evt.preventDefault();
            $('.mfp-close').trigger('click');
        });
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
    <script type="text/javascript">
        function showprov (){
            var selectBox = document.getElementById('docetype');
            var userInput =selectBox.options[selectBox.selectedIndex].value;
            if (userInput=='Project Announcment' || userInput=='HomeWork Announcment') {
                document.getElementById('duedate').style.visibility ='visible' ;
            } 
            else {
                    document.getElementById('duedate').style.visibility ='hidden' ;

            }
            return false ;

        }
    </script>

   <script type="text/javascript" src="jquery/jquery-1.11.0.min.js"></script>
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
</body>
</html>