<?php
require 'config.php';
require 'database.php';
$g_title = BLOG_NAME . ' - Index';
$g_page = 'logout';
require 'header.php';
require 'menu.php';

?>
<?php 
// Put this code in first line of web page. 
session_start();
session_destroy();

?>

<div id="all_blogs">
You have successfully logged out
</div>
<?php
require 'footer.php';
?>