<?php
require_once "helpers/Database.php";
require_once 'functions.php';
require_once 'helpers/helper.php';
// $baseUrl = 'https://pluto.agrorite.com';
require "phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;
$conn = new Database();
// Getting Post value
$fullname = isset($_POST["fullname"]) ? trim($_POST["fullname"]) : null; 
$phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : null;  
$email = isset($_POST["email"]) ? trim($_POST["email"]) : null; 
$amountToPay = isset($_POST["totalPrice"]) ? trim($_POST["totalPrice"]) : null;
$product = isset($_POST["product"]) ? trim($_POST["product"]) : null;

$verveProduct = $conn->Excape($product);

/**
 * VALIDATION FOR FULLNAME STARTS HERE
 */
if (empty($fullname)) {
    return helper::Output_Error(null, "full Name is required");
}
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
if (empty($email)) {
    return helper::Output_Error(null, "Email is required");
}
if($email === ''){
    return helper::Output_Error(null, "Email field cannot be empty");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return helper::Output_Error(null, "Please put in a valid email");
}
/**
 * VALIDATION FOR PHONE STARTS HERE
 */
if (empty($phone)) {
    return helper::Output_Error(null, "Phone Number is required");
}
if($phone === ''){
    return helper::Output_Error(null, "Phone number field cannot be empty");
}
if (strlen($phone) < 6 || strlen($phone) > 16) {
    return helper::Output_Error(null, "Please put in a valid mobile number");
}
if(!preg_match("/^[0-9]/", $phone)){
    return helper::Output_Error(null, "Please mobile field can only be number");
}
// return;
/**
 * CHECK IF A USER EXIST WITH THE EMAIL ADDRESS
 */
$fetch = fetchUserLogin($email);
// database error
if(array_key_exists('error',  $fetch)){
    return helper::Output_Error(null, "Opps there was an error performing this task please try again later");
}
$datePaid = date("d-m-Y");
$invoice = genRandom(8);

$nProduct = json_decode($product);

if(count($fetch) === 0){
  return helper::Output_Error(null, "User does not exist");
}else{
  $userId = $fetch[0]->id;
      foreach($nProduct as $key){
        $insertOrder = buyCourse($userId, $datePaid, $invoice, $key->price, $key->productId);
        if(!$insertOrder){
          return helper::Output_Error(null, "There was an error processing your order");
        }
      }
      return helper::Output_Success(["success"=>$invoice]);
      
    
}
/**
 * SALTING THE PASSWORD INPUTED
 */

 
?>