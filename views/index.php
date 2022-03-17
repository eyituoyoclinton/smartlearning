
    <?php
    $title = 'Learn.com';
    require_once 'views/header.php';
    $fetchDetails = fetchBasketHome();

    ?>
        <section id="rs-banner" class="rs-banner">
            <div class="banner-img foodiesReduceImage">
                <div class="banner-section">
                    <div class="container">
                        <div class="slider-text wow fadeInRight">
                        <div class="texet">
                            <h2 class="sl-title" style="color:#white">Enrol now for our Javascript courses.</h2>
                            <h5 class="sl-price" style="color:#white">With the best Instuctors ready to tutor you</h5>
                            <ul>
                                <li><a href="<?php echo $url; ?>/courses" class="slider-btn wow fadeInUp">Enrol Now</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section End -->

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
       <!-- Our Different Featured Start -->
       <section id="rs-different-featured" class="rs-different-featured section-bg sec-spacer wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <img class="text-center" src="images/advert/advert3.png" alt="img">
                    </div>
                </div>
            </div> 
        </section>
        <!-- Our Different Featured End -->

        <!-- Our Products Start Here-->
        <div class="our-products-section our-products-page sec-spacer">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Our Courses</h2>
                </div>
                <div class="row">
                    <?php
                    $numRow = mysqli_num_rows($fetchDetails);
                    if ($numRow === 0) {
                        echo 'No Product available';
                    } else {
                        while ($row = mysqli_fetch_assoc($fetchDetails)) {
                            $courseName = $row['title'];
                            $courseSlug = $row['slug'];
                            $coursePrice = number_format($row['price']);
                            $courseImg = $row['img'];
                            $courseId = $row['id'];

                            echo '
                            <div class="col-md-6 col-lg-4 col-xs-12">
                                <div class="single-product text-center">
                                    <div class="product-image">
                                        <div class="overly"></div>
                                        <a href="'.$url.'/course/'.$courseSlug.'"><img src="'.$url.'/images/course/'.$courseImg.'" alt="'.$courseName.'" /></a>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-tile">
                                            <a href="'.$url.'/course/'.$courseSlug.'" class="text-white">'.$courseName.'</a>
                                            <span class="text-white">₦'.$coursePrice.'</span>
                                        </div>
                                        <div class="product-cart">
                                            <a href="'.$url.'/course/'.$courseSlug.'"> Enrol</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    }

                    ?>
                </div>
                <div class="hostlab-cta-desc" style="text-align:center; margin-top:30px">
                    <a class="hostlab-btn" style="color:#ffffff" href="<?php echo $url; ?>/courses">All Courses</a>
                </div>
            </div>
        </div>
        <!-- Our Products end Here-->  
       

        <?php require_once 'views/footer.php'; ?>

        