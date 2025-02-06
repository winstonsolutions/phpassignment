<?php
require 'config.php';
require 'database.php';
$g_title = BLOG_NAME . ' - Index';
$g_page = 'register';
require 'header.php';
require 'menu.php';

?>

<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
// session_start();



?>
<div id="all_blogs">
You have successfully registered

</div>

<?php
  require 'footer.php';
?>