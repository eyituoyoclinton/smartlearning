    <?php
    $title = 'Our Courses || Learn.com';
    require_once 'header.php';
    $fetchDetails = fetchAllCourses();

    ?>
    
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white">All Courses</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Our Products Start Here-->
            <div class="our-products-section our-products-page sec-spacer">
                <div class="container">
                    <div class="row mb-3" id="fruity">
                        <div class="col-12 mb-2">
                            <h1>Learn at your convenience</h1>
                        </div>
                        <?php
                        $numRow = mysqli_num_rows($fetchDetails);
                        if ($numRow === 0) {
                            echo 'No box available';
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
                    
                </div>
            </div>
            <!-- Our Products end Here-->   

        <?php require_once 'footer.php'; ?>
        
        