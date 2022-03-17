<!-- this is the footer file -->


    <!-- Footer Client Start -->
    <section id="client-footer" class="client-footer" style="background-color:black">
        <!-- Footer Start -->
        <footer id="rs-hostlab-footer" class="rs-hostlab-footer" style="background-color:#211300">
            <div class="container">
                <!-- Footer Menu Start -->
                <div class="footer-content">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="footer-menu">
                                <h4 class="title">About Learn</h4>
                                <p class="text-white">We develop human capital by enhancing the skills, knowledge and prospects of people who want to have great careers as IT security practitioners. We do this by focusing on rounded training that leads to a successful result and additional support down the line.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="footer-menu">
                                <h4 class="title">Support</h4>
                                <ul>
                                    <li><a href="<?php echo $url; ?>/#">Faq</a></li>
                                    <li><a href="<?php echo $url; ?>/#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="footer-menu">
                                <h4 class="title">Company</h4>
                                <div class="partiton-menu">
                                    <ul>
                                        <li><a href="<?php echo $url; ?>/#">About Us</a></li>
                                        <li><a href="<?php echo $url; ?>/#">Terms of service</a></li>
                                        <li><a href="<?php echo $url; ?>/#">Privacy policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Menu End -->

            <!-- CopyRight Start -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div  class="copy-text">
                                &copy; 2022 <span>Smart Learning.</span> All Rights Reserved.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="social-links">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>

                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CopyRight End -->
        </footer>
        <!-- Footer End -->
    </section>
    <!-- Footer Client End -->

        <!-- Scrool to Top Start -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div> 
        <!-- Scrool to Top End -->
        
        <!-- modernizr js -->
        <script src="<?php echo $url; ?>/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="<?php echo $url; ?>/js/jquery.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo $url; ?>/js/bootstrap.min.js"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo $url; ?>/js/owl.carousel.min.js"></script>
        <!-- slick js -->
        <script src="<?php echo $url; ?>/js/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="<?php echo $url; ?>/js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="<?php echo $url; ?>/js/imagesloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="<?php echo $url; ?>/js/wow.min.js"></script>
        <!-- jquery.counterup js -->
        <script src="<?php echo $url; ?>/js/jquery.counterup.min.js"></script>
        <script src="<?php echo $url; ?>/js/waypoints.min.js"></script>
        <!-- main js -->
        <!-- rsmenu js -->
        <script src="<?php echo $url; ?>/js/rsmenu-main.js"></script>
        <!-- plugins js -->
        <script src="<?php echo $url; ?>/js/plugins.js"></script>
		 <!-- main js -->
        <script src="<?php echo $url; ?>/js/main.js"></script>
        <!--Floating WhatsApp css-->
        <link rel="stylesheet" href="//rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
        <!--Floating WhatsApp javascript-->
        <script type="text/javascript" src="//rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>
        <!--Div where the WhatsApp will be rendered-->
        <div id="WAButton"></div>
    </body>
</html>

<script>
$(document).ready(function(){
    if (localStorage.hasOwnProperty("products")) {
        let storeData = Object.keys(JSON.parse(localStorage.getItem('products'))).length
        document.querySelector("#cartNo").innerHTML = storeData;
        if(storeData > 0){
            // document.querySelector('#viewCartBtn').style.display = "block";
            $("#viewCartBtn").show();
            $('#buyBtn').hide();
        }   
    }else{
        // $('#buyBtn').hide();
    }   
});

</script>

<script>
   var baseURL = location.origin.indexOf('.com') > -1 ? location.origin : location.origin + '/foodies'
   var msgTimer = null;

   function showError(msg, autoHide = true) {
      if (msgTimer) {
         clearTimeout(msgTimer)
      }
      $('.flash-msg').removeClass('success')
      $('.flash-msg').addClass('error')
      $('.res-msg').text(msg)
      if (autoHide) {
         msgTimer = setTimeout(() => {
            clearMessage()
         }, 6000);
      }
   }

   function showSuccess(msg) {
      if (msgTimer) {
         clearTimeout(msgTimer)
      }
      $('.flash-msg').removeClass('error')
      $('.flash-msg').addClass('success')
      $('.res-msg').text(msg)
      msgTimer = setTimeout(() => {
         clearMessage()
      }, 6000);
   }

   function clearMessage() {
      $('.flash-msg').removeClass('error')
      $('.flash-msg').removeClass('success')
   }

//    $('#example').dataTable( {
//     "pageLength": 50
//     } );
</script>

