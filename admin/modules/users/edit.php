<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('Change Password');
?>





<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    //$username=$_POST['username'];
    $password = $_POST['password'];

    //$qry=mysqli_query("UPDATE login SET user='$username',password='$password' WHERE id='$id'", DBLINK);
    $qry = mysqli_query(DBLINK, "UPDATE login SET password='$password' WHERE id='$id'");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    } else {
        echo "<br />";
        echo "Password changed";
        echo "<br />";
    }
}
?>





<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = mysqli_query(DBLINK, "SELECT * FROM login WHERE id=$id");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    }
    /* Fetching data from the field "title" */
    $row = mysqli_fetch_array($qry);
}
?>
<br />
<form method="POST">
    <input type="hidden" name="id" id="idd" value="<?php echo $row['id']; ?>" />
    <table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
        <tr bgcolor="#D22020">
            <td colspan="3"><strong>Change Password</strong></td>
        </tr>
        <!--<tr>
<td>Username</td>
<td colspan="2" align="left"><input name="username" type="text" class="box" id="username" value="<?php echo $row['user']; ?>" /></td>
</tr>-->
        <tr>
            <td align="right" width="430">Username: </td>
            <td align="left" width="430"><strong><?php echo $row['user']; ?></strong></td>
        </tr>
        <tr>
            <td align="right">Password: </td>
            <td align="left"><input name="password" class="box" id="password" value="<?php echo $row['password']; ?>" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td align="left"><input name="edit" type="submit" class="box" id="update" value="Update"></td>
        </tr>
    </table>
</form>





<p align="center"><a href="<?= ADM_URL ?>/modules/users/">Back to Users</a></p>





<?php
do_html_footer();
?>