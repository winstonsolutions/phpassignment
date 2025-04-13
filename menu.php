<?php
session_start();
require_once 'PhpRbac/autoload.php';

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

  <?php if (!isLoggedIn()): // Show Login and Register links only if not logged in ?>
    <li><a href="login.php" <?= ($g_page == 'login') ? "class='active'" : '' ?>>Login</a></li>
    <li><a href="register.php" <?= ($g_page == 'register') ? "class='active'" : '' ?>>Register</a></li>
  <?php else: // Show Logout link only if logged in ?>
    <li><a href="logout.php" <?= ($g_page == 'logout') ? "class='active'" : '' ?>>Logout</a></li>
  <?php endif; ?>

  <li><a href="privacy.php" <?= ($g_page == 'privacy') ? "class='active'" : '' ?>>Privacy</a></li>
</ul> <!-- END div id="menu" -->