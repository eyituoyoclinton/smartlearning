<?php

require_once 'functions.php';
require_once 'helpers/helper.php';
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer();

// Getting Post value
$invoice = $_POST['invoice'];
$email = $_POST['email'];

/*
 * VALIDATION FOR INVOICE NUMBER STARTS HERE
 */
if (empty($invoice)) {
    return helper::Output_Error(null, 'Invoice number is required');
}
if ($invoice === '') {
    return helper::Output_Error(null, 'Invoice Number field cannot be empty');
}

$fetch = fetchUserLogin($email);
if(array_key_exists('error',  $fetch)){
    return helper::Output_Error(null, "Invalid details");
}
if(count($fetch) === 0){
    return helper::Output_Error(null, "User not found");
}

$userId = $fetch[0]->id;
$userName = $fetch[0]->fullname;

$fetchInvoice = fetchOrderByInvoice($invoice);
if(count($fetchInvoice) === 0){
	return helper::Output_Error(null, "There is no pending payment with this invoice");
}

$htmlPart = [];
foreach ($fetchInvoice as $value) {
	// $getTitle = getTitle()
	$htmlPart[] = '<tr>
	<td>'.$value->title.'</td>
	<td>₦'.number_format($value->price).'</td>
	<td>'.$invoice.'</td>
	</tr>';
}

//update the invoice list
$getUpdatedOrder = updateOrder($invoice);
if($getUpdatedOrder){
	$message = helper::sendPayInvoice($fullname, $htmlPart);
    helper::SendMail($message, $email, 'Your order was successful', true);
    return helper::Output_Success(['success' => 'Your order was successful']);
}else{
	return helper::Output_Error(null, "There was an error processing this order, please send an email to support@learn.com");
}

