<?php
ob_start();
session_start();
$_SESSION=array();
setcookie(session_name(),"",time()-3600);
session_destroy();
echo '<p align=center><br /><br /><br />';
echo 'You are successfully logged out<br />';
echo 'Login again: <a href=login.php>click here</a>';
echo '</p>';
?>