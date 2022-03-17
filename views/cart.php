<?php
session_start();
@$logged = $_SESSION['login'];
if($logged != 'true'){
		echo"<script>document.location='login';</script>";
    }
$title = 'Cart || Learn.com';
require_once 'header.php';

?>

 <!-- Breadcrumbs Start -->
 <div class="rs-breadcrumbs">
    <div class="rs-breadcrumbs-inner">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title text-white">Cart</h1>
                <nav>
                    <ul>
                        <li><a href="index"><i class="fa fa-home"></i> Home</a></li>
                        <li><span>Cart</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page Start Here -->
<div class="shipping-area sec-spacer">
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane active" id="checkout">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-list">
                            <table id="cart-products">
                                <tr style="display:none">
                                    <td><i class="fa fa-times"></i></td>
                                    <td>
                                        <div class="des-pro">
                                            <h4>Smoothie</h4>
                                        </div>
                                    </td>
                                    <td>₦<span id="total-price">1000</span><span style="visibility:hidden" id="dkg">1</span></td>
                                    <td>
                                        <div class="order-pro order1">
                                            <input id="unit-number" type="number" min="1" value="1" />
                                            
                                        </div>
                                    </td>
                                    <td class="single-price prize">₦<span id="amountToPay">1000</span><span style="visibility:hidden" id="buyKg">1</span></td>  
                                </tr>
                            </table>
                                                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="row sm-padding" id="hideEmpty">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="order-list">
                        <h3>Have A Coupon Code?</h3>
                        <div class="coupon-fields">

                            <input name="coupon_code" class="input-text required" id="coupon_code" value="" placeholder="Coupon code" type="text" disabled>
                            <input class="apply-coupon button button-default button-default-size button" name="apply_coupon" value="Coming Soon" type="button">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="order-list checkout-price">
                        <h3>Your Order</h3>
                        <table>
                            <tr>
                                <td><b></b></td>
                                <td><b>Total</b></td>
                            </tr>
                            <tr class="row-bold">
                                <td>Subtotal</td>
                                <td>₦<span id="subTotal">00</span></td>
                            </tr>
                            <tr class="row-bold">
                                <td>Total</td>
                                <td>₦<span id="totalAmount">00</span></td>
                            </tr>
                        </table>
                        <div class="next-step">
                            <a href="checkout">Proceeed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>                          
        </div>                                 
    </div>
</div>
<!-- Cart Page End Here  -->


<?php require_once 'footer.php'; ?>
<script src="<?php echo $url; ?>/scripts/js/cart.js"></script>
<script src="<?php echo $url; ?>/scripts/js/cart2.js"></script>
<script src="<?php echo $url; ?>/scripts/js/cart-count.js"></script>
