<?php
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$_SESSION['user'] = $username;
$_SESSION['pass'] = $password;


if(!empty($_SESSION['user']))
{
	if(!empty($_SESSION['pass']))
		{
				include 'dbconnect.php';

			
				if($sql = $conn ->query("SELECT accountCode,accountType,password,firstName,
	   											CONCAT(firstName,' ',middleName,' ',lastName) as fullName,
	   											email,mobileNum
										FROM  account
										WHERE firstName = '$username' AND password='$password';"))
				{
					if($count = $sql->num_rows)
					{						
						while($row = $sql ->fetch_assoc())
						{
							
								
							$accounttype= $row['accountType'];
							$account= $row['accountCode'];
							$_SESSION['name'] = $row['firstName'];
							$_SESSION['fullname'] = $row['fullName'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['phone'] = $row['mobileNum'];
							
							if($accounttype == "Student")
							{
								if($sql = $conn ->query("SELECT studentCode,s_curriculumFK,scholasticStatus 
														from student as S join account as A
														ON S.studentCode = A.accountCode
														where A.accountCode = '$account';"))

									{
										if($count = $sql->num_rows)
										{						
											while($row = $sql ->fetch_assoc())
											{
							
								
							
							$_SESSION['studentCode'] = $row['studentCode'];
							$_SESSION['curriculumType'] = $row['s_curriculumFK'];
							$_SESSION['status']= $row['scholasticStatus'];
							$conn->close();
								
							
								//echo $accounttype;
							
								header("Location:Student\studentProfilePage.php");
								
							}}}
							}

							else if($accounttype == "Admin")
							{
								header("Location:Admin\adminLoginPage.html");
							}

							else
							{
								header("Location:Registrar\RegistrarProfilePage.php");
							}

						}
					}
				}	

		
		
		}
	else
		{
			echo "Password Empty";
			die();
		}
}
else
{
	echo "Username Empty";
	die();
}


?>


