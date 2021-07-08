<?php
require('connect.php');
$cmd = $_REQUEST['cmd'];

if ($cmd == "get_user_details") {
	$tbl_id = $_REQUEST['tbl_id'];

	$out_put = array();
	$query = "select * from plus91_patient_details where id='$tbl_id'";

	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	echo json_encode($row);
}
