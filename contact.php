<?php
    $firstname=$_POST['FirstName'];
    $lastname=$_POST['LastName'];
    $email=$_POST['Email'];
    $mobile=$_POST['Subject'];
    $message=$_POST['Message'];
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact( firstname, lastname, email, mobile, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $firstname, $lastname, $email, $mobile, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "    Thank you For Joining With Us....";
		$stmt->close();
		$conn->close();		
	}
?>