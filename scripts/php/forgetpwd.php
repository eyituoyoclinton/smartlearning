<?php
require_once 'functions.php';
require_once 'helpers/helper.php';
require "phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;
// Getting Post value
$email= $_POST["email"]; 
$baseUrl = 'http://localhost/learn';
// Calling function
if (empty($email)) {
    return helper::Output_Error(null, "Email is required");
}
if($email === ''){
    return helper::Output_Error(null, "Email field cannot be empty");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return helper::Output_Error(null, "Please put in a valid email");
}
$fetch = fetchUserLogin($email);
if(array_key_exists('error',  $fetch)){
    return helper::Output_Error(null, "Oops there has been a problem, please try again");
}
if(count($fetch) === 0){
    return helper::Output_Error(null, "Sorry this email address is not registered");
}
$userFullName = $fetch[0]->fullname;
function RANDOM_STRING($length){
    $str_result = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle($str_result), 0, $length);
}
$resetcode = RANDOM_STRING(50);

$resetPassword = resetPassword($email, $resetcode);
if($resetPassword === TRUE){
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'cenomedia.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->SMTPSecure = 'tls';
        $mail->Username   = 'info@cenomedia.com';                     // SMTP username
        $mail->Password   = 'helloPassWord';                               // SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('info@cenomedia.com', 'Cenomedia');   // Add a recipient
        $mail->addAddress($email, $userFullName);               // Name is optional
        $mail->addReplyTo('info@cenomedia.com', 'Information');
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Forgot Password Recovery';
        $mail->Body    = "<div> Dear " . $userFullName . ", <br><p>Click this link to recover your password below </p><br><p style='margin-top:20px'><a href='" . $baseUrl . "/reset-my-password/" . $resetcode . "'> Password Recovery </a><br></p> <br><p>Disregard this mail if you didn't initiate this process</p><br> Regards,<br> Foodies Team.</div>";
    
        $mail->send();
        return helper::Output_Success(["success"=>"Please check your email for your reset pin"]);
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return helper::Output_Error(null, "Oops there was an error processing your request please try again");
    }

}else{
    return helper::Output_Error(null, "Sorry we couldn't process your request please try again");
}

