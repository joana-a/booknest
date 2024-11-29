<?php
require_once "../classes/bookclass.php";
function add_book_controller($title, $author, $genre, $price, $bookcondition, $keywords, $imageFile, $quantity)
{
    if (isset($imageFile) && $imageFile['error'] === 0) {
        $imageName = $imageFile['name'];
        $imageTmpName = $imageFile['tmp_name'];
        $imageSize = $imageFile['size'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExts) && $imageSize <= 2097152) { // 2MB limit
            if (!is_dir('../uploads')) {
                mkdir('../uploads', 0777, true);
            }

            $imageNewName = uniqid('', true) . '.' . $imageExt;
            $imageDestination = '../uploads/' . $imageNewName;

            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $newbook = new bookClass();
                return $newbook->add_book($title, $author, $genre, $price, $bookcondition, $keywords, $imageNewName, $quantity);
            }
        }
    }
    return false; 
}

function delete_book_controller($bookId)
{
    $newbook = new bookClass();
    return $newbook->deletebook($bookId);
}

function updateBook_ctr($bookId, $quantity, $price, $bookcondition){
    $cartClass= new bookClass();
    return $cartClass->updateBook($bookId, $quantity, $price, $bookcondition);

  }
function get_books_controller()
{
    $newbook = new bookClass();
    return $newbook->viewAllbooks();
}
function get_some_books_controller()
{
    $newbook = new bookClass();
    return $newbook->viewTopbooks();
}
function get_romance_books_controller($romance)
{
    $newbook = new bookClass();
    return $newbook->viewRomancebooks($romance);
}
function get_fantasy_books_controller($fantasy)
{
    $newbook = new bookClass();
    return $newbook->viewFantasybooks($fantasy);
}
function get_thriller_books_controller($thriller)
{
    $newbook = new bookClass();
    return $newbook->viewThrillerbooks($thriller);
}
function get_afrilit_books_controller($afrilit)
{
    $newbook = new bookClass();
    return $newbook->viewAfrilitbooks($afrilit);
}
function get_scifi_books_controller($scifi)
{
    $newbook = new bookClass();
    return $newbook->viewScifibooks($scifi);
}
function get_textbooks_books_controller($textbooks)
{
    $newbook = new bookClass();
    return $newbook->viewTextbooks($textbooks);
}
function get_nonfiction_books_controller($nonfiction)
{
    $newbook = new bookClass();
    return $newbook->viewNonfictionbooks($nonfiction);
}

