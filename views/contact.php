<?php 
$title = "Contact Us || Learn.com";  
require_once 'header.php'; 
?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white">Contact Us</h1>
                        <nav>
                            <ul>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><span>Contact Us</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Contact Information Start -->
        <section id="rs-contact-info" class="rs-contact-info">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Contact Information</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-grid  wow animated fadeInLeft">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="text-here">
                                <h3 class="title"><a>head office</a></h3>
                                <p class="some-text">
                                1B Olabanji Olajide Crescent, Off Mobolaji Johnson Estate, lekki phase 1, lagos. Phone:+234-803-841-4781
                                    hello@Learn.com
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-grid">
                            <div class="contact-icon">
                                <i class="fa fa-volume-control-phone"></i>
                            </div>
                            <div class="text-here">
                                <h3 class="title"><a>PHONE SUPPORT</a></h3>
                                <p class="some-text">
                                    Our Phone lines are open <br>from 8:30am to 4:30am<br>
                                    Mondays to Friday
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-grid wow animated fadeInRight">
                            <div class="contact-icon">
                                <i class="fa fa-comments-o"></i>
                            </div>
                            <div class="text-here">
                                <h3 class="title"><a>LIVE CHAT</a></h3>
                                <p class="some-text">
                                    We are avilable for chat via live chat <br>from 8:30am to 4:30am<br>
                                    Mondays to Friday
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Information End -->

        <!-- Contact form Start here -->
        <div id="rs-contact-comment" class="rs-contact-comment sec-spacer">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Leave a Message</h2>
                </div>
                <div id="error_conmessage" style="width:100%; display:none; color:red; text-align: center; margin: 5px"></div>
                <div id="success_conmessage" style="width:100%; display:none; color:green; text-align: center; margin: 5px"></div>
                <form id="contact1" method="post">
                    <fieldset>
                        <div class="row">                                      
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input name="name" id="userName" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input name="email" id="userEmail" class="form-control" type="email" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Phone Number*</label>
                                    <input name="number" id="userMobile" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12 col-sm-12">    
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea cols="40" rows="10" id="userMessage" name="message" class="textarea form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">         
                                <input class="btn-send" id="cSend" type="submit" value="Submit Now">
                            </div>
                        </div>    
                    </fieldset>
                </form>
            </div>                     
        </div>
        <!-- contact form ends here -->
<?php require_once 'footer.php'; ?>
<script src="<?php echo $url; ?>/scripts/js/contact.js"></script>