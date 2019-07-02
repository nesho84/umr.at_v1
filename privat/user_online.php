<?php
$session=session_id();
$time=time();
$time_check=$time-600; //SET TIME 10 Minute
if(isset($_SESSION['username']))
{
$user=$_SESSION['username'];

$sql="SELECT * FROM user_online WHERE session='$session'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
if($count=="0"){

$sql1="INSERT INTO user_online(session, user, time)VALUES('$session', '$user', '$time')";
$result1=mysql_query($sql1);
}

else {
$sql2="UPDATE user_online SET user='$user', time='$time' WHERE session = '$session'";
$result2=mysql_query($sql2);
}
}

$sql3="SELECT * FROM user_online";
$result3=mysql_query($sql3);
$count_user_online=mysql_num_rows($result3);
echo "<hr color=#cccff><p>Benutzer online: <b>$count_user_online</b></p>";
while($row = mysql_fetch_array($result3))
	{
	echo ': : ' .$row['user']. '&nbsp;<br>';
	}
// if over 10 minute, delete session 
$sql4="DELETE FROM user_online WHERE time<$time_check";
$result4=mysql_query($sql4);
?>