(function () {
    function processContact() {
        let formOne = document.querySelector('#contact1')
        formOne.addEventListener('submit', function (e) {
            e.preventDefault()
            let fullname = document.querySelector('#userName').value
            let phone = document.querySelector('#userMobile').value
            let email = document.querySelector('#userEmail').value
            let message = document.querySelector('#userMessage').value
            let reg = /^[a-zA-Z0-9\s]+$/
            //checking if name is present
            if (fullname.trim() === '') {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please put in a name';
                return;
            }
            $('#error_conmessage').hide();
            //checking the lenght of name
            if (fullname.length < 2 || fullname.length > 90) {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please input a proper name';
                return;
            }
            $('#error_conmessage').hide();
            //checking if name is alphanumeric
            if (!reg.test(fullname)) {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Name can only be Alphanumberic';
                return;
            }
            $('#error_conmessage').hide();
            //checking if mobile number is submitted
            if (phone.trim() === '') {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please put in a mobile number';
                return;
            }
            $('#error_conmessage').hide();
            //checking if mobile number submitted is a number
            if (!/^[0-9]+$/.test(phone)) {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Mobile number can only be numbers';
                return;
            }
            $('#error_conmessage').hide();
            //checking the length of mobile number
            if (phone.length < 6 || phone.length > 16) {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please input a proper Mobile number';
                return;
            }
            $('#error_conmessage').hide();
            //checking if email is submitted
            if (email.trim() === '') {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please put in an email';
                return;
            }
            $('#error_conmessage').hide();
            //regex to validate email
            let emailRegex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            //checking if the email submitted is valid
            if (!emailRegex.test(email)) {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please input a valid email address';
                return;
            }
            $('#error_conmessage').hide();
            //checking if any message is submitted
            if (message.trim() === '') {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please put in a message';
                return;
            }
            $('#error_conmessage').hide();
            //check for the lenght of the message
            if (message.length < 10) {
                $('#error_conmessage').show();
                document.querySelector('#error_conmessage').textContent = 'Please input a valid message';
                return;
            }
            $('#error_conmessage').hide();
            //object to be sent to endpoint
            let sendData = {
                fullname: fullname,
                phone: phone,
                email: email,
                message: message
            }
            document.querySelector('#cSend').textContent = 'Sending...'
            $.ajax({
                type: "POST",
                url: '/learn/scripts/php/contact.php',//endpoint 
                data: sendData,
                dataType: 'text',
                success: function (data) {
                    if (data === "success") {
                        $('#success_conmessage').show();
                        document.querySelector('#success_conmessage').textContent = 'Thank you for your message. We will get back to your as soon as posible';

                        document.querySelector('#userName').value = ''
                        document.querySelector('#userMobile').value = ''
                        document.querySelector('#userEmail').value = ''
                        document.querySelector('#userMessage').value = ''
                        document.querySelector('#cSend').textContent = 'Send Message'
                    } else {
                        $('#success_conmessage').hide();
                        $('#error_conmessage').show();
                        document.querySelector('#error_conmessage').textContent = 'Sorry there was an error sending your message please try again';
                        document.querySelector('#cSend').textContent = 'Send Message'
                        return;
                    }
                    $('#error_conmessage').hide();
                }
            });
        })
    }
    processContact()
})()