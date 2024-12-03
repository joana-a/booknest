<?php
require_once("../settings/db_class.php");

class search_class extends db_connection {
    public function search_books($search_item) {
        $ndb = new db_connection();
        $search_item = mysqli_real_escape_string($ndb->db_conn(), $search_item);
        $sql = "SELECT * FROM `books` WHERE title LIKE '%{$search_item}%' OR author LIKE '%{$search_item}%'";
        $result = $this->db_fetch_all($sql);
        return $result;
    } 

    

}