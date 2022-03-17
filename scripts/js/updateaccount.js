// js file for the validation of user registration

(function () {
    function processRegister() {
        let formOne = document.querySelector('#updateUserInfo')
        formOne.addEventListener('submit', function (e) {
            e.preventDefault()
            let fullname = document.querySelector('#fullname').value
            let phone = document.querySelector('#userMobile').value
            let email = document.querySelector('#userEmail').value
            let address = document.querySelector('#userAddress').value
            let city = document.querySelector('#userCity').value
            let state = document.querySelector('#userState').value
            let reg = /^[a-zA-Z0-9_.-\s]*$/
            //checking if fullname is present
            if (fullname.trim() === '') {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please put in a fullname';
                return;
            }
            $('#Aerror_update').hide();
            //checking the lenght of fullname
            if (fullname.trim().length < 2 || fullname.length > 90) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper fullname';
                return;
            }
            $('#Aerror_update').hide();
            //checking if fullname is alphanumeric
            if (!reg.test(fullname.trim())) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'fullname can only be Alphanumberic';
                return;
            }
            $('#Aerror_update').hide();
            //checking if email is submitted
            if (email.trim() === '') {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please put in an email';
                return;
            }
            $('#Aerror_update').hide();
            //regex to validate email
            let re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            //checking if the email submitted is valid
            if (!re.test(email.trim())) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a valid email address';
                return;
            }
            $('#Aerror_update').hide();
            //checking if mobile number is submitted
            if (phone.trim() === '') {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please put in a mobile number';
                return;
            }
            $('#Aerror_update').hide();
            //checking if mobile number submitted is a number
            if (!/^[0-9]+$/.test(phone.trim())) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Mobile number can only be numbers';
                return;
            }
            $('#Aerror_update').hide();
            //checking the length of mobile number
            if (phone.trim().length < 6 || phone.trim().length > 16) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper Mobile number';
                return;
            }
            $('#Aerror_update').hide();
            if (address.trim() === '') {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper Address';
                return;
            }
            $('#Aerror_update').hide();
            if (address.trim().length < 5) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper Address';
                return;
            }
            $('#Aerror_update').hide();
            //city
            if (city.trim() === '') {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper city';
                return;
            }
            $('#Aerror_update').hide();
            if (city.trim().length < 2) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper city';
                return;
            }
            $('#Aerror_update').hide();
            //state
            if (state.trim() === '') {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper state';
                return;
            }
            $('#Aerror_update').hide();
            if (state.trim().length < 3) {
                $('#Aerror_update').show();
                document.querySelector('#Aerror_update').textContent = 'Please input a proper state';
                return;
            }
            $('#Aerror_update').hide();


            //object to be sent to endpoint
            let sendData = {
                fullname: fullname.trim(),
                phone: phone.trim(),
                email: email.trim(),
                address: address.trim(),
                city: city.trim(),
                state: state.trim()
            }
            document.querySelector('#updateInfo').textContent = 'Processing...'
            $.ajax({
                type: "POST",
                url: '/learn/scripts/php/updateaccount.php',//endpoint 
                data: sendData,
                //    dataType:'text',
                success: function (data) {
                    document.querySelector('#updateInfo').textContent = 'Update Account'
                    if (data.success) {
                        $('#Asuccess_update').show();
                        document.querySelector('#Asuccess_update').textContent = data.success;
                    } else {
                        $('#Asuccess_update').hide();
                        $('#Aerror_update').show();
                        document.querySelector('#Aerror_update').textContent = data.error;
                        return;
                    }
                    $('#Aerror_update').hide();
                }
            });
        })
    }
    processRegister()
})()