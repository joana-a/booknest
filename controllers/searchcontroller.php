<?php
 include ("../classes/searchclass.php");

 function searchBooks_ctr($search_item){
    $searchClass= new search_class();
    $result= $searchClass->search_books($search_item);
    return $result;
 } 

 