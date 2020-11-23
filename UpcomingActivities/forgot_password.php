<?php

require_once '../vendor/autoload.php';
session_start();
$errors = array();

$dbpassword = getenv('MYSQLPASS') ?? "";

$conn = mysqli_connect('localhost', 'root', $dbpassword , 'GJ2022');

// check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

define('EMAIL', 'fuseiniabass655@gmail.com');
define('PASSWORD', 'hoovwemgnjkgvaeg');


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendPasswordResetLink($userEmail, $userID){

	global $mailer;

	$body = '<!DOCTYPE html>
 <html>
 <head>
 	<title>Recover Password</title>
 </head>
 <body>
 	<div class="wrapper">
 		<p>
 		Hello there,

 		Please click on the link below to reset your password.
 		</p>
 		<a href="http://teamj.northeurope.cloudapp.azure.com/ashweb20-team-team-j/UpcomingActivities/reset_password.php">Reset your password</a>
 	</div>
 </body>
 </html>';
	// Create a message
	$message = (new Swift_Message('Reset your password'))
  	->setFrom(EMAIL)
  	->setTo($userEmail)
  	->setBody($body, 'text/html');

	// Send the message
	$result = $mailer->send($message);
}


if (isset($_POST['forgot-password'])){
	$email = $_POST['email'];
	//$token = bin2hex(random_bytes(50));

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email'] = "Email address is invalid";
	}

	if(empty($email)){
		$errors['email'] = "Email address required";
	}

	if(count($errors) == 0){
		$sql = "SELECT * FROM membership WHERE email = '$email' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $user['email'];
		$id = $user['person_id'];
		sendPasswordResetLink($email, $id);
		header('location: password_message.php');
		exit(0);


	}
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

 	<link rel='stylesheet' href='./style.css'>

 	<title>Forgot Password</title>
 	
 </head>
 <body>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 offset-md-4 form-div" style="margin: 50px auto 50px; padding: 25px 15px 10px 15px; border: 1px solid #80ced7; border-radius: 5px; font-size: 1.1em; font-family: Lora; background: white;">
 				<form action="forgot_password.php" method="POST">
 					<h3 class="text-center">Recover your password</h3>
 					<p>
 						Please enter the Ashesi email address you used to register to be a member of this club, to help recover your password
 					</p>
 					<?php if(count($errors) > 0): ?>
 					<div class="alert alert-danger">
 						<?php foreach ($errors as $error): ?>
 						<li><?php echo $error; ?></li>
 					<?php endforeach; ?>
 					</div>
 					<?php endif; ?>
 					<div class="form-group">
 						<input type="email" name="email" class="form-control form-control-lg">
 					</div>

 					<div class="form-group">
 						<input type="submit" name="forgot-password" value="Recover Password" class="btn btn-primary btn-lg btn-block">
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 
 </body>
 </html>


