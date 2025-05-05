<?php
require_once dirname(__DIR__) . '/_library/config.php';
require_once dirname(__DIR__) . '/_library/dbconnect.php';

if (!$_POST) {
    exit;
}

//CHECK IF THE USER IS VALID begins
if (isset($_POST['u_name']) && !empty($_POST['u_name'])) {
    $uname = (mysqli_real_escape_string(DBLINK, $_POST['u_name']));
    $pass = (mysqli_real_escape_string(DBLINK, $_POST['pass']));

    $qry = mysqli_query(DBLINK, "SELECT * FROM login WHERE user='$uname' AND password='$pass'");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    }
    $row = mysqli_fetch_array($qry);

    if ($row && $uname == $row['user'] && $pass == $row['password']) {
        $_SESSION['name'] = $uname;
        header("Location: index.php");
    } else {
        echo '<p style=font-size:x-small align=center><img src=images/stop.png /><br />Username or Password you entered is incorrect<br /><br /><a href=login.php>Try Again...</a></p>';
    }
} else {
    echo '<p style=font-size:x-small align=center><img src=images/stop.png /><br />Please enter username or password<br /><br /><a href=login.php>Try Again...</a></p>';
}
?><!-- //CHECK IF THE USER IS VALID ends -->