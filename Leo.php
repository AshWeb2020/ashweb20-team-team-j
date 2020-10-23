<?php 
	if (isset($_POST['submit'])) {

		$Fname = $_POST['first'];
		$Lname = $_POST['last'];
		$Sex = $_POST['gender'];
		$Mail = $_POST['mail'];
		$Password = $_POST['password'];
		$Cpassword = $_POST['Cpassword'];
		$Phone = $_POST['phone'];
		$Year = $_POST['year'];
		$Course = $_POST['course'];

		$conn = mysqli_connect('localhost', 'root', 'root', 'Leoclub');
		if ($conn){
			echo "Connected successfully";
		}else{
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO newMembership(first_name, last_name, gender, email, pssword, confirm_pssword, phonenumber, yearGroup, course) VALUES ('$Fname', '$Lname', 	'$Sex', '$Mail', '$Password', '$Cpassword', '$Phone', '$Year', '$Course')";

		if (mysqli_query($conn, $sql)){
			echo "Your registration was successful!";
		}else{
			echo "Error with query";
		}
 }