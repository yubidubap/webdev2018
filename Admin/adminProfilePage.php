<?php
	include "connection.php";
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
				<li><a href="adminProfilePage.php">Profile</a></li>
				<li><a href="adminAddAccountPage.php">Accounts</a></li>
				<li><a href="adminAddSchedulePage.php">Add Schedule</a></li>
				<li><a href="adminViewSchedulePage.php">View Schedule</a></li>

				<li>SIGN OUT</li>
			</ul>

			<img src="Quadrant1\logo.png">

		</div>

		<?php
			$sql = "SELECT firstName, middleName, lastName, email, mobileNum FROM account WHERE accountType = 'Admin'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
		   		while($row = $result->fetch_assoc())
		   		{
		   			echo "<div class='infobodyheader'>
					<h1>Welcome, <b>".$row["firstName"]."</b>!</h1>
					</div>

					<div class='infobodyheader2'>

						<h1>Personal Information</h1>

					</div>

					<div class='infobody'>
						<ul>
							<li>Name: <b>".$row["lastName"].", ".$row["firstName"]." ".$row["middleName"]."</b></li>
							<li>E-mail Address: <b>".$row["email"]."</b></li>
							<li>Mobile Number: <b>".$row["mobileNum"]."</b></li>
						</ul>
					</div>";
		    	}
		    }
		?>
	</body>
</html>