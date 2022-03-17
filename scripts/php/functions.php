<?php
require_once "helpers/Database.php";
    if(!Database::$conn){
        Database::Create_Connection();
    }
    //fetch course with limit on the homepage
    function fetchBasketHome(){
        $fetch = sprintf('SELECT * FROM `courses` ORDER BY RAND() LIMIT 6');
        $countId = Database::Query($fetch, 'all-basket');
        return $countId;
    }    
    // fetch course details
    function fetchCourseDetails($slug){
        $fetch = sprintf('SELECT * FROM `courses` WHERE `slug` = "%s"', $slug);
        $countId = Database::Query($fetch, 'details');
        return $countId;
    }
    //fetches related course
    function fetchRelatedCourse($id){
        $fetch = sprintf("SELECT * FROM `courses` WHERE `category`='%d' ORDER BY `id` DESC LIMIT 4", $id);
        $countId = Database::Query($fetch, 'all-basket');
        return $countId;
    }
    function fetchCourseTitle($id){
        $fetch = sprintf("SELECT * FROM `courses` WHERE `id`='%d'", $id);
        $countId = Database::Query($fetch, 'all-basket');
        // var_dump($fetch);
        return $countId;
    }

    function fetchAllCourses(){
        $fetch = sprintf("SELECT * FROM `courses` ORDER BY `id` DESC");
        $countId = Database::Query($fetch, 'all-basket');
        return $countId;
    }
    function checkUserOrder($basketId, $userId){
        $fetch = sprintf('SELECT * FROM `orders` WHERE `users_id` = "%d" AND `course_id`="%d" ORDER BY `id` DESC', $userId, $basketId);
        $countId = Database::Query($fetch, 's');
        return $countId;
    }
    function buyCourse($userId, $datePaid, $invoice, $amount, $id){
        $fetch = sprintf('INSERT INTO `orders` (`users_id`, `date_paid`, `invoice`, `amount`, `course_id`) VALUE("%d", "%s", "%s", "%s", "%d")', $userId, $datePaid, $invoice, $amount, $id);
        return Database::Query($fetch, 'buy-it');
    }

    //fetch user details using email
    function fetchUserLogin($email){
        $fetch = sprintf('SELECT * FROM `users` WHERE `email` = "%s"', $email);
        return Database::Query($fetch);
    }
    //fetch user details using id
    function fetchUserById($id){
        $fetch = sprintf('SELECT * FROM `users` WHERE `id` = "%s"', $id);
        return Database::Query($fetch);
    }
    // fetch order by invoice code
    function fetchOrderByInvoice($invoice){
        $fetch = sprintf('SELECT * FROM `orders` WHERE `invoice` = "%s" AND `statuses_id`=1', $invoice);
        return Database::Query($fetch);
    }
    //REGISTER NEW USER
    function registerUser($fullname, $email, $phone, $password){
        $fetch = sprintf('INSERT INTO `users` (`fullname`, `email`, `mobile`, `password`) VALUE("%s", "%s", "%s", "%s")', $fullname, $email, $phone, $password);
        return Database::Query($fetch, 'register');
    }

    //get user orders
    function getOrders($id){
        $fetch = sprintf('SELECT * FROM `orders` WHERE `users_id` = "%d" ORDER BY `id` DESC', $id);
        $countId = Database::Query($fetch, 's');
        return $countId;
    }
    function getOrdersNumber($id){
        $fetch = sprintf('SELECT * FROM `orders` WHERE `users_id` = "%d" AND `statuses_id` != 1', $id);
        $countId = Database::Query($fetch, 's');
        return $countId;
    }
    //get order status
    function getStatus($id){
        $fetch = sprintf('SELECT * FROM `statuses` WHERE `id` = "%d"', $id);
        $countId = Database::Query($fetch);
        return $countId;
    }

    //address update
    function updateOrder($invoice){
        $fetch = sprintf('UPDATE `orders` SET `statuses_id` = 2 WHERE `invoice` = "%s"', $invoice);
        return Database::Query($fetch, 'update');
    }


    
    //UPDATE FOODIES ACCOUNT
    function updateUser($fullname, $email, $phone, $address, $city, $state){
        $fetch = sprintf('UPDATE `users` SET `fullname` = "%s", `mobile` = "%s", `address` = "%s", `city` = "%s", `state` = "%s" WHERE `email` = "%s"', $fullname, $phone, $address, $city, $state, $email);
        return Database::Query($fetch, 'update');
    }
    //password update
    function updatePassword($email, $password){
        $fetch = sprintf('UPDATE `users` SET `password` = "%s", `forgetpasswordcode` = "" WHERE `email` = "%s"', $password, $email);
        return Database::Query($fetch, 'update');
    }
    //address update
    function updateAdd($email, $address){
        $fetch = sprintf('UPDATE `users` SET `address` = "%s" WHERE `email` = "%s"', $address, $email);
        return Database::Query($fetch, 'update');
    }
    
    //password reset
    function resetPassword($email, $resetPin){
        $fetch = sprintf('UPDATE `users` SET `forgotpasswordcode` = "%s" WHERE `email` = "%s"', $resetPin, $email);
        return Database::Query($fetch, 'update');
    }
     //validate password reset pin
     function checkPwdPin($pin){
        $fetch = sprintf('SELECT * FROM `users` WHERE `forgetpasswordcode` = "%s"', $pin);
        return Database::Query($fetch, 'pass-reset');
    }





    //to set date joined to days ago
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hr',
            'i' => 'min',
            's' => 'sec',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    //generate ramdon string
    function genRandom($length){
        $char = 'abcdefghijklmnopqrstuvwxyzABCCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $random = '';
        for($i = 0; $i < $length; $i++){
            $index = rand(0, strlen($char) - 1);
            $random .= $char[$index]; 
        }
        return $random;
    }

    
?>