<?php
include 'DB.php';

class ExamDAO{
	
	function createUser($fname, $lname, $email, $password, $confirm){
		$query = "INSERT INTO `exam`(`firstname`, `lastname`, `email`, `password`, `confirm`) 
					VALUES ('$fname','$lname','$email','$password','$confirm')";
		$insert = mysql_query($query);
		return $insert;
	}

	function emailExist($email){
		$query = "SELECT email FROM exam WHERE email = '{$email}'";
		$result = mysql_query($query);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}

	function user_id_from_email($email){
		return mysql_result(mysql_query("SELECT user_id FROM exam WHERE email = '$email'"), 0, 'user_id');
	}

	function login($email, $password){
		$user_id = examDAO::user_id_from_email($email);
		$query = "SELECT COUNT(`user_id`) FROM exam WHERE email = '$email' AND password = '$password'";
		return (mysql_result(mysql_query($query), 0) == 1) ? $user_id : false;

		
	}
}	