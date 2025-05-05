<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('View Article');
?>





<?php
$qry = mysqli_query(DBLINK, "SELECT * FROM subcategory");
if (!$qry) {
    die("Query Failed: " . mysqli_error(DBLINK));
}
?>
<h2>View Article</h2>
<hr width="100%" height="" color="#0F0F0F">

<div id="contain">

    <div id="l_space">
        <?php
        /*
isset() is used to check wheather arctile id is received through url from "index.php" file and if it is set corresponding arctile is displayted using SELECT statement.
*/

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $qry = mysqli_query(DBLINK, "SELECT * FROM images, articles WHERE articles.id=$id AND images.subcategory=articles.subcategory");
            if (!$qry) {
                die("Query Failed: " . mysqli_error(DBLINK));
            }
            /* Fetching data from the field "title" */
            while ($row = mysqli_fetch_array($qry)) {
                echo "<h2 align=left>&nbsp;" . $row['title'] . "</h2>";
        ?>
                <div style="border-top: 1px dotted #000000; width: 100%;">&nbsp;</div>
                <table cellpadding="1" cellspacing="1" border="1" width="100%" style="border: 1px solid #ccccff;">
                    <tr>
                        <td width="315" valign="top">
                            <?php //IF THERE IS A IMAGE UPLOADED DISPLAY IT, IF NOT DISPLAY NO-IMAGE
                            if ($row['image']) {
                            ?>
                                <img src="<?php echo SITE_URL ?>/uploads/<?php echo $row['image']; ?>" width="315" />
                            <?php
                            } else {
                            ?>
                                <img src="<?= ADM_URL ?>/images/no-image-small.png" width="200" />
                            <?php
                            }
                            ?> <!-- END -->
                        </td>
                        <td valign="top"><?php echo " " . $row['contents'] . " "; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            /* Fetching data from the field "Images" */
                            $qry2 = mysqli_query(DBLINK, "SELECT image FROM images");
                            while ($row2 = mysqli_fetch_array($qry2)) {
                            ?>
                                <img src="<?php echo SITE_URL ?>/uploads/<?php echo $row2['image']; ?>" width="80" height="80" />
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
        <?php
            }
        }
        ?>





        <br />
        <div style="clear:both;">&nbsp;</div>
        <hr width="100%" height="" color="#0F0F0F">
        <p align="center" style="color: #FFFFFF;"><?php echo '<a href="javascript:history.go(-1)"><< Back</a>'; ?> </p>
    </div>
</div>





<?php
do_html_footer();
?>