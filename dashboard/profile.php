<?php require_once "header.php"; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li>
                                <h4 class="page-title">Account Details</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row clearfix mbottom" style="background-color:#fff">
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                    <div class="card comp-card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<h5 class="m-t-5 m-b-25"><?php echo $fullName; ?></h5>
                                    <p class="m-b-0"><small>Email</small></p>
                                    <p class="m-b-2" style="color:#fa7b07"> <?php echo $email; ?></p>
                                    <p class="m-b-0"><small>Mobile</small></p>
									<p class="m-b-2" style="color:#fa7b07"><?php echo $mobile; ?></p>
									<p class="m-b-0"><small>Password</small></p>
									<p class="m-b-2">xxxxxxxx  <a onclick="toggle(userPassReset)" id="userPassBtn" style="color:#fa7b07">Click to Change</a></p>
								</div>
								<div class="col-auto">
                                    <button type="button" onclick="toggle(userAccountDetails)" id="userAccountBtn" class="btn btn-primary m-t-15 waves-effect">Modify</button>
								</div>
							</div>
						</div>
                    </div>
                    <!-- to change user password  starts-->
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" id="userPassReset" style="display:none">
                        <div class="card comp-card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                    <div id="Perror_update" style="width:100%; display:none; color:red; margin: 5px"></div>
                                    <div id="Psuccess_update" style="width:100%; display:none; color:green; margin: 5px"></div>
                                        <form id="dashPassword">
                                            <input style="display:none" type="text" class="form-control" id="pemail" value="<?php echo $email; ?>">
                                            <input type="password" id="oldpassword" value="" placeholder="Old Password">
                                            <input type="password" id="password1" value="" placeholder="New Password">
                                            <input type="password" id="password2" value="" placeholder="Confirm Password">
                                            <button id="updatePassBtn" class="btn btn-primary m-t-15 waves-effect" type="submit">Reset Password</button>
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <div class="chart chart-pie"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- to change user password ends-->

                    <!-- to change user info starts-->
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" id="userAccountDetails" style="display:none">
                        <div class="card comp-card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                    <div id="Aerror_update" style="width:100%; display:none; color:red; text-align: center; margin: 5px"></div>
                                    <div id="Asuccess_update" style="width:100%; display:none; color:green; text-align: center; margin: 5px"></div>
                                        <form class="body" id="updateUserInfo">
                                            <input id="userEmail" style="display:none" type="text" class="form-control" value="<?php echo $email; ?>">
                                            <input id="fullname" type="text" class="form-control" value="<?php echo $fullName; ?>" placeholder="Fullname">

                                            <input id="userMobile" type="text" class="form-control" value="<?php echo $mobile; ?>" placeholder="Phone">

                                            <input id="userAddress" type="text" class="form-control" value="<?php echo $address; ?>" placeholder="Contact Address"> 
                                            <input id="userCity" type="text" class="form-control" value="<?php echo $city; ?>" placeholder="City">
                                            <input id="userState" type="text" class="form-control" value="<?php echo $state; ?>" placeholder="State">                                    
                                            <button id="updateInfo" class="btn btn-primary m-t-15 waves-effect" type="submit">Update Account</button>
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <div class="chart chart-pie"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- to change user info ends-->
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="card comp-card">
						<div class="card-body">
							<div class="row align-items-center" style="border-left:1px solid black">
								<div class="col">
                                    <h5 class="m-t-5" style="color:#fa7b07">Account Verified <i class="fa fa-check-double"></i></h5>
									<p class="m-b-0"><small>Address</small></p>
                                    <p class="m-b-2" style="color:#fa7b07"><?php echo $address; ?></p>
								</div>
								<div class="col-auto">
									<div class="chart chart-pie"></div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "footer.php"; ?>
    <script src="assets/js/form.min.js"></script>
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="assets/js/event.js"></script>
    <script src="<?php echo $baseUrl; ?>/scripts/js/newpassword2.js"></script>
    <script src="<?php echo $baseUrl; ?>/scripts/js/updateaccount.js"></script>

    <script type="text/javascript">
    var show = function (elem) {
        elem.style.display = 'block';
        };
        // Hide an element
        var hide = function (elem) {
            elem.style.display = 'none';
        };
        // Toggle element visibility
        var toggle = function (elem) {
            // If the element is visible, hide it
            if (window.getComputedStyle(elem).display === 'block') {
                hide(elem);
                return;
            }
            // Otherwise, show it
            show(elem);

        };
</script>