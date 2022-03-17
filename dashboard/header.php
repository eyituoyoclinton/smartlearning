<?php 
session_start();
@$logged = $_SESSION['login'];
$email = @$_SESSION['email'];
if($logged != true || $email === ''){
		echo"<script>document.location='/learn/Login';</script>";
    }
// $dashboardUrl = "http://192.168.4.250/learn/dashboard"; 
$dashboardUrl = "http://localhost/learn/dashboard"; 
// $baseUrl = "http://192.168.4.250/learn";
$baseUrl = "http://localhost/learn";
require_once $_SERVER["DOCUMENT_ROOT"] ."/learn/scripts/php/functions.php";

$fetchDetails = fetchUserLogin($email);
$fullName = $fetchDetails[0]->fullname;
$mobile = $fetchDetails[0]->mobile;
$address = $fetchDetails[0]->address;
$email = $fetchDetails[0]->email;
$city = $fetchDetails[0]->city;
$state = $fetchDetails[0]->state;
$userid = $fetchDetails[0]->id;
$getOrders = getOrders($userid);
$getOrdersNumber = getOrdersNumber($userid);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Foodies - User Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/fav.png" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="<?php echo $dashboardUrl; ?>/assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="<?php echo $dashboardUrl; ?>/assets/css/style.css" rel="stylesheet" />
    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $dashboardUrl; ?>/assets/css/styles/all-themes.css" rel="stylesheet" />
</head>

<body class="light">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.html#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="index.html#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="index">
                    <img src="../images/smfood.png" alt="" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="index.html#" onClick="return false;" class="sidemenu-collapse">
                            <i data-feather="align-justify"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->
                    <li class="dropdown user_profile">
                        <div class="chip dropdown-toggle" data-toggle="dropdown">
                            Hello, <?php echo $fullName; ?>
                        </div>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="<?php echo $dashboardUrl; ?>/profile">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../faq">
                                            <i class="material-icons">help</i>Help
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../logout">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="../index">
                            <i data-feather="home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $dashboardUrl; ?>/index">
                            <i data-feather="grid"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $dashboardUrl; ?>/orders">
                            <i class="fas fa-shopping-basket"></i>
                            <span>My courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="../courses">
                            <i class="fas fa-shopping-cart"></i>
                            <span>All courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $dashboardUrl; ?>/profile">
                            <i class="fas fa-user-tie"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </div>