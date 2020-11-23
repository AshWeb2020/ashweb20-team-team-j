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
$activity = $_POST['Activity'];

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

//Select query to acquire member activity chosen
$activity_query = "SELECT activity_id FROM activity WHERE activityName = '$activity'";
$result2 = mysqli_query($conn,$activity_query);
$row1 = mysqli_fetch_assoc($result2);


$member_query = "SELECT person_id FROM membership WHERE email = '$mail'";
$result3 = mysqli_query($conn,$member_query);
$row2 = mysqli_fetch_assoc($result3);

$member_activity_query = "INSERT INTO member_activity (activity_id,person_id) VALUES({$row1['activity_id']},{$row2['person_id']})";
if(!mysqli_query($conn,$member_activity_query)){
	echo "ERROR: Could not execute";
}

// set user session if password is verified
if ($verify_pass) {
	echo("<script>alert('Registration was successful!')</script>");
	echo("<script>window.location = './activities.html';</script>");
}else{
	echo("<script>alert('password is incorrect!')</script>");
	echo("<script>window.location = 'activities.html';</script>");
}



 ?>