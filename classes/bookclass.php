<?php
require_once("../settings/db_class.php");
class bookClass extends db_connection
{
        public function add_book($title, $author, $genre, $price, $bookcondition, $keywords, $imagePath, $quantity)
{
    $title = mysqli_real_escape_string($this->db_conn(), $title);
    $author = mysqli_real_escape_string($this->db_conn(), $author);
    $genre = mysqli_real_escape_string($this->db_conn(), $genre);
    $price = mysqli_real_escape_string($this->db_conn(), $price);
    $bookcondition = mysqli_real_escape_string($this->db_conn(), $bookcondition);
    $keywords = mysqli_real_escape_string($this->db_conn(), $keywords);
    $imagePath = mysqli_real_escape_string($this->db_conn(), $imagePath);
    $quantity = mysqli_real_escape_string($this->db_conn(), $quantity);

    $sql = "INSERT INTO `books` (`title`, `author`, `genre`, `price`, `book_condition`, `keywords`, `image`, `quantity`) 
            VALUES ('$title', '$author', '$genre', '$price', '$bookcondition', '$keywords', '$imagePath', '$quantity')";

    return $this->db_query($sql);
}
    public function deletebook($bookId) {
        $bookId = mysqli_real_escape_string($this->db_conn(), $bookId);
        $sql = "DELETE FROM books WHERE book_id = '$bookId'";
        return $this->db_query($sql);
    }

    public function updateBook( $bookId, $quantity, $price, $bookcondition) {
        $bookId = mysqli_real_escape_string($this->db_conn(), $bookId); 
        $quantity = mysqli_real_escape_string($this->db_conn(), $quantity);
        $price = mysqli_real_escape_string($this->db_conn(), $price);
        $bookcondition = mysqli_real_escape_string($this->db_conn(), $bookcondition);
        
        $sql = "UPDATE `books` 
        SET `quantity` = '$quantity', `price` = '$price', `book_condition` = '$bookcondition' 
        WHERE `book_id` = '$bookId'";
        return $this->db_query($sql);
        }

    public function viewAllbooks(){
        $ndb = new db_connection();
        $sql = "SELECT * FROM books";
        return $this->db_fetch_all($sql); 
    }

    public function viewTopbooks(){
        $ndb = new db_connection();
        $sql = "SELECT * FROM books LIMIT 16";
        return $this->db_fetch_all($sql); 
    }


    public function viewRomancebooks($romance){
        $ndb = new db_connection();
        $romance = mysqli_real_escape_string($this->db_conn(), $romance); 
        $sql = "SELECT * FROM books where genre = '$romance'";
        return $this->db_fetch_all($sql); 
    }

    public function viewFantasybooks($fantasy){
        $ndb = new db_connection();
        $fantasy = mysqli_real_escape_string($this->db_conn(), $fantasy); 
        $sql = "SELECT * FROM books where genre = '$fantasy'";
        return $this->db_fetch_all($sql); 
    }
    public function viewThrillerbooks($thriller){
        $ndb = new db_connection();
        $thriller = mysqli_real_escape_string($this->db_conn(), $thriller); 
        $sql = "SELECT * FROM books where genre = '$thriller'";
        return $this->db_fetch_all($sql); 
    }
    public function viewScifibooks($scifi){
        $ndb = new db_connection();
        $scifi = mysqli_real_escape_string($this->db_conn(), $scifi); 
        $sql = "SELECT * FROM books where genre = '$scifi'";
        return $this->db_fetch_all($sql); 
    }
    public function viewAfrilitbooks($afrilit){
        $ndb = new db_connection();
        $afrilit = mysqli_real_escape_string($this->db_conn(), $afrilit); 
        $sql = "SELECT * FROM books where genre = '$afrilit'";
        return $this->db_fetch_all($sql); 
    }
    public function viewTextbooks($textbooks){
        $ndb = new db_connection();
        $textbooks = mysqli_real_escape_string($this->db_conn(), $textbooks); 
        $sql = "SELECT * FROM books where genre = '$textbooks'";
        return $this->db_fetch_all($sql); 
    }
    public function viewNonfictionbooks($nonfiction){
        $ndb = new db_connection();
        $nonfiction = mysqli_real_escape_string($this->db_conn(), $nonfiction); 
        $sql = "SELECT * FROM books where genre = '$nonfiction'";
        return $this->db_fetch_all($sql); 
    }
} 