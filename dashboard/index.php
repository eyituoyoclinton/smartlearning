    <?php require_once 'header.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title">
                                    <script type="text/javascript">
                                        var myDate = new Date();  
                                        if (myDate.getHours() < 12) {
                                            document.write("Good Morning, ");
                                        }
                                        else if(myDate.getHours() >=12 && myDate.getHours() <=17){
                                            document.write("Good Afternoon, ");
                                        }
                                        else if (myDate.getHours() > 17 && myDate.getHours() <=24) {
                                            document.write("Good Evening, ");
                                        }
                                        else
                                        {
                                            document.write("Good Night");
                                        }
                                    </script> <?php echo $fullName; ?>
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card comp-card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<h4 class="m-t-5 m-b-20">Courses enrolled</h4>
                                    <h4 class="f-w-700" style="color:#fa7b07">
                                    <?php
                                        $numOrder = mysqli_num_rows($getOrders);
                                        if ($numOrder > 0) {
                                            echo $numOrder.' '.'Course(s)';
                                        } else {
                                            echo '0';
                                        }
                                    ?>
                                    </h4>
                                    <hr class="mt-2">
                                    <button type="button" onclick="window.location.href='<?php echo $dashboardUrl; ?>/orders'" class="btn btn-primary m-t-15 waves-effect" style="background-color:#fa7b07">My Course</button>
								</div>
								<div class="col-auto">
									
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="card comp-card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
                                    <h4 class="m-t-5 m-b-20">How to enrol a course</h4>
									<p class="m-b-0">01. Go to All <a style="color:#fa7b07" href="../courses">Courses</a></p>
									<p class="m-b-0">02. Select the course you want</p>
                                    <p class="m-b-0">03. Pay using paystack</p>
                                    <p class="m-b-0 mt-4"><a style="color:#fa7b07" href="../terms">Terms and conditions</a></p>
								</div>
								<div class="col-auto">
									<div class="chart chart-pie"></div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- product -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <h4 class="page-title">My Course</h4>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Price</th>
                                            <th>Invoice #</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $numRow = mysqli_num_rows($getOrders);
                                    if ($numRow === 0) {
                                        echo 'No Course yet';
                                    } else {
                                        while ($row = mysqli_fetch_assoc($getOrders)) {
                                            $datePaid = $row['date_paid'];
                                            $invoice = $row['invoice'];
                                            $amount = $row['amount'];
                                            $statusId = $row['statuses_id'];
                                            $courseId = $row['course_id'];
                                            $getTitles = fetchCourseTitle($courseId);
                                            $gTitles = mysqli_fetch_assoc($getTitles);
                                            $courseTitle = $gTitles['title'];
                                            $getStatus = getStatus($statusId);
                                            $nStatus = $getStatus[0]->status;
                                                echo '<tr>
                                                <td>'.$courseTitle.'</td>
                                                <td>₦'.number_format($amount).'</td>
                                                <td>'.$invoice.'</td>
                                                <td>'.$datePaid.'</td>
                                                <td>'.$nStatus.'</td>
                                                </tr>';
                                        }
                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once 'footer.php'; ?>