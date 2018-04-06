<?php

	include "connection.php";

	$acctType = $_POST['acctType'];
	$curr = $_POST['curr'];
	$fName = $_POST['fName'];
	$mName = $_POST['mName'];
	$lName = $_POST['lName'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$confPass = $_POST['confPass'];

	if($acctType != "Student")
	{
		$sql = "INSERT INTO account(accountType, password, firstName, middleName,lastName, email, mobileNum) VALUES('$acctType', '$confPass', '$fName', '$mName', '$lName', '$email', '$number');";

		$result = $conn->query($sql);
	}

	else
	{
		$sql = "INSERT INTO account(accountType, password, firstName, middleName,lastName, email, mobileNum) VALUES('$acctType', '$confPass', '$fName', '$mName', '$lName', '$email', '$number');";
		$sql2 = "INSERT INTO student(studentCode, s_curriculumFK) VALUES((SELECT MAX(accountCode) from account), '$curr');";

		$result = $conn->query($sql); 
		$result = $conn->query($sql2);
	}
?>