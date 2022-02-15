<?php
    $firstname=$_POST['FirstName'];
    $lastname=$_POST['LastName'];
    $email=$_POST['Email'];
    $tableType=$_POST['TableType'];
    $guestNumber=$_POST['GuestNumber'];
	$placement=$_POST['Placement'];
	$date=$_POST['Date'];
	$time=$_POST['Time'];
	$note=$_POST['Note'];
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into book( firstname, lastname, email, tabletype, guestnumber, placement, date, time, note) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssss", $firstname, $lastname, $email, $tableType, $guestNumber, $placement, $date, $time, $note);
		$execval = $stmt->execute();
		echo $execval;
		echo "    Thank you For Joining With Us....
                      Our team will connect soon by your respective details!";
		$stmt->close();
		$conn->close();
		
	}
?>