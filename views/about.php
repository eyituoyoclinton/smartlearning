<?php 
$title = "About Us || Learn.com";  
require_once 'header.php'; 

?>
 <!-- Breadcrumbs Start -->
 <div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white">About Us</h1>
                        <nav>
                            <ul>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><span>About Us</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!--About Company Section Start-->
        <section class="rs-hostlab-about-company white-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 wow fadeInLeft">
                        <div class="about-company-image">
                            <img src="<?php echo $url; ?>/images/about/newab.jpg" alt="student learning">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInRight">
                        <div class="about-company-text">
                            <div class="hostlab-title">
                                <h3>Creating better outcomes for our students.</h3>     
                                <br>                
                            </div>
                            <div class="hostlab-desc">
                                <p>We focus on rounded training that leads to a successful result and additional support down the line. We ensure support beyond certification through a desired career path via our alumni support.</p>
                                <p>We hope you enjoy our services as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to <a href="<?php echo $url; ?>/contact" style="color:black"><b>contact us</b></a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Hosting Classification Section Start-->
        <section id="rs-hostlab-classification" class="rs-hostlab-classification sec-spacer wow fadeIn">
            <div class="container">
                <div class="section-title text-center">
                    <h2>About SmartLearning</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="single-hosting section-bg mb-md-30">
                            <div class="hostlab-icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="hostlab-text">
                                <div class="hostlab-title">
                                    <h3 class="text-white">Assessment</h3>
                                </div>
                                <div class="hostlab-desc">
                                    <p style="color:#f4f3f2">We create a learning roadmap to guide your professional development through our initial assessment of your knowledge, skill and interests.</p>
                                </div>
                            </div>
                        </div> <!-- //.how it works -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="single-hosting section-bg mb-md-30">
                            <div class="hostlab-icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="hostlab-text">
                                <div class="hostlab-title">
                                    <h3 class="text-white">Development</h3>
                                </div>
                                <div class="hostlab-desc">
                                    <p style="color:#f4f3f2">We help you improve your knowledge, skills and confidence through a variety of learning methodologies; online or flex-learn via webinars</p>
                                </div>
                            </div>
                        </div> <!-- //.how it works -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        <div class="single-hosting section-bg">
                            <div class="hostlab-icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="hostlab-text">
                                <div class="hostlab-title">
                                    <h3 class="text-white">Review</h3>
                                </div>
                                <div class="hostlab-desc">
                                    <p style="color:#f4f3f2">We support your progress through regular assessments and 121 feedback. If there are problems, we will fix them together.</p>
                                </div>
                            </div>
                        </div> <!-- //.how it works -->
                    </div>
                </div>
            </div> <!-- //.container -->
        </section>
        <!-- About Company Section End -->
<?php require_once 'footer.php'; ?>