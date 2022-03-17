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
                        <h1 class="page-title text-white">Login Account</h1>
                        <nav>
                            <ul>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><span>Login Account</span></li>
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
                    <form class="login-form" id="loginForm" method="post">
                        <label>Email Address*</label>
                        <input class="custom-placeholder" type="text" id="loginEmail" name="name">
                        <label>Password*</label>
                        <input class="custom-placeholder" type="password" id="loginPassword" name="psw">

                        <div class="row">
                            <div class="col-12 center-xs">
                                <a href="<?php echo $url; ?>/forget-password" style="color:black">Lost your password?</a>
                            </div>
                        </div>

                        <div class="login-btn">
                            <button class="btn-send custom-placeholder" type="submit" id="loginButton">Login Now</button>
                        </div>
                    </form>

                    <div class="bottom-content text-center">
                        <div class="line-set">or</div>
                        <a class="create-btn" href="register">Create An Account</a>
                    </div>
                </div>
            </div>                     
        </section>
        <!-- Login Section End -->
<?php require_once 'footer.php'; ?>
<script src="<?php echo $url; ?>/scripts/js/login.js"></script>