<?php
require 'config.php';
require 'database.php';
$g_title = BLOG_NAME . ' - Index';
$g_page = 'login';
require 'header.php';
require 'menu.php';

?>

<div id="all_blogs">
	<html>

	<head>
		<title>Main Login Page</title>
	</head>

	<body>

		<table width="300" border="0"  cellpadding="0" cellspacing="1">
			<tr>
				<form name="form1" method="post" action="checklogin.php">
					<td>
						<table width="100%" border="0" cellpadding="3" cellspacing="1">
							<tr>
								<td colspan="3"><strong>Member Login </strong></td>
							</tr>
							<tr>
								<td width="78">Username</td>
								<td width="6">:</td>
								<td width="294"><input name="myusername" type="text" id="myusername"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input name="mypassword" type="password" id="mypassword"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" name="Submit" value="Login"></td>
							</tr>
						</table>
					</td>
				</form>
			</tr>
		</table>

	</body>

	</html>
</div>
<?php
require 'footer.php';
?>