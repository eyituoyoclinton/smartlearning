// js file for the validation of user registration

(function () {
    function processRegister() {
        let formOne = document.querySelector('#checkoutBtn')
        formOne.addEventListener('click', function (e) {
            e.preventDefault()
            let fullname = document.querySelector('#fullname').value
            let phone = document.querySelector('#mobile').value
            let email = document.querySelector('#email').value
            let totalPrice = document.querySelector('#totalAmount').textContent
            let reg = /^[a-zA-Z0-9_.-\s]*$/
            //checking if fullname is present
            if (totalPrice.trim() === '' || totalPrice === 0) {
                return showError("Please select an item first");
            }


            let getProducts = Object.values(JSON.parse(localStorage.getItem('products')));

            //object to be sent to endpoint
            let sendData = {
                fullname: fullname.trim(),
                phone: phone.trim(),
                email: email.trim(),
                product: JSON.stringify(getProducts),
                totalPrice: totalPrice
            }
            let getName = fullname.split(' ')
            let firstName = getName[0]
            // return
            document.querySelector('#checkoutBtn').textContent = 'Processing...'
            $.ajax({
                type: "POST",
                url: './scripts/php/cart-reg.php',//endpoint 
                data: sendData,
                //    dataType:'text',
                success: function (data) {
                    document.querySelector('#checkoutBtn').textContent = 'Register'
                    if (data.success) {
                        document.querySelector('#checkoutBtn').textContent = 'Order Now'
                        getPayStack(totalPrice, email, firstName, data.success)
                    } else {
                        return showError(data.error);
                    }
                }
            });
        })



        // <!-- Pay with paystack -->

        function getPayStack(totalPrice, email, firstName, pin) {
            var sendData = {
                invoice: pin,
                email: email
            }
            var handler = PaystackPop.setup({
                key: '',
                email: email,
                amount: totalPrice.replace(",", "") * 100,
                currency: "NGN",
                ref: pin,
                firstname: firstName,
                callback: function (response) {
                    let status = response.status
                    if (status === 'success' || status === "success") {
                        $.ajax({
                            type: "POST",
                            url: './scripts/php/order_paystack.php',
                            data: sendData,
                            //    dataType:'text',
                            success: function (data) {
                                if (data.success) {
                                    window.localStorage.removeItem('products')
                                    $('#paystackSuccess1').modal('show')
                                } else {
                                    return showError(data.error);
                                }
                            }
                        })
                    } else {
                        alert(status)
                    }


                },
                //   onClose: function(){
                //       alert('window closed');
                //   }
            })
            handler.openIframe()
        }
    }
    processRegister()
})()