<?php
  ob_start();
  require 'init.php';
  require 'database.php';
  $g_title = BLOG_NAME . ' - Admin';
  $g_page = 'admin';
  require 'header.php';
  require 'menu.php';


	use PhpRbac\Rbac;
	$rbac = new Rbac();

	// Check if user is logged in
	if (!isset($_SESSION['userid']))
	{
		$var_testoutput="<h2>You should not be here! Please login first.</h2>";
	}
	else
	{
		// Get Role Id
		$role_id = $rbac->Roles->returnId('admin');

		// Make sure User has 'admin' Role
		if ($rbac->Users->hasRole($role_id, $_SESSION['userid']))
		{
			$var_testoutput="<p>You are admin, and should be here.</p>";
		}
		else
		{
			$var_testoutput="<h2>You should not be here!</h2>";
		}
	}

?>

<div id="all_blogs">
<table width="300" border="0" cellpadding="0" cellspacing="1" >
<tr>
<td>

This is the Admin page

<?php 	echo $var_testoutput; ?>
</td>
</tr>
</table></div>
<?php
  require 'footer.php';
?>