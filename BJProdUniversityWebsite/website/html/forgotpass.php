
<?php 
    session_start();
        include "connect.php";

    if(isset($_SESSION["alert"]) AND $_SESSION["alert"]==1){
?>
    
    <script type="text/javascript">
        alert("Please, sign in first");
    </script>
<?php
        $_SESSION["alert"]=0;
    }



    if(isset($_SESSION["signup"]) AND $_SESSION["signup"]){
    ?>
    
    <script type="text/javascript">
        alert("You have successfully signed up...");
    </script>
    <?php
        $_SESSION["signup"]=0;
    }    


        if(isset($_SESSION["login"]) AND $_SESSION["login"]){
    ?>
    
    <script type="text/javascript">
        alert("Wrong login or password...");
    </script>
    <?php
        $_SESSION["login"]=0;
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

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <title>Forgot password</title>
</head>
<body id="page-top" class="home">

<!-- PAGE WRAP -->
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
        

            <!-- LOGO -->
             <div class="logo"><a href="index.php"><img src="images/isamm.png" alt=""></a></div>
            <!-- END / LOGO -->

            <!-- NAVIGATION -->
            <nav class="navigation">

                <div class="open-menu">
                    <span class="item item-1"></span>
                    <span class="item item-2"></span>
                    <span class="item item-3"></span>
                </div>



                    <ul class="menu">
                        <!-- MENU -->
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li class="menu-item-has-children">
                        <a href="signin.php">Login</a>
                         <ul class="sub-menu">
                            <li><a href="signin.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        </ul>
                        
                    </li>
                   
                </ul>
                <!-- END / MENU -->


            </nav>
            <!-- END / NAVIGATION -->

        </div>
    </header>
    <!-- END / HEADER -->
  


 <!-- njib ili f index visitor l hna -->

 <!-- LOGIN -->
    <section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">

                        <!-- FORM -->


                <div class="col-lg-4 pull-right">
                    <div class="form-login">
                 

                         <h2 class="text-uppercase">Forgot password</h2>
                        <form action="mail.php" method="post">

                        
                            <div class="form-email"> 
                                     <input type="text" placeholder="name" name="m_fName" id="name" required>
                            </div>
                          

                            <div class="form-email"> 
                                     <input type="text" name ="mail" placeholder="Email address" id="mail" required>
                            </div>
  

                          <div class="form-email"> 
                                     <input type="text" placeholder="phone" name="m_phNumber" id="phone" required>
                            </div>
                          <div class="form-submit-1">
                                <input type="submit" value="Get password" class="mc-btn btn-style-1" id="submit">
                            </div>                       
                            
                        </form>
                       

     

        
    </section>
    <!-- END / LOGIN -->
  

                    </div>
                </div>
                <!-- END / FORM -->


    
            </div>


        </div>
        
    </section>
    <!-- END / LOGIN -->
    
      
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
 <script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="jquery/jquery.js"></script>
            <script src="jquery/jquery.form.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js">  </script> 
<script src="js/jquery.min.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
 <script type="text/javascript">
                            $(function() {
                            $("#submit").click(function() {
                                var data = {
                                name : $("#name").val(),
                                mail :$("#mail").val(),
                                phone :$("#phone").val()
                              };

                                    $.ajax({
                                        type: "POST",
                                        url: "mail.php",
                                        data: data,
                                        success: function(){
                                        $('.success').fadeIn(1000);
                                        }
                                    });

                                return false;
                            });
                        });
                        </script>

</body>
</html>