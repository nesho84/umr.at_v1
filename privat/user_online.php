<?php
$session = session_id();
$time = time();
$time_check = $time - 600; //SET TIME 10 Minute
if (isset($_SESSION['username'])) {
	$user = $_SESSION['username'];

	$sql = "SELECT * FROM user_online WHERE session='$session'";
	$result = mysqli_query(DBLINK, $sql);

	$count = MYSQLI_NUM_rows($result);
	if ($count == "0") {

		$sql1 = "INSERT INTO user_online(session, user, time)VALUES('$session', '$user', '$time')";
		$result1 = mysqli_query(DBLINK, $sql1);
	} else {
		$sql2 = "UPDATE user_online SET user='$user', time='$time' WHERE session = '$session'";
		$result2 = mysqli_query(DBLINK, $sql2);
	}
}

$sql3 = "SELECT * FROM user_online";
$result3 = mysqli_query(DBLINK, $sql3);
$count_user_online = MYSQLI_NUM_rows($result3);
echo "<hr color=#cccff><p>Benutzer online: <b>$count_user_online</b></p>";
while ($row = mysqli_fetch_array($result3)) {
	echo ': : ' . $row['user'] . '&nbsp;<br>';
}
// if over 10 minute, delete session
$sql4 = "DELETE FROM user_online WHERE time<$time_check";
$result4 = mysqli_query(DBLINK, $sql4);
