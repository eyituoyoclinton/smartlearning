<?php 
session_start();
@$logged = $_SESSION['login'];
if($logged){
		echo"<script>document.location='index';</script>";
    }
$title = "Login || Learn.com";  
require_once 'header.php'; 
?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white">Registration</h1>
                        <nav>
                            <ul>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><span>Registration</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Login Section Start -->
        <section id="rs-login-section" class="rs-login-section sec-spacer">
            <div class="container">
                <div class="login-width">
                    <form class="login-form" id="registerFoodies" method="post">
                        <label>Fullname*</label>
                        <input class="custom-placeholder" type="text" id="fullName">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email Address*</label>
                                <input class="custom-placeholder" type="email" id="userEmail">
                            </div>
                            <div class="col-md-6">
                                <label>Mobile*</label>
                                <input class="custom-placeholder" type="text" id="userMobile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Password*</label>
                                <input class="custom-placeholder" type="password" id="password">
                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password*</label>
                                <input class="custom-placeholder" type="password" id="confirm-password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 center-xs">
                                <label class="checkbox">
                                <input class="checkbox" type="checkbox" name="agreement" id="remember"> I agree the User Agreement and <a href="<?php echo $url; ?>/terms" style="color:black">Terms & Condition.</a>
                                </label>
                            </div>
                        </div>

                        <div class="login-btn">
                            <button class="btn-send custom-placeholder" type="submit" id="registerBtn">Create Account</button>
                        </div>
                    </form>

                    <div class="bottom-content text-center">
                        <div class="line-set">or</div>
                        <a class="create-btn" href="login">Login</a>
                    </div>
                </div>
            </div>                     
        </section>
        <!-- Login Section End -->
<?php require_once 'footer.php'; ?>
<script src="<?php echo $url; ?>/scripts/js/register.js"></script>