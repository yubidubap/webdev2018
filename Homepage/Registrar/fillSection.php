<?php
include( $_SERVER['DOCUMENT_ROOT'].'/webdev2018/Homepage/dbconnect.php');

		function getSection()
		{
			global $conn;

			echo '<option value="" disabled selected hidden>Choose a section...</option>';
			$Query = "SELECT sectionCode from section ";
			$sql = $conn ->query($Query);
				{
					while($row = $sql ->fetch_assoc())
					{
						echo'<option value= "'.$row['sectionCode'].'">'.$row['sectionCode'].'</option>';
					}
					
					
				}
				$conn->close();
		}
?>