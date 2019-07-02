<?php
if (!$_POST)
{
exit;
} 
include '../_library/dbconnect.php';

//CHECK IF THE USER IS VALID begins
if(isset ($_POST['u_name']) && !empty($_POST['u_name']))
{
$uname = (mysqli_real_escape_string($con, $_POST['u_name']));
$pass = (mysqli_real_escape_string($con, $_POST['pass']));

$qry=mysqli_query($con, "SELECT * FROM login WHERE user='$uname' AND password='$pass'");
if(!$qry)
{
die("Query Failed: ". mysqli_error());
}
$row=mysqli_fetch_array($qry);

if($uname==$row['user'] && $pass==$row['password'])
{
session_start();
$_SESSION['name']=$uname;
header("Location: index.php");
}
else
{
echo '<p style=font-size:x-small align=center><img src=images/stop.png /><br />Username or Password you entered is incorrect<br /><br /><a href=login.php>Try Again...</a></p>';
}
}
else
{
echo '<p style=font-size:x-small align=center><img src=images/stop.png /><br />Please enter username or password<br /><br /><a href=login.php>Try Again...</a></p>';
}
?><!-- //CHECK IF THE USER IS VALID ends -->