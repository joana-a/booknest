<?php
 include ("../classes/wishlist_class.php");

 function addtoWishlist_ctr($userId, $bookId){
    $wishlistClass= new wishlist_class();
    $result= $wishlistClass->addtoWishlist($userId, $bookId);
    return $result;
 } 

 function viewWishlist_ctr($userId){
   $wishlistClass= new wishlist_class(); 
   return $wishlistClass->viewWishlist($userId);
 }

 function deleteWishlist_ctr($bookId){
   $wishlistClass= new wishlist_class();
   return $wishlistClass->deleteWishlist($bookId);
 }

