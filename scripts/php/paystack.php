<?php 
require_once 'functions.php';
require_once 'helpers/helper.php';


// Getting Post value
$amountToPay = $_POST["amount"];
$city = $_POST["city"];
// $amountToPay = filter_var($_POST["amount"], FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
$invoice = $_POST["invoice"];
$invoiceNumber = 'PST'.$invoice;
$basketId = $_POST["basketid"];
$userId = $_POST["userId"];

/**
 * VALIDATION FOR EMAIL STARTS HERE
 */
if (empty($userId)) {
    return helper::Output_Error(null, "User Id is required");
}
if($userId === ''){
    return helper::Output_Error(null, "User Id field cannot be empty");
}
/**
 * VALIDATION FOR AMOUNT STARTS HERE
 */
if (empty($amountToPay)) {
    return helper::Output_Error(null, "Amount is required");
}
if($amountToPay === ''){
    return helper::Output_Error(null, "Amount field cannot be empty");
}
/**
 * VALIDATION FOR City STARTS HERE
 */
if (empty($city)) {
    return helper::Output_Error(null, "city is required");
}
if($city === ''){
    return helper::Output_Error(null, "city field cannot be empty");
}

/**
 * VALIDATION FOR INVOICE NUMBER STARTS HERE
 */
if (empty($invoiceNumber)) {
    return helper::Output_Error(null, "Invoice number is required");
}
if($invoiceNumber === ''){
    return helper::Output_Error(null, "Invoice Number field cannot be empty");
}
if(substr($invoiceNumber, 0, 3) != 'PST'){
    return helper::Output_Error(null, "Invalid Invoice number");
}
/**
 * VALIDATION FOR basket Id STARTS HERE
 */
if (empty($basketId)) {
    return helper::Output_Error(null, "basket Id is required");
}
if($basketId === ''){
    return helper::Output_Error(null, "basket Id field cannot be empty");
}

$fetch = fetchUserById($userId);
// database error
if(array_key_exists('error',  $fetch)){
    return helper::Output_Error(null, "Opps there was an error performing this task please try again later");
}
if(count($fetch) === 0){
    return helper::Output_Error(null, "invalid user");
}
$userEmail = $fetch[0]->email;
$userFullName = $fetch[0]->fullname;
$fetchBasket = fetchBasketDetailsById($basketId);
if(count($fetchBasket) === 0){
    return helper::Output_Error(null, "Invalid Basket Selected");
}
$basketName = $fetchBasket[0]->title;
$date_created = date("d-m-Y");
$submitBasketDetails = buyBasket($city, $basketId, $amountToPay, $userId,$invoiceNumber, $date_created, 1);
if($submitBasketDetails === TRUE){
    return helper::Output_Success(["success"=>"Your payment was successful"]);
}else{
    return helper::Output_Error(null, "Oops there was an error please try again");
}


?>