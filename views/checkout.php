<?php
session_start();
@$logged = $_SESSION['login'];
if($logged !='true'){
		echo"<script>document.location='login';</script>";
    }
$title = 'Checkout || Learn.com';
require_once 'header.php';
if ($logged) {
    $fetchDetails = fetchUserLogin($email);
    $fullName = $fetchDetails[0]->fullname;
    $mobile = $fetchDetails[0]->mobile;
    $address = $fetchDetails[0]->address;
    $email = $fetchDetails[0]->email;
    $city = $fetchDetails[0]->city;
    $state = $fetchDetails[0]->state;
}
?>
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs">
    <div class="rs-breadcrumbs-inner">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title text-white">Checkout</h1>
                <nav>
                    <ul>
                        <li><a href="index"><i class="fa fa-home"></i> Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="rs-check-out sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4 class="title-bg">Billing Details</h4>
                <div class="check-out-box">
                <div id="rerror_message" style="width:100%; display:none; color:red; margin: 5px"></div>
            <div id="rsuccess_message" style="width:100%; display:none; color:green; margin: 5px"></div>
                    <form id="contact-form" method="post">
                        <fieldset>
                            <div class="row">                                      
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Fullname*</label>
                                        <input id="fullname" name="fname" value="<?php echo @$fullName; ?>" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                    if ($logged) {
                                        echo '
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input id="email" value="'.$email.'" name="email" class="form-control" type="email" disabled>
                                            </div>
                                        </div>';
                                    } else {
                                        echo '
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input id="email" name="email" class="form-control" type="email">
                                            </div>
                                        </div>';
                                    }
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone*</label>
                                        <input name="phone" id="mobile" value="<?php echo @$mobile; ?>" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>	
                </div>	
            </div>
            <div class="col-md-4 mpt-40">
                <h4 class="title-bg">Your Order</h4>
                <div class="product-price">
                    <table id="checkout-Table">
                        <tr>
                            <td>Course title</td>
                            <td>Amount</td>
                        </tr>
                    </table>
                </div>
                <div class="product-price">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td>₦<span id="subTotal">0.00</span></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>₦<span id="totalAmount">0.00</span></td>
                        </tr>
                    </table>
                </div>
                <div class="rs-payment-system">
                    <button id="checkoutBtn" class="btn-send" type="submit">Enrol Now</button>
                </div>				
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="<?php echo $url; ?>/scripts/js/checkout.js"></script>
<script src="<?php echo $url; ?>/scripts/js/checkout-form.js"></script>
<script src="<?php echo $url; ?>/scripts/js/changeprice.js"></script>

<div class="modal fade" id="paystackSuccess1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
            <h5 class="modal-title" style="color:#07c507">Your Payment Was Successful</h5>
        </div>
        <p class="text-center mt-4">Thank your for enroling on Learn.com.</p>
        <button type="button" onclick="window.location.href='<?php $url; ?>/index'" class="btn btn-border-radius btn-primary m-t-15 waves-effect w-100 mb-40">Return Home</button>
      </div>
      <div class="modal-footer mt-4">
      <p class="text-center">Have any troubles? call us or send us a whatsapp message at +2347061967265 or email us at hello@Learn.com</p>
      </div>
    </div>
  </div>
</div>