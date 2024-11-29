 <?php
 include ("../classes/cart_class.php");

 function addtoCart_ctr($userId, $bookId, $quantity){
    $cartClass= new cart_class();
    $result= $cartClass->addtoCart($userId, $bookId, $quantity);
    return $result;
 } 

 function viewCart_ctr($userId){
   $cartClass= new cart_class(); 
   return $cartClass->viewCart($userId);
 }
 
 function deleteCart_ctr($bookId){
   $cartClass= new cart_class();
   return $cartClass->deleteCart($bookId);
 }

 function updateCart_ctr($bookId, $quantity){
   $cartClass= new cart_class();
   return $cartClass->updateCart($bookId, $quantity);
 }