<?php
ob_start();
session_start();
$session = session_id();
include '../_library/dbconnect.php';

if (!isset($_SESSION['username'])) {
	header('Location: Login');
} else {
	$now = time(); // checking the time now when home page starts

	if ($now > $_SESSION['expire']) {
		//Register last user Activity
		$uname = $_SESSION['username'];
		$qry = mysqli_query("UPDATE members SET last_activity=NOW() WHERE username='$uname'", $con);
		if (!$qry) {
			die("Query Failed: " . mysqli_error($con));
		}
		//Delete session in database
		$qry2 = mysqli_query("DELETE FROM user_online WHERE session='$session'", $con);
		if (!$qry2) {
			die("Query Failed: " . mysqli_error($con));
		}
		//Destroy session
		$_SESSION = array();
		setcookie(session_name(), "", time() - 3600);
		session_destroy();
?>
		<meta http-equiv="Refresh" content="1;url=Login?msg=Ihre Sitzung ist abgelaufen." />
<?php
	}
}
?>