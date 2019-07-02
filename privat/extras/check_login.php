<?php
if (!$_POST)
{
echo 'NNWEBS says: Page cannot accessed directly!';
die;
} 
include '../../_library/dbconnect.php'; 
//CHECK IF THE USER VALID begins
if(isset ($_POST['u_name']) && !empty($_POST['u_name']))
{
$uname = (mysql_real_escape_string($_POST['u_name']));
$pass = (mysql_real_escape_string($_POST['pass']));
$qry=mysql_query("SELECT * FROM members WHERE username='$uname' AND password='$pass'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
$row=mysql_fetch_array($qry);
if($uname==$row['username'] && $pass==$row['password'])
{
session_start();
$_SESSION['start'] = time(); // taking now logged in time
$_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ; // ending a session in 60 minutes from the starting time
$_SESSION['username']=$uname;
header("Location: Home");
}
else
{
echo '<br /><p style=font-size:normal align=center><img src=../_images/stop.png /><br />Falsches Username oder Passwort eingegeben.<br /><br /><a href=Login>Bitte versuchen Sie es erneut...</a></p>';
}
}
else
{
echo '<br /><p style=font-size:normal align=center><img src=../_images/stop.png /><br />Geben Sie ihre Username und Passwort ein.<br /><br /><a href=Login>Bitte versuchen Sie es erneut...</a></p>';
}
?><!-- //CHECK IF THE USER IS VALID ends -->