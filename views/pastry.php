<?php
    $title = 'Our Pastries || Learn.com';
    require_once 'header.php';
    $fetchDetails = fetchAllBasket();

    ?>
    
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white">Our Pastries</h1>
                        <nav>
                            <ul>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><span>Our Pastries</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Our Products Start Here-->
            <div class="our-products-section our-products-page sec-spacer">
                <div class="container">
                    <div class="row">
                        <?php
                        $numRow = mysqli_num_rows($fetchDetails);
                        if ($numRow === 0) {
                            echo 'No box available';
                        } else {
                            while ($row = mysqli_fetch_assoc($fetchDetails)) {
                                $basketName = $row['title'];
                                $basketSlug = $row['slug'];
                                $basketPrice = number_format($row['price']);
                                $basketImg = $row['img'];
                                $basketKg = $row['kg'];
                                $basketId = $row['id'];
                                echo '
                                <div class="col-md-6 col-lg-3 col-xs-12">
                                    <div class="single-product text-center">
                                        <div class="product-image">
                                            <div class="overly"></div>
                                            <a href="'.$url.'/product/'.$basketSlug.'"><img src="'.$url.'/images/product/'.$basketImg.'" alt="'.$basketName.'" /></a>
                                        </div>
                                        <div class="product-details">
                                            <div class="product-tile">
                                                <a href="'.$url.'/product/'.$basketSlug.'" class="text-white">'.$basketName.'</a>
                                                <span class="text-white">₦'.$basketPrice.'</span>
                                            </div>
                                            <div class="product-cart">
                                                <a href="'.$url.'/product/'.$basketSlug.'"><i class="fa fa-shopping-cart"></i> Buy</a>
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
        
        