/**
 * This JavaScript files takes care of the login of users
 * it receives the user email address as the username and then password, validates and sends it to the endpoint
 */
(function () {
    function processLogin() {
        let formOne = document.querySelector('#loginForm')
        formOne.addEventListener('submit', function (e) {
            e.preventDefault()
            let email = document.querySelector('#loginEmail').value
            let password = document.querySelector('#loginPassword').value
            //regext to validate email         
            let emailRegex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            //check if emailis submitted
            if (email.trim() === '') {
                return showError("Please put in an email");
            }
            //check if email is valid
            if (!emailRegex.test(email.trim())) {
                return showError("Please input a valid email address");
            }
            $('#lerror_message').hide();
            //check if password is submitted
            if (password.trim() === '') {
                return showError("Please put in a password");
            }

            //object to be sent to the endpoint
            let sendData = {
                email: email,
                password: password
            }
            document.querySelector('#loginButton').textContent = 'Processing...'
            $.ajax({
                type: "POST",
                url: '/learn/scripts/php/login.php',//endpoint 
                data: sendData,
                //    dataType:'text',
                success: function (data) {
                    document.querySelector('#loginButton').textContent = 'login'
                    if (data.success) {
                        window.history.go(-1);
                    } else {
                        return showError(data.error);
                    }
                }
            });
        })
    }
    processLogin()
})()