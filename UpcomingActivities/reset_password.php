<?php 
session_start();
$errors = array();
if(isset($_POST['reset-password-btn'])){
	$password = $_POST['password'];
	$passwordconf = $_POST['passwordconf'];

	if(empty($password)){
		$errors['password'] = "Password required";
	}
	if($password !== $passwordconf){
		$errors['password'] = "The two passwords do not match";
	}

	$conn = mysqli_connect('localhost', 'root', $dbpassword , 'GJ2022');

	// check connection
	if (!$conn) {
    	die('Connection failed: ' . mysqli_connect_error());
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	$email = $_SESSION['email'];
	if(count($errors)==0){
		$sql = "UPDATE membership SET password='$password' WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		if($result){
			echo("<script>alert('Password reset successful!')</script>");
			header('location: ./activities.html');
			exit(0);
		}
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<link rel='stylesheet' href='./style.css'>

	<title>Reset password</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div" style="margin: 50px auto 50px; padding: 25px 15px 10px 15px; border: 1px solid #80ced7; border-radius: 5px; font-size: 1.1em; font-family: Lora; background: white;">
				<form action="reset_password.php" method="POST">
 					<h3 class="text-center">Reset your password</h3>
 					
 					<div class="form-group">
 						<label for="password">Password</label>
 						<input type="password" name="password" class="form-control form-control-lg">
 					</div>

 					<div class="form-group">
 						<label for="password">Confirm Password</label>
 						<input type="password" name="passwordconf" class="form-control form-control-lg">
 					</div>

 					<div class="form-group">
 						<input type="submit" name="reset-password-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block">
 					</div>
 				</form>
			</div>
		</div>
	</div>
</body>
</html>