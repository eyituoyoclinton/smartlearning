<?php

$field_name = $_POST['fullname'];
$field_email = $_POST['email'];
$field_phone = $_POST['phone'];
$field_message = $_POST['message'];

/**
 * VALIDATION FOR FIRSTNAME STARTS HERE
 */
if (empty($field_name)) {
    return helper::Output_Error(null, "Full Name is required");
}
if($field_name === ''){
    return helper::Output_Error(null, "Full field cannot be empty");
}
if(strlen($field_name) < 2){
    return helper::Output_Error(null, "Please put in a valid Name");
}

/**
 * VALIDATION FOR EMAIL STARTS HERE
 */
if (empty($field_email)) {
    return helper::Output_Error(null, "Email is required");
}
if($field_email === ''){
    return helper::Output_Error(null, "Email field cannot be empty");
}
if (!filter_var($field_email, FILTER_VALIDATE_EMAIL)) {
    return helper::Output_Error(null, "Please put in a valid email");
}
/**
 * VALIDATION FOR PHONE STARTS HERE
 */
if (empty($field_phone)) {
    echo "Phone Number is required";
}
if($field_phone === ''){
    echo "Phone number field cannot be empty";
}
if (strlen($field_phone) < 6 || strlen($phone) > 16) {
    echo "Please put in a valid mobile number";
}
if(!preg_match("/^[0-9]/", $field_phone)){
    echo "Please mobile field can only be number";
}
if (empty($field_message)) {
    echo "message is required";
}
if($field_message === ''){
    echo "message field cannot be empty";
}


$mail_to = 'hello@foodies.ng';
$subject = 'Message from a Foodies user';

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Mobile: '.$field_phone."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

    if($mail_status) {
        
        echo 'success';
    } else {
		echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail_status->ErrorInfo;
    }
 
?>