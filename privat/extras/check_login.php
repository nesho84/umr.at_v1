<?php
die('This function is deprecated. Please use the new login system. <a href=javascript:history.go(-1)>[Back]</a>');

if (!$_POST) {
    echo 'NNWEBS says: Page cannot accessed directly!';
    die;
}
include '../../_library/dbconnect.php';
//CHECK IF THE USER VALID begins
if (isset($_POST['u_name']) && !empty($_POST['u_name'])) {
    $uname = (htmlspecialchars($_POST['u_name']));
    $pass = (htmlspecialchars($_POST['pass']));
    $qry = mysqli_query($con, "SELECT * FROM members WHERE username='$uname' AND password='$pass'");
    if (!$qry) {
        die("Query Failed: " . mysqli_error($con));
    }
    $row = mysqli_fetch_array($qry);
    if ($uname == $row['username'] && $pass == $row['password']) {
        session_start();
        $_SESSION['start'] = time(); // taking now logged in time
        $_SESSION['expire'] = $_SESSION['start'] + (60 * 60); // ending a session in 60 minutes from the starting time
        $_SESSION['username'] = $uname;
        header("Location: Home");
    } else {
        echo '<br /><p style=font-size:normal align=center><img src=../_images/stop.png /><br />Falsches Username oder Passwort eingegeben.<br /><br /><a href=Login>Bitte versuchen Sie es erneut...</a></p>';
    }
} else {
    echo '<br /><p style=font-size:normal align=center><img src=../_images/stop.png /><br />Geben Sie ihre Username und Passwort ein.<br /><br /><a href=Login>Bitte versuchen Sie es erneut...</a></p>';
}
?><!-- //CHECK IF THE USER IS VALID ends -->