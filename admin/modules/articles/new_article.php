<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('New Article');
?>





<?php
if (isset($_POST['submit'])) {
    $path = UPLOAD_DIR . 'uploads';
    $name = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $err = $_FILES['image']['error'];
    if ($err == 0) {
        //move_uploaded_file($tmp, $name);
        move_uploaded_file($tmp, "$path/$name");
    }
    $cat = $_POST['category'];
    $tit = $_POST['title'];
    $img = $_FILES["image"]["name"];
    $cont = $_POST['contents'];

    if (empty($tit)) {
        echo "<p style='color:red;'>Please enter a title</p>";
        echo '<a href="javascript:history.back()">Back to previous page</a>';
        exit;
    }

    $qry = mysqli_query(DBLINK, "INSERT INTO articles(title,image,contents,subcategory)VALUES('$tit','$img','$cont','$cat')");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    } else {
?>
        <p><img src="<?= ADM_URL ?>/images/sucess.png" width="40" height="25" />Article <?php echo "<b>" . $tit . "</b>"; ?> added Successfully</p>
        <br />
<?php
    }
}
?>





<h2>Create new Article</h2>
<hr width="80%" color="#534C42" style="margin-top: -15px;" />
<div id="work_area">
    <?php
    $qry = mysqli_query(DBLINK, "SELECT * FROM subcategory");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    }
    ?>
    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table id="main2" align="center" width="80%" border="0" cellpadding="5" cellspacing="1">
            <tr>
                <td width="200" align="right">Category: </td>
                <td align="left">
                    <select name="category" id="category">
                        <?php
                        while ($row = mysqli_fetch_array($qry)) {
                            echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="200" align="right">Title: </td>
                <td align="left"><label for="title"></label><input type="text" name="title" id="title" /></td>
            </tr>
            <tr>
                <td width="200" align="right">Upload Image: </td>
                <td align="left"><label for="image"></label><input type="file" name="image" id="image" /></td>
            </tr>
            <tr>
                <td width="200" align="right">Page Contents: </td>
                <td align="left">
                    <label for="contents"><textarea name="contents" cols="70" rows="12" id="contents"></textarea></label>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2" align="left"><input type="submit" name="submit" id="button" value="Submit" /><input type="reset" name="button3" id="button3" value="Reset" /></td>
            </tr>
        </table>
    </form>
    <p align="center" style="color: #FFFFFF;"><?php echo '<a href="javascript:history.go(-1)"><< Back</a>'; ?> </p>
</div>





<?php
do_html_footer();
?>