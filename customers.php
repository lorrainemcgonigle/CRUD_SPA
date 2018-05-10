<?php
	include 'conn.php';

	$getData = "select * from customerList";
	$qur = $conn->query($getData);

	while ($r = mysqli_fetch_assoc($qur)){

		$msg[] = array("id" => $r['id'], "lastname" => $r['lastname'], "firstname" => $r['firstname'], "country" => $r['country'], "address" => $r['address']);
	}
	$json = $msg;

	header('content-type: application/json');
	echo json_encode($json);

	@mysqli_close($conn);
?>