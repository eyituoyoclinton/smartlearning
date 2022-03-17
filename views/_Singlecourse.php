<?php
session_start();
$row = mysqli_fetch_assoc($courseDetails);
$title1 = $row['title'];
$amount = $row['price'];
$slug = $row['slug'];
$price = number_format($row['price']);
$img = $row['img'];
$desc = $row['description'];
$basketId = $row['id'];
$categoryId = $row['category'];
$title = $row['title'].' || Learn.com';
require_once 'header.php';
@$myUser = fetchUserLogin($email);
@$userId = $myUser[0]->id;
@$userEmail = $myUser[0]->email;
@$userFullName = $myUser[0]->fullname;
@$userAddress = $myUser[0]->address;

//check if the user is enr
?>
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs">
            <div class="rs-breadcrumbs-inner">
                <div class="container">
                    <div class="breadcrumbs-inner">
                        <h1 class="page-title text-white"><?php echo $title1; ?></h1>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->
        <!-- Basket Single Page Start Here -->
        <div class="single-product-page pt-100 pb-70">
                <div class="container">
                    <div class="row">                
                        <div class="col-lg-12 col-md-12">
                            <div class="single-product-area left-area">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 mb-sm-30">  
                                        <div class="inner-single-product-slider">
                                            <div class="inner">
                                                <div class="slider single-product-image">
                                                    <div>
                                                        <div class="images-single">
                                                            <img src="<?php echo $url; ?>/images/course/<?php echo $img; ?>" alt="<?php echo $title; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                       <div class="single-price-info">
                                            <h4><?php echo $title1; ?></h4>
                                            <span class="single-price" id="">₦<span id="total-price"><?php echo $price; ?></span> </span>
                                            <p><pre><?php echo $desc; ?></pre></p>
                                            <div class="order-pro order1 mb-2" style="visibility:hidden">
                                                <input id="unit-number" type="number" min="1" value="1" disabled />
                                            </div>
                                            <p style="margin-top:-10px"></p>
                                            <?php 
                                            if(@$_SESSION['login'] && @$_SESSION['login']='true'){
                                                $userOrder = checkUserOrder($basketId, @$userId);
                                                if(mysqli_num_rows($userOrder) === 0){
                                                    echo '
                                                     <button class="hostlab-btn mbt-5" onclick="addItemToCart()" id="addToCart">Enrol</button>
                                                     ';
                                                }else{
                                                    echo '
                                                     <p>You are already a part of this course </p>
                                                     ';
                                                }
                                                }else{
                                                echo '<a href="'.$url.'/login" class="hostlab-btn mbt-5">Enrol</a>';

                                            }
                                            ?>
                                                <a class="btn-send" style="color:#fff; padding:10px; display:none" id="viewCartBtn" href="<?php echo $url; ?>/cart">View Cart</a>
                                        </div>
                                    </div> 
                                </div>       
                                                        
                            </div>                          
                        </div>
                    </div>
                    <div class="row our-products-section">
                        <div class="col-sm-12">
                            <div class="title-bar">
                                <h4 class="title-bg">Related Course</h4>
                            </div>
                        </div>
                        <?php
                        $fetchRelatedCourse = fetchRelatedCourse($categoryId);
                        $numRow = mysqli_num_rows($fetchRelatedCourse);
                        if ($numRow === 0) {
                            echo 'No Product available';
                        } else {
                            while ($row = mysqli_fetch_assoc($fetchRelatedCourse)) {
                                $mycourseName = $row['title'];
                                $mycourseSlug = $row['slug'];
                                $mycoursePrice = number_format($row['price']);
                                $mycourseId2 = $row['id'];
                                $mycourseImg = $row['img'];
                                if ($mycourseId2 === $basketId) {
                                } else {
                                    echo '
                                    <div class="col-md-6 col-lg-3 col-xs-12">
                                        <div class="single-product text-center">
                                            <div class="product-image">
                                                <div class="overly"></div>
                                                <a href="'.$url.'/course/'.$mycourseSlug.'"><img src="'.$url.'/images/course/'.$mycourseImg.'" alt="'.$mycourseName.'" /></a>
                                            </div>
                                            <div class="product-details">
                                                <div class="product-tile">
                                                    <a href="'.$url.'/course/'.$mycourseSlug.'" class="text-white">'.$mycourseName.'</a>
                                                    <span class="text-white">₦'.$mycoursePrice.'</span>
                                                </div>
                                                <div class="product-cart">
                                                    <a href="'.$url.'/course/'.$mycourseSlug.'" Enrol</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
            <!-- Basket Single Page End Here -->  
    <?php require_once 'footer.php'; ?>
    <script src="<?php echo $url; ?>/scripts/js/cart.js"></script>
    <script>
        function addItemToCart(){
// alert('hello')
            let totalPrice = document.getElementById('total-price').textContent.replace(/,/g, '').trim()
            // let totalKg = document.getElementById('dkg').textContent
            let unit = document.getElementById('unit-number').value;
            let productId = <?php echo $basketId; ?>;
            let singlePrice = <?php echo $amount; ?>;
            let productTitle = '<?php echo $title1; ?>';
            let productSlug = '<?php echo $slug; ?>';
            let Data = { title: productTitle, price: totalPrice, unitPrice: singlePrice, productId: productId, unit: unit, slug:productSlug}

            let storeData = JSON.parse(localStorage.getItem('products'))
            if(storeData){
            storeData[productTitle] = Data
            localStorage.setItem('products', JSON.stringify(storeData));
            location.reload();
            } else {
            let newData = {}
            newData[productTitle] = Data
            localStorage.setItem('products', JSON.stringify(newData));
            location.reload();
            }
            
        }
    </script>


    

    <div class="modal fade" id="openBasket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div class="">
                    <h3 class="modal-title" style="margin-left:10px">List of Items in the <?php echo $title1; ?></h3>
                </div>
                <?php
                $myItem = fetchBasketItem($basketId);
                $numRow = mysqli_num_rows($myItem);
                    if ($numRow === 0) {
                        echo '<p style="font-size:10rem; margin-top:20px" class="itemList">Coming Soon</p>';
                    } else {
                        while ($row = mysqli_fetch_assoc($myItem)) {
                            $itemName = $row['item-name'];
                            echo '<p class="itemList">'.$itemName.'</p>';
                        }
                    }

                ?>
            </div>
            </div>
        </div>
    </div>

    <!-- payment popup1 -->
    <div class="modal fade" id="openPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <script>
        function getAmount1(){
            var boxAmount = document.querySelector('#location1');
            var select = boxAmount.value;
            var select1 = boxAmount.options[boxAmount.selectedIndex].text;
            var locateSplit = select1.split('>>');

            var unit = document.getElementById('dkg').textContent
            var sellPrice = document.getElementById('total-price').textContent.replace(/,/g, '').trim()
            // var delAmount = document.querySelector('#delivery');
            var delAmountTotal = document.querySelector('#deliveryTotal');
            // delAmount.textContent = select
            var whatToPay = parseInt(sellPrice) + parseInt(select)
            delAmountTotal.textContent = whatToPay
            document.querySelector('#opay').textContent = whatToPay;
            document.querySelector('#box-price').textContent = sellPrice;
            document.querySelector('#box-kg').textContent = unit;
            document.querySelector('#delLocate').textContent = locateSplit[0];
            document.querySelector('#ocity').textContent = locateSplit[0];

            var mybtn = document.querySelectorAll(".mepay")
            if(sellPrice < 5000){
                document.querySelector('#warning').textContent = 'Notice: We only process orders above ₦5,000';
                for(i in mybtn){
                    mybtn[i].disabled = true;
                }
            }else{
                document.querySelector('#warning').textContent = '';
                for(i in mybtn){
                    mybtn[i].disabled = false;
                }
            }

            
        }
    </script>
          <?php
           if ($logged != true) {
               echo '
                <div class="modal-body">
                    <div class="text-center">
                        <h5 class="modal-title" style="color:#07c507">You need to login to be able to buy a basket</h5>
                    </div>
                    <a href="'.$url.'/login" onclick="" class="btn btn-border-radius hostlab-btn m-t-15 waves-effect w-100" style="margin-top:50px; color:#fff">Login</a>
                </div>
                ';
           } else {
               echo '
               <div class="modal-body">
                    <div class="text-center">
                        <h4 class="modal-title" style="color:#07c507">Payment Options</h4>
                        <h4 class="modal-title" style="color:#07c507">Chicken Total Price: ₦<span id="box-price"></span></h4>
                        <h4 class="modal-title" style="color:#07c507">Unit: <span id="box-kg"></span></h4>
                        <h4 class="modal-title" style="color:#07c507">Location: <span id="delLocate"> </span> </h4>
                        <h4 class="modal-title" style="color:#07c507">Total: ₦<span id="deliveryTotal"></span></h4>
                        <h4 class="modal-title" style="color:red"><span id="warning"></span></h4>
                    </div>
                    <p class="text-center mt-4">Hey <span style="color:#07c507"></span> We have created multiple payment options just for you. You can either pay with Card or via Bank. Your details are well secured.</p>
                    <button type="button" onclick="getPayStack()" class="btn btn-border-radius hostlab-btn m-t-15 waves-effect w-100 mepay" style="margin-bottom:20px">Pay With Paystack</button>
                    <button type="button" onclick="getAmount1()" class="btn btn-border-radius hostlab-btn m-t-15 waves-effect w-100 mepay" data-toggle="modal" data-target="#bankPayment">Pay With Bank</button>
                </div>
               ';
           }
          ?>
        
        <div class="modal-footer mt-4">
        <p class="text-center">Have any troubles? call us or send us a whatsapp message at +234 803 841 4781 or email us at hello@Learn.com</p>
        </div>
        </div>
    </div>
    </div>

<!-- bank and paystack payment -->
<div class="modal fade" id="bankPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
            <h5 class="modal-title" style="color:#07c507">Bank Payment Details</h5>
        </div>
        <div id="Berror_message" style="width:100%; display:none; color:red; text-align: center; margin: 5px"></div>
        <div id="Bsuccess_message" style="width:100%; display:none; color:green; text-align: center; margin: 5px"></div>
        <p class="text-center mt-4">Hello see Learn.com bank details below. Please copy the details and click on the confirm transaction button to proceed.</p>
        <p class="" style="font-weight:bold">Amount to Pay: <span id="opay"></span></p>
        <p class="" style="font-weight:bold">Your City: <span id="ocity"></span></p>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="featured-item">
                    <div class="">
                        <p>Account Name: Foodies Limited</p>
                        <p>Account Number: 1016288833</p>
                        <p>Bank Name: Zenith Bank</p>
                    </div>
                </div><!--  //.featured-item -->
            </div>

        </div>
        <button id="myPayBtn" type="button" onclick="payWithBank()" class="btn btn-border-radius btn-primary m-t-15 waves-effect w-100 mb-40">Process Transaction</button>
      </div>
      <div class="modal-footer mt-4">
      <p class="text-center">Have any troubles? call us or send us a whatsapp message at +234 803 841 4781 or email us at hello@Learn.com</p>
      </div>
    </div>
  </div>
</div>
<!-- paystack success -->
<div class="modal fade" id="paystackSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
            <h5 class="modal-title" style="color:#07c507">Your Payment Was Successful</h5>
        </div>
        <p class="text-center mt-4">Thank your for buying a basket. The basket will be delivered packed for delivery soon</p>
        <button type="button" onclick="window.location.href='<?php $url; ?>/ofood/dashboard/orders'" class="btn btn-border-radius btn-primary m-t-15 waves-effect w-100 mb-40">Return to dashboard</button>
      </div>
      <div class="modal-footer mt-4">
      <p class="text-center">Have any troubles? call us or send us a whatsapp message at +234 803 841 4781 or email us at hello@Learn.com</p>
      </div>
    </div>
  </div>
</div>


<script>

function payWithBank(){
    var userId = <?php echo $userId; ?>;
    var city = document.querySelector('#ocity').textContent
    var basketId = <?php echo $basketId; ?>;
    var what2Pay = document.querySelector('#opay').textContent
    var noOfKg = document.querySelector('#box-kg').textContent
    function randomString(len) {
        var p = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return [...Array(len)].reduce(a=>a+p[~~(Math.random()*p.length)],'');
    }
    var invoiceId = randomString(4)
    sendData = {
        userId: userId,
        amount: what2Pay,
        invoice: invoiceId,
        basketid:basketId,
        city:city,
        kg:noOfKg
    }
    document.querySelector('#myPayBtn').textContent = 'Processing...'
    $.ajax({
        type: "POST",
        url: '/ofood/scripts/php/chicken_bank.php',//endpoint 
        data: sendData,
    //    dataType:'text',
        success: function(data){
        document.querySelector('#myPayBtn').textContent = 'Process Transaction'
            if(data.success){
                $('#openPayment').modal('hide')
                $('#Bsuccess_message').show();
                document.querySelector('#Bsuccess_message').textContent = data.success;
                setInterval(function(){ 
                    window.location = '/ofood/dashboard/index'
                }, 3000);
            }else{
            $('#Bsuccess_message').hide();
            $('#Berror_message').show();
            document.querySelector('#Berror_message').textContent = data.error;
            return;
            }
            $('#Berror_message').hide();
        }
    });
}
</script>

<!-- Pay with paystack -->
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    var userId = <?php echo $userId; ?>;
    var basketId = <?php echo $basketId; ?>;
    
  function getPayStack(){
    var what2Pay = document.querySelector('#opay').textContent
    var city = document.querySelector('#ocity').textContent
    var noOfKg = document.querySelector('#box-kg').textContent
    function randomString1(len) {
        var p = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return [...Array(len)].reduce(a=>a+p[~~(Math.random()*p.length)],'');
    }
    var invoiceId2 = randomString1(4)
    sendData = {
        userId: userId,
        amount: what2Pay,
        invoice: invoiceId2,
        basketid:basketId,
        city:city,
        kg:noOfKg
    }
    
    var handler = PaystackPop.setup({
      key: 'pk_test_53223f57a3f06a542271b454179efc29104bd112',
      email: '<?php echo $email; ?>',
      amount: what2Pay * 100,
      currency: "NGN", 
      ref: 'PST' + invoiceId2, 
      firstname: '<?php echo $userFullName; ?>',
      callback: function(response){
		  var status = response.status
		  if(status === 'success'){
			$.ajax({
                type: "POST",
                url: '/ofood/scripts/php/chicken_paystack.php',//endpoint 
                data: sendData,
            //    dataType:'text',
                success: function(data){
                    if(data.success){
                        $('#openPayment').modal('hide')
                        $('#paystackSuccess').modal('show')
                    }else{
                        alert(data.error)
                    }
                }
            });
		  }else{
			alert(status);
		  }
		  
			  
      },
    //   onClose: function(){
    //       alert('window closed');
    //   }
    });
    handler.openIframe();
  }
</script>




<script>
$(document).ready(function(){
    if (localStorage.hasOwnProperty("products")) {
    let storeData = Object.keys(JSON.parse(localStorage.getItem('products'))).length
    document.querySelector("#cartNo").innerHTML = storeData;
    if(storeData > 0){
        // document.querySelector('#viewCartBtn').style.display = "block";
        $("#viewCartBtn").show();
        document.querySelector('#buyBtn').style.display = "none";
    }
}
});

</script>