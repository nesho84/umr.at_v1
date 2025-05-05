<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('News');
?>





<div id="main">
    <div id="main2">
        <?php
        $id = $_GET['id'];

        $query = "SELECT id, title, image, content, link, date FROM news where id= '$id'";
        $result = mysqli_query(DBLINK, $query) or die('Error : ' . mysqli_error(DBLINK));
        ?>
        <br />
        <?php
        while (list($id, $title, $img, $content, $link, $date) = mysqli_fetch_array($result)) {
        ?>
            <table align="center" width="700px" border="0" cellpadding="10" cellspacing="0">
                <tr>
                    <?php
                    if ($img) {
                    ?>
                        <td valign="top"><img src="<?php echo SITE_URL ?>/uploads/<?php echo $img; ?>" width="120px" height="100px" style="padding-top: 25px;" /></td>
                    <?php
                    }
                    ?>
                    <td align="left">
                        <h2><?php echo $title; ?></h2>
                        <hr color="#534C42" />
                        <p><?php echo $content; ?></p>
                        <a href="<?php echo $link; ?>"><?php echo $link; ?></a>
                        <p style="font-size: x-small;" align="right"><b>Released on: </b><?php echo $date; ?></p>
                    </td>
                </tr>
            </table>
        <?php
        }
        ?>





        <br clear="both" /><br clear="both" /><br clear="both" /><br clear="both" /><br clear="both" />
        <p align="center" style="color: #FFFFFF;"><?php echo '<a href="javascript:history.go(-1)"><< Back</a>'; ?> </p>
    </div>
</div>





<?php
do_html_footer();
?>