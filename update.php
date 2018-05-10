<?php
	include 'conn.php';
	$record = file_get_contents('php://input');
	$decodedjson = json_decode($record);
	$firstname = $decodedjson->firstname;
	$lastname = $decodedjson->lastname;
	$country = $decodedjson->country;
	$address = $decodedjson->address;
	$id = $decodedjson->id;
	$query = "UPDATE customerList SET  `firstname`= '$firstname', `lastname` = '$lastname', `country` = '$country', `address` = '$address' WHERE  `id` = '$id'";
	if ($conn->query($query)) {
	       $msg = array("status" =>1 , "msg" => "Record Updated successfully");
	}else {
	    echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	$json = $msg;

	header('content-type: application/json');
	echo json_encode($json);

	@mysqli_close($conn);

?>