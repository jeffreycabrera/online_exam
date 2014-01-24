<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <link href="css/boot-business.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 


    <div class="content">
		<div class="container">
			<div class="row">
				<div class="well span3">
					<div class="page-header">
				          <h4>Log In</h4>
				    </div>
				    <div class="span6 offset3">
            			<h4 class="widget-header"><i class="icon-gift"></i> Be a part of Bootbusiness</h4>
            			<div class="widget-body">
              				<div class="center-align">

								<table>
									<form name = "loginForm" action = "" method = "POST" class="form-horizontal form-signin-signup">
										<tr>
											<td><input type="email" id="email" name = "email" placeholder = "E-mail"><td>
										</tr><tr>
											<td><input type="password" id="password" name = "password" placeholder = "Password"><td>
										</tr><tr>
											<td><input type="submit" value="Log In" class="btn btn-primary">
									</form>
											<input type="submit" value="Register" id="register" >
										</tr>
								</table>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</div>

<?php  
include_once('examDAO.php');

if((isset($_POST['email'])) && (isset($_POST['password']))){
	$email = $_POST['email'];
	$password = $_POST['password'];

	if($email && $password !== NULL){
		$login = examDAO::login($email, $password);
		if($login === false){
			echo "wwrong";
			exit();
		}else {
			echo "You are now logged in. :)";
		}
	}else{
		echo "wwrong";
	}
}

?>

<div id="overlay">
<div id="overlay_div" style= "background-color: #fff;">
	<div id="close_button">X</div>
	<table>
		<form method="POST" action="register.php" name = "registerForm">
			<tr>
				<td><input type="text" name="firstname" id="firstname "placeholder = "First Name" /><td></td>
			</tr><tr>
				<td><input type="text" name="lastname" id="lastname"placeholder = "Last Name" /><td></td>
			</tr><tr>
				<td><input type="email" name="email1" id = "email_input" placeholder = "Email Address"/><td id = 'emailHtml'></td>
			</tr><tr>
				<td><input type="password" name="password1" id = "password1" placeholder = "Password"/><td></td>
			</tr><tr>
				<td><input type="password" name="password2" id= "confirm" placeholder = "Confirm Password"/><td id = 'confirmPass'></td>
			</tr><tr>
				<td><input type="submit" value = "Register" id="register2"></td>
			</tr>
		</form>
	</table>
</div>
</div>
</body>
	<script type="text/javascript" src="js/jquery.1.10.2.js"></script>
	<script type="text/javascript" src="js/myjs.js"></script>
	 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/boot-business.js"></script>
</html>



<?php  
include 'DB.php';


if((isset($_POST['firstname'])) && (isset($_POST['lastname'])) && (isset($_POST['email1'])) && (isset($_POST['password1'])) && (isset($_POST['password2']))){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email1'];
	$password = $_POST['password1'];
	$confirm = $_POST['password2'];

	if($firstname && $lastname && $email && $password && $confirm !== NULL){
		$email_exist = examDAO::emailExist($email);
		if($password == $confirm){
			if($email_exist == 0){	
				$register = examDAO::createUser($firstname, $lastname, $email, $password, $confirm);
			}
		}
	} else {
		?>
		<div id = "fillOutAgain"></div>
		<?php
	} 
}
?>


