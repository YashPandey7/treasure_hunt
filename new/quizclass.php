<?php

class Quiz {
// Database credentials
private $host     = 'localhost';
private $username = 'root';
private $password = '';
private $database = 'elitmus';
public  $db;

public function __construct(){
if(!isset($this->db)){
	// Connect to the database    
	try {
	$this->db = new mysqli($this->host, $this->username, $this->password, $this->database);
	}catch (Exception $e){
	$error = $e->getMessage();
	echo $error;
	}
}
}
public function get_questions(){
 $select = "SELECT `question` FROM `questions` where is_enabled = '1' ";
 $result = mysqli_query($this->db ,$select);
 return mysqli_fetch_all($result);
}
public function quiz_options($qid) {
 $select = "SELECT `option` FROM `quiz_options` where qid = '$qid' AND is_enabled = '1'  ";
 $result = mysqli_query($this->db ,$select);
 return mysqli_fetch_all($result);
} 
public function answer($qid) {
 $select = "SELECT `option_number` FROM `quiz_answer` where qid = '$qid' ";
 $result = mysqli_query($this->db ,$select);
 return mysqli_fetch_all($result);
} 
};
?>