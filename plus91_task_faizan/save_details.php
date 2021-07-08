<?php
require_once('connect.php');

$form_name = $_POST['form_name'];

if ($form_name == 'add_user') {
	$name = (trim($_POST['name']));
	$date_of_birth = (trim($_POST['date_of_birth']));
	$age = ($_POST['age']);
	$city = (trim($_POST['city']));
	$state = (trim($_POST['state']));
	$address = (trim($_POST['address']));

	$query = "insert into plus91_patient_details(name,date_of_birth,age,city,state,address)
			  values('$name','$date_of_birth','$age','$city','$state','$address')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result)
		echo "1";
	else
		echo "0";
}

if ($form_name == "edit_user") {
	$edit_id = (trim($_POST['edit_id']));
	$name = (trim($_POST['name']));
	$date_of_birth = (trim($_POST['date_of_birth']));
	$age = ($_POST['age']);
	$city = (trim($_POST['city']));
	$state = (trim($_POST['state']));
	$address = (trim($_POST['address']));

	$query = "update plus91_patient_details set name='$name', date_of_birth='$date_of_birth', age='$age', city='$city', state='$state',address='$address' where id='$edit_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if ($result)
		echo "1";
	else
		echo "0";
}


if ($form_name == "del_user") {
	$chk_val = 0;
	$tbl_id = ($_POST['tbl_id']);

	if ($chk_val == 0) {
		$query = "delete from plus91_patient_details where id='$tbl_id'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if ($result)
			echo "1";
		else
			echo "0";
	} else {
		echo "404-del";
	}
}
