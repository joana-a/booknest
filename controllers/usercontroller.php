<?php
include_once("../classes/userclass.php");



function registerUser_ctr($username, $email, $password, $gender, $contact_no, $user_role){
	$adduser=new user_class();
	$result = $adduser->registerUser($username, $email, $password, $gender, $contact_no, $user_role);
}


function loginUser_ctr($username, $password) {
	$loginClass = new user_class();
	$result = $loginClass->loginUser($username, $password);

    
    return $result;
}
function get_customers_controller() {
    $newProduct = new user_class();
    return $newProduct->viewAllCustomers();
} 


 
 

















