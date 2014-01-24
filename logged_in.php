<?php  
include_once('examDAO.php');

if((isset($_POST['email'])) && (isset($_POST['password']))){
	$email = $_POST['email'];
	$password = $_POST['password'];

	if($email && $password !== NULL){
		$login = examDAO::login($email, $password);
		if($login === false){
			header('Location: register.php');
			exit();
		}else {
			echo "You are now logged in. :)";
		}
	}else{
		header('Location: register.php');
	}
}

?>