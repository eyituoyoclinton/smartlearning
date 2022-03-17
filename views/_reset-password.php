<?php 
$title = "Password Reset || Learn.com";
require_once 'header.php'; 
$email = $checkPin[0]->email;
?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white">Reset Password</h1>
                        <nav>
                            <ul>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><span>Reset Password</span></li>
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
            <div id="error_update" style="width:100%; display:none; color:red; text-align: center; margin: 5px"></div>
            <div id="success_update" style="width:100%; display:none; color:green; text-align: center; margin: 5px"></div>
                <div class="login-width">
                <div>
                    <p>Please enter your registered Email address below</p>
                </div>
                    <form class="login-form" id="pwdReset" method="post">
                        <input class="custom-placeholder" style="display:none" value="" type="text" id="email" name="name" required>
                        <label>New Password*</label>
                        <input class="custom-placeholder" type="text" id="password1" name="name" required>
                        <label>Confirm Password*</label>
                        <input class="custom-placeholder" type="text" id="password2" name="name" required>
                    
                        <div class="login-btn">
                            <button class="btn-send custom-placeholder" type="submit" id="updateBtn">Update Password</button>
                        </div>
                    </form>

                    <div class="bottom-content text-center">
                        <div class="line-set">or</div>
                        <a class="create-btn" href="<?php echo $url; ?>/Login">Login</a>
                    </div>
                </div>
            </div>                     
        </section>
        <!-- Login Section End -->
<?php require_once 'footer.php'; ?>
<script src="<?php echo $url; ?>/scripts/js/newpassword.js"></script>