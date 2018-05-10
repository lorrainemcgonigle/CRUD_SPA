<?php
	include 'conn.php';
	$record = file_get_contents('php://input');
	$decodedjson = json_decode($record);
	$firstname = $decodedjson->firstname;
	$lastname = $decodedjson->lastname;
	$country = $decodedjson->country;
	$address = $decodedjson->address;

	$sql = "INSERT INTO customerList (firstname, lastname, country, address) VALUES ('$firstname', '$lastname','$country', '$address')";

	if ($conn->query($sql)) {
	$msg = array("status" =>1 , "msg" => "Your record inserted successfully");
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	$json = $msg;

	header ('content-type: application/json');
	echo json_encode($json);

	@mysqli_close($conn);
?>