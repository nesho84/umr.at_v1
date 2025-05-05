<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('view news');
?>





<div id="main">
    <div id="main2">
        <?php
        $id = $_GET['id'];

        $query = "SELECT id, user, password FROM login where id= '$id'";
        $result = mysqli_query($query) or die('Error : ' . mysqli_error(DBLINK));
        ?>
        <br />
        <?php
        while (list($id, $username, $password) = mysqli_fetch_array($result, MYSQLI_NUM)) {
        ?>
            <table id="main2" align="center" width="960px" border="1" cellpadding="5" cellspacing="0">
                <tr bgcolor="#CCCCFF">
                    <td><b>Username:</b></td>
                    <td><b>Password:</b></td>
                </tr>
                <tr>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $password; ?></td>
                </tr>
            </table>
        <?php
        }
        ?>





        <p align="center"><?php echo '<a href="javascript:window.close();">CLOSE WINDOW</a>'; ?> </p>
    </div>
</div>





<?php
do_html_footer();
?>