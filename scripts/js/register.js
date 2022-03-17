// js file for the validation of user registration

(function () {
    function processRegister() {
        let formOne = document.querySelector('#registerFoodies')
        formOne.addEventListener('submit', function (e) {
            e.preventDefault()
            let fullname = document.querySelector('#fullName').value
            let phone = document.querySelector('#userMobile').value
            let email = document.querySelector('#userEmail').value
            let password = document.querySelector('#password').value
            let reg = /^[a-zA-Z0-9_.-\s]*$/
            let confirmPassword = document.querySelector('#confirm-password').value
            //checking if fullname is present
            if (fullname.trim() === '') {
                return showError("Please put in your fullname");
            }
            //checking the lenght of fullname
            if (fullname.trim().length < 2 || fullname.length > 90) {
                return showError("Please input a proper fullname");
            }
            //checking if fullname is alphanumeric
            if (!reg.test(fullname.trim())) {
                return showError("fullname can only be Alphanumberic");
            }

            //checking if email is submitted
            if (email.trim() === '') {
                return showError("Please put in an email");
            }

            //regex to validate email
            let emailRegex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            //checking if the email submitted is valid
            if (!email || !emailRegex.test(email.trim())) {
                return showError("Please input a valid email address");
            }
            //checking if mobile number is submitted
            if (phone.trim() === '' || phone.trim().length < 8) {
                return showError("Please put in a mobile number");
            }
            //checking if mobile number submitted is a number
            if (!/^[0-9]+$/.test(phone.trim())) {
                return showError("Please put in a valid mobile number");
            }
            //checking if password is submitted
            if (password.trim() === '' || password.trim().length < 6) {
                return showError("Please put in a strong password");
            }
            //checking if the confirm password matches the password submited
            if (confirmPassword.trim() !== password.trim()) {
                return showError("Password do not match");
            }
            //checking id the agreed button is checked
            if (!document.querySelector('#remember').checked) {
                return showError("Please accept our Terms of Service");
            }
            //object to be sent to endpoint
            let sendData = {
                fullname: fullname.trim(),
                phone: phone.trim(),
                email: email.trim(),
                password: password.trim(),
            }
            document.querySelector('#registerBtn').textContent = 'Processing...'
            $.ajax({
                type: "POST",
                url: '/learn/scripts/php/register.php',//endpoint 
                data: sendData,
                //    dataType:'text',
                success: function (data) {
                    document.querySelector('#registerBtn').textContent = 'Register'
                    if (data.success) {
                        showError(data.success);
                        document.querySelector('#registerBtn').textContent = 'Successful'
                        setInterval(function () {
                            document.location = 'login';
                        }, 5000);
                    } else {
                        return showError(data.error);
                    }
                }
            });
        })
    }
    processRegister()
})()