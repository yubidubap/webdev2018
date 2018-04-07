<?php
include( $_SERVER['DOCUMENT_ROOT'].'/webdev2018/Homepage/dbconnect.php');

		function getYear()
		{
			global $conn;

			echo '<option value="" disabled selected hidden>Choose a year...</option>';
			$Query = "SELECT distinct(schoolYear) as year from enrollment  ";
			$sql = $conn ->query($Query);
				{
					while($row = $sql ->fetch_assoc())
					{
						echo '<option value='.$row['year'].'>'.$row['year'].'</option>';
					}
					
					$conn->close();
				}
				
		}

?>