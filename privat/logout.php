<?php
ob_start();
session_start();
$session=session_id();
	include '../_library/dbconnect.php'; 
	//Register last user Activity
	$uname=$_SESSION['username'];
	$qry=mysql_query("UPDATE members SET last_activity=NOW() WHERE username='$uname'", $con);
	if(!$qry) { die("Query Failed: ". mysql_error()); }
	//Delete session in database
	$qry2=mysql_query("DELETE FROM user_online WHERE session='$session'", $con);
	if(!$qry2) { die("Query Failed: ". mysql_error()); }
	//Destroy session
	$_SESSION=array();
	setcookie(session_name(),"",time()-3600);
	session_destroy();
	?>
<br /><br />
<p align="center"><img src="../_images/logo/logo.gif" width="200" height="120" style="margin-bottom:-3px;" /></p>
	<?php
	echo '<h3 align=center>';
	echo 'Sie sind erfolgreich abgemeldet...<br /><br />Auf Wiedersehen.';
	?>
<meta http-equiv="Refresh" content="1;url=Login" />
	<?php
	echo '</h3>';
	?>