<?php 

// create connection
$dbpassword = getenv('MYSQLPASS') ?? "";
$conn = mysqli_connect('localhost', 'root', $dbpassword , 'GJ2022');

// check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// grab form data
$mail = $_POST['email'];
$upass = $_POST['psw'];

// write query
$sql = "SELECT * FROM membership WHERE email = '$mail'";

// execute query
$result = mysqli_query($conn, $sql);

// check that exactly 1 row was returned
if (mysqli_num_rows($result) != 1) {
    die('login failed');
}


// get query result as an array
$user = mysqli_fetch_assoc($result);

// verify user password match
$verify_pass = password_verify($upass, $user['password']);

// set user session if password is verified
if ($verify_pass) {
	echo("<script>alert('Registration was successful!')</script>");
	echo("<script>window.location = './activities.html';</script>");
}else{
	echo("<script>alert('password is incorrect!')</script>");
	echo("<script>window.location = 'activities.html';</script>");
}



 ?>