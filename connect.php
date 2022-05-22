<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','travels');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registrations(username, email, phone, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $username, $email, $phone, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo '<a href="thanks.html">Registration Suceessfull</a>';
		$stmt->close();
		$conn->close();
	}
?>