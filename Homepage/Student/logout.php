<?php
	session_start();
	session_destroy();
	echo "<h1><strong>You have been logged out. <a href ='../homePage.html'>Go back</a></strong></h1>";
?>