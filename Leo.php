<?php 
	if (isset($_POST['submit'])) {

		$Fname = $_POST['first'];
		$Lname = $_POST['last'];
		$Sex = $_POST['gender'];
		$Mail = $_POST['mail'];
		$Password = $_POST['password'];
		$Phone = $_POST['phone'];
		$Year = $_POST['year'];
		$Course = $_POST['course'];

		// hash the password
		$pass_hash = password_hash($Password, PASSWORD_DEFAULT);

		$dbpassword = getenv('MYSQLPASS') ?? "";
		$conn = mysqli_connect('localhost', 'root', $dbpassword, 'GJ2022');
		if (!$conn) {
    		die('Connection failed: ' . mysqli_connect_error());
		}

		$sql = "INSERT INTO membership(first_name,last_name,gender,email,password,phonenumber,yearGroup,course) VALUES ('$Fname', '$Lname', '$Sex', '$Mail', '$pass_hash', '$Phone', '$Year', '$Course')";

		if (mysqli_query($conn, $sql)){
			echo("<script>alert('Registration was successful!')</script>");
 			echo("<script>window.location = './index.html';</script>");
		}else{
			echo "Error with query";
		}
 }

?>