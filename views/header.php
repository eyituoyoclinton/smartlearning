<!-- this is the header file -->
<?php 

    $url = 'http://localhost/learn';
    require_once $_SERVER["DOCUMENT_ROOT"] ."/learn/scripts/php/functions.php";
    @session_start();
    $email = @$_SESSION['email'];
    @$logged = $_SESSION['login'];  
      
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $url; ?>/images/fav.png">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/animate.css">
        <!-- hover css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/hover-min.css">
        <!-- magnific-popup css -->
        <link rel="stylesheet" href="<?php echo $url; ?>/css/magnific-popup.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/owl.carousel.css">
		<!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/fonts/flaticon.css">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/rsmenu-main.css">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/rsmenu-transitions.css">
        <!-- Slick css -->
        <link rel="stylesheet" href="<?php echo $url; ?>/css/slick.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/style.css">
        <!-- switch color presets css -->
        <link id="<?php echo $url; ?>/switch_style" href="index.html#" rel="stylesheet" type="text/css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/responsive.css">
        <!-- modernizr js -->
        <script src="<?php echo $url; ?>/js/modernizr-2.8.3.min.js"></script>
        
    </head>
    <body class="home3 shared-hosting inner-page">
        
        <!--Full width header Start-->
        <section class="full-width-header">
            <!-- Toolbar Start -->
            <div class="toolbar-area hidden-sm hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-7 col-xs-12">
                            <div class="toolbar-contact">
                                <ul class="top-menu">
                                    <li><i class="fa fa-phone"></i><a href="#">+2347061967265</a></li>
                                    <li><i class="fa fa-envelope-o"></i><a href="#">hello@learn.com</a></li>
                                    
                                </ul>
                            </div> <!-- // .toolbar-contact -->
                        </div>
                        <div class="col-lg-6 col-sm-5 col-xs-12">
                            <div class="toolbar-sl-share">
                                <ul>
                                    <?php
                                    if(@$logged){
                                        echo '
                                        <li><a href="'.$url.'/dashboard/profile">Profile</a></li>
                                        ';
                                    }else{
                                        echo '
                                        <li><a href="'.$url.'/login">Login</a></li>
                                        <li><a href="'.$url.'/register">Register</a></li>
                                        ';
                                    }

                                    ?>
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div><!-- // .toolbar-sl-share -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Toolbar End -->

            <!--Header Start-->
            <header id="rs-header" class="rs-header">
                <!-- Menu Start -->
                <div class="menu-area menu-sticky">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <div class="logo-area">
                                    <a href="<?php echo $url; ?>"><img src="<?php echo $url; ?>/images/logo.png" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 all">
                                <div class="main-menu">
                                    <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu">

                                            <!--Domains Menu Start-->
                                            <li><a href="<?php echo $url; ?>">Home</a></li>
                                            <li><a href="<?php echo $url; ?>/about">About</a></li>
                                            <!-- <li><a href="<?php echo $url; ?>/Faq">Faq</a></li> -->
                                            <li><a href="<?php echo $url; ?>/courses">Course</a></li>
                                            <li><a href="<?php echo $url; ?>/cart">Cart <span style="font-weight:bold; color:red;"><sup id="cartNo">0</sup></span></a></li>
                                            <?php
                                            if(@$logged){
                                                echo '
                                                <li><a href="'.$url.'/dashboard">Dashboard</a></li>
                                                <li><a href="'.$url.'/logout">Logout</a></li>
                                                ';
                                            }else{
                                                echo '
                                                <li><a href="'.$url.'/login">Login</a></li>
                                                <li><a href="'.$url.'/register">Register</a></li>
                                                ';
                                            }
                                            ?>
                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                            </div>
                        </div>
                        <div class="flash-msg">
                            <div>
                                <span class="res-msg"></span>
                                <span class="fa fa-times" onclick="clearMessage()"
                                    style="margin-left:10px; display:inline-block;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->
            </header>
            <!--Header End-->
        </section>
        <!--Full width header End-->