<?php 
	if (isset($_POST['submit'])) {

		$Fname = $_POST['First Name'];
		$Lname = $_POST['Last Name'];
		$Sex = $_POST['Gender'];
		$Mail = $_POST['Email'];
		$Pssword = $_POST['Password'];
		$Phone = $_POST['Phone Number'];
		$Year = $_POST['Year Group'];
		$Course = $_POST['Course'];

		$conn = mysqli_connect('localhost', 'root', 'root', 'sprint1');


		if($conn === false){
    		die("ERROR: Could not connect. " . mysqli_connect_error());}
		}

		
 ?>