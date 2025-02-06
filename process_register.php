<html>
	<head>
		<title>Main Register Page</title>
	</head>
	<body>

		<?php

		ob_start();
		$host="localhost"; // Host name
		// $host="192.168.56.103";
		$username="blogadmin"; // Mysql username
		$password="password"; // Mysql password
		$db_name="blog"; // Database name
		$tbl_name="members"; // Table name

		$mysqli = new mysqli($host, $username, $password, $db_name);

		/* check connection */
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$myusername=$_POST['myusername'];
		$mypassword=$_POST['mypassword'];
		$mymail=$_POST['myemail']; // Retrieve the email from the POST request

		// To protect MySQL injection (more detail about MySQL injection)
		$cleanusername = $myusername;
		$cleanpassword = $mypassword;
		$cleanemail = $mymail; // Clean the email input

		// salting adds uniqueness to each entry.
		$salt=uniqid() ;
		$salted_password=$salt.$cleanpassword;
		$encrypted_password = hash("sha512", $salted_password); 

		$sql="insert into $tbl_name (username, password, salt, email) values ('$cleanusername', '$encrypted_password', '$salt', '$cleanemail')";
		if (!$mysqli->query($sql)) {
			echo "INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else
		{
			echo "Registered";
			header("Location: register_success.php");
			exit();
		}
		printf("SQL statement is $sql");
		ob_end_flush();
		?>




	</body>
</html>
