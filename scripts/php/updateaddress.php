<?php
require_once 'functions.php';
require_once 'helpers/helper.php';


// Getting Post value
$email = $_POST["email"]; 
$address = $_POST["address"];
if (empty($email)) {
    return helper::Output_Error(null, "Email is required");
}
if($email === ''){
    return helper::Output_Error(null, "Email field cannot be empty");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return helper::Output_Error(null, "Please put in a valid email");
}
if (empty($address)) {
    return helper::Output_Error(null, "address is required");
}
if($address === ''){
    return helper::Output_Error(null, "address field cannot be empty");
}
$fetch = fetchUserLogin($email);
if(array_key_exists('error',  $fetch)){
    return helper::Output_Error(null, "Invalid details");
}
if(count($fetch) === 0){
    return helper::Output_Error(null, "User not found");
}

$updateAddress = updateAdd($email, $address);
if($updateAddress === TRUE){
    return helper::Output_Success(["success"=>"Your Address has been Updated"]);
}else{
    return helper::Output_Error(null, "Oops there was an error please try again");
}
 
?>