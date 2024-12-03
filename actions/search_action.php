<?php
session_start();
include_once('../controllers/searchcontroller.php');

if (isset($_POST['submit'])) {
    $search_item = $_POST['search'];

    $search_results = searchBooks_ctr($search_item);
    
    if ($search_results) {
        $_SESSION['search_results'] = $search_results;
    } else {
        $_SESSION['search_results'] = [];
    }

    header('Location: ../view/search_results.php');
    exit;
}
