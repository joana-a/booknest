<?php
require('db_cred.php');

class db_connection
{
	
	//properties
	public $db = null;
	public $results = null;

	
	function db_connect(){
		
		//connection
		$this->db = mysqli_connect(SERVER,USERNAME,PASSWD,DATABASE);
		
		//test the connection
		if (mysqli_connect_errno()) {
			return false;
		}else{
			return true;
		}
	}

	function db_conn(){
		
		$this->db = mysqli_connect(SERVER,USERNAME,PASSWD,DATABASE);
		
		if (mysqli_connect_errno()) {
			return false;
		}else{
			return $this->db;
		}
	}


	
	function db_query($sqlQuery){
		
		if (!$this->db_connect()) {
			return false;
		}  
		elseif ($this->db==null) {
			return false;
		} 

		$this->results = mysqli_query($this->db,$sqlQuery);
		
		if ($this->results == false) {
			return false;
		}else{
			return true;
		}
	}

		function db_query_escape_string($sqlQuery){
		
		$this->results = mysqli_query($this->db,$sqlQuery);
		
		if ($this->results == false) {
			return false;
		}else{
			return true;
		}
	}

	
	function db_fetch_one($sql){
		
		if(!$this->db_query($sql)){
			return false;
		} 
		return mysqli_fetch_assoc($this->results);
	}

	//fetch all data
	
	function db_fetch_all($sql){
		
		if(!$this->db_query($sql)){
			return false;
		} 
		//return all record
		return mysqli_fetch_all($this->results, MYSQLI_ASSOC);
	}


	
	function db_count(){
		
		if ($this->results == null) {
			return false;
		}
		elseif ($this->results == false) {
			return false;
		}
		
		return mysqli_num_rows($this->results);

	}
	
}


