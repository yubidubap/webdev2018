<?php
	session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Profile </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="adminProfile.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="header">

			<ul>

				<li>Profile</li>
				<li><a href="adminAddAccountPage.php">Accounts</a></li>
				<li><a href="adminAddSchedulePage.php">Section Offering</a></li>
				<li><a href="adminViewSchedulePage.php">View Schedule</a></li>	
				<li><a href="logout.php">SIGN OUT</a></li>

			</ul>

			<img src="Quadrant1\logo.png">

		</div>

		<div class="infobodyheader">

			<h1>Welcome, <b><?php echo $_SESSION['name'];?></b>!</h1>
			
		</div>

		<div class="infobodyheader2">

			<h1>Personal Information</h1>

		</div>

		<div class="infobody">
			<div class="col-sm-12">
			<table class="table-condensed">
				<tr>
					<th><h3>Name</h3></th>
					<td><h3><b><?php echo $_SESSION['fullname'];?></b></h3></td>
				</tr>

				<tr>
					<th><h3>Phone Number</h3></th>
					<td><h3><b><?php echo $_SESSION['phone'];?></b></h3></td>
				</tr>

				<tr>
					<th><h3>E-mail Address</h3></th>
					<td><h3><b><?php echo $_SESSION['email'];?></b></h3></td>
				</tr>
			</table>
			</div>

		</div>

	</body>

</html>