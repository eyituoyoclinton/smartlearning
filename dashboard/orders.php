<?php
require_once 'header.php';
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title">List of Orders</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
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
            <!-- #END# Basic Examples -->
        </div>
    </section>

<?php require_once 'footer.php'; ?>