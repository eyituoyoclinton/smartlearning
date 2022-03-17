<?php

require_once 'functions.php';
require_once 'helpers/helper.php';
$urlLink = 'http://localhost/learn';

require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

// Getting Post value
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
/*
 * VALIDATION FOR FULLNAME STARTS HERE
 */
if (empty($fullname)) {
    return helper::Output_Error(null, 'full Name is required');
}
if ($fullname === '') {
    return helper::Output_Error(null, 'fullname field cannot be empty');
}
if (strlen($fullname) < 2) {
    return helper::Output_Error(null, 'Please put in a valid fullname');
}
if (!preg_match("/^[a-zA-Z'-]/", $fullname)) {
    return helper::Output_Error(null, 'Firstname can only contain Alphabet and Numbers');
}
/*
 * VALIDATION FOR EMAIL STARTS HERE
 */
if (empty($email)) {
    return helper::Output_Error(null, 'Email is required');
}
if ($email === '') {
    return helper::Output_Error(null, 'Email field cannot be empty');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return helper::Output_Error(null, 'Please put in a valid email');
}
/*
 * VALIDATION FOR PHONE STARTS HERE
 */
if (empty($phone)) {
    return helper::Output_Error(null, 'Phone Number is required');
}
if ($phone === '') {
    return helper::Output_Error(null, 'Phone number field cannot be empty');
}
if (strlen($phone) < 8 || strlen($phone) > 16) {
    return helper::Output_Error(null, 'Please put in a valid mobile number');
}
if (!preg_match('/^[0-9]/', $phone)) {
    return helper::Output_Error(null, 'Please mobile field can only be number');
}
/*
 * VALIDATION FOR PASSWORD STARTS HERE
 */
if (empty($password)) {
    return helper::Output_Error(null, 'Password is required');
}
if ($password === '') {
    return helper::Output_Error(null, 'Password field cannot be empty');
}
if (strlen(trim($password)) < 6) {
    return helper::Output_Error(null, 'Password is not strong enough');
}

/**
 * CHECK IF A USER EXIST WITH THE EMAIL ADDRESS.
 */
$fetch = fetchUserLogin($email);
// database error
if (array_key_exists('error', $fetch)) {
    return helper::Output_Error(null, 'Opps there was an error performing this task please try again later');
}
if (count($fetch) > 0) {
    return helper::Output_Error(null, 'User already exist');
}
/**
 * SALTING THE PASSWORD INPUTED.
 */
$password_hash = password_hash($password, PASSWORD_BCRYPT);

$register = registerUser($fullname, $email, $phone, $password_hash);
if ($register === true) {
    $message = helper::sendWelcome($fullname, $email, $phone);
    helper::SendMail($message, $email, 'Welcome to Smart Learning', true);
    return helper::Output_Success(['success' => 'Your registration was successful']);
} else {
    return helper::Output_Error(null, 'Oops there was an error please try again');
}
