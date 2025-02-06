<?php
if (!isset($g_page)) {
  $g_page = '';
}

// Function to check if user is logged in
function isLoggedIn()
{
  return isset($_SESSION['username']);
}
?>
<ul id="menu">
  <li><a href="index.php" <?= ($g_page == 'index') ? "class='active'" : '' ?>>Home</a></li>
  <li><a href="create.php" <?= ($g_page == 'create') ? "class='active'" : '' ?>>New Post</a></li>


  <li><a href="Privacy.php" <?= ($g_page == 'privacy') ? "class='active'" : '' ?>>Privacy</a></li>
</ul> <!-- END div id="menu" -->