<?php
require_once 'functions.php';
require_once 'helpers/helper.php';


// Getting Post value
$fullname = $_POST["fullname"]; 
$phone = $_POST["phone"]; 
$email = $_POST["email"]; 
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
/**
 * VALIDATION FOR fullname STARTS HERE
 */
if($fullname === ''){
    return helper::Output_Error(null, "fullname field cannot be empty");
}
if(strlen($fullname) < 2){
    return helper::Output_Error(null, "Please put in a valid fullname");
}
if(!preg_match("/^[a-zA-Z'-]/", $fullname)){
    return helper::Output_Error(null, "Firstname can only contain Alphabet and Numbers");
}
/**
 * VALIDATION FOR EMAIL STARTS HERE
 */
if($email === ''){
    return helper::Output_Error(null, "Invalid User");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return helper::Output_Error(null, "Please put in a valid email");
}
/**
 * VALIDATION FOR PHONE STARTS HERE
 */
if($phone === ''){
    return helper::Output_Error(null, "Phone number field cannot be empty");
}
if (strlen($phone) < 6 || strlen($phone) > 16) {
    return helper::Output_Error(null, "Please put in a valid mobile number");
}
if(!preg_match("/^[0-9]/", $phone)){
    return helper::Output_Error(null, "Please mobile field can only be number");
}
/**
 * VALIDATION FOR ADDRESS STARTS HERE
 */
if($address === ''){
    return helper::Output_Error(null, "Address field cannot be empty");
}
if(strlen($address) < 5){
    return helper::Output_Error(null, "Please put in a proper address");
}
/**
 * VALIDATION FOR city STARTS HERE
 */
if($city === ''){
    return helper::Output_Error(null, "city field cannot be empty");
}
if(strlen($city) < 2){
    return helper::Output_Error(null, "Please put in a proper city");
}
/**
 * VALIDATION FOR state STARTS HERE
 */
if($state === ''){
    return helper::Output_Error(null, "state field cannot be empty");
}
if(strlen($state) < 3){
    return helper::Output_Error(null, "Please put in a proper state");
}


/**
 * CHECK IF A USER EXIST WITH THE EMAIL ADDRESS
 */
$fetch = fetchUserLogin($email);
// database error
if(array_key_exists('error',  $fetch)){
    return helper::Output_Error(null, "Opps there was an error performing this task please try again later");
}
if(count($fetch) === 0){
    return helper::Output_Error(null, "Invalid User");
}


$update = updateUser($fullname, $email, $phone, $address, $city, $state);
if($update === TRUE){
    //send mail with link
    return helper::Output_Success(["success"=>"Your information have been updated"]);
}else{
    return helper::Output_Error(null, "Oops there was an error please try again");
}
 
?>