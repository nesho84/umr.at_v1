<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('Edit Article');
?>





<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    //$cat=$_POST['category'];
    $tit = $_POST['title'];
    $img = $_FILES["image"]["name"];
    $cont = $_POST['contents'];

    $qry = mysqli_query(DBLINK, "SELECT * FROM subcategory");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    }

    if ($img) {
        $path = UPLOAD_DIR . '/uploads';
        $name = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $err = $_FILES['image']['error'];
        if ($err == 0) {
            move_uploaded_file($tmp, "$path/$name");
        }

        $qry = mysqli_query(DBLINK, "UPDATE articles SET image='$img' WHERE id='$id'");
        if (!$qry) {
            die("Query Failed: " . mysqli_error(DBLINK));
        }
    }

    $qry = mysqli_query(DBLINK, "UPDATE articles SET title='$tit',contents='$cont' WHERE id='$id'");
    if (!$qry) {
        die("Query Failed: " . mysqli_error(DBLINK));
    } else {
?>
        <p><img src="<?= ADM_URL ?>/images/sucess.png" width="40" height="25" />Article <?php echo "<b>" . $tit . "</b>"; ?> updated Successfully</p>
        <br />
<?php
    }
}
?>





<h2>Edit Article</h2>
<hr width="80%" height="" color="#0F0F0F">

<div id="work_area">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $qry = mysqli_query(DBLINK, "SELECT * FROM articles WHERE id=$id");
        if (!$qry) {
            die("Query Failed: " . mysqli_error(DBLINK));
        }
        /* Fetching data from the field "title" */
        $row = mysqli_fetch_array($qry);
    }
    $title = $row['title'];

    ?>

    <form method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1">
            <input type="hidden" name="id" id="idd" value="<?php echo $row['id']; ?>" />
            <tr>
                <!--<td width="200" align="right">Category: </td>
<td align="left"><label for="cat"></label>
<select name="category" id="category">
<?php
$qry2 = mysqli_query(DBLINK, "SELECT * FROM subcategory");
if (!$qry2) {
    die("Query Failed: " . mysqli_error(DBLINK));
}
while ($row2 = mysqli_fetch_array($qry2)) {
    echo "<option value='" . $row2['cat_name'] . "'>" . $row2['cat_name'] . "</option>";
}
?>
</select>
<span style="font-size: x-small; color: #FFFFFF;">(<strong>Important:</strong> Without selecting Category the Field "Category" will be Empty!)</span>
</td>
</tr>-->
            <tr>
                <td width="200" align="right">Title: </td>
                <td align="left"><label for="tit"></label>
                    <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="200" align="right">&nbsp;</td>
                <td align="left">
                    <img src="<?php echo SITE_URL ?>/uploads/<?php echo $row['image']; ?>" width="100px" align="left" />
                </td>
            </tr>
            <tr>
                <td width="200" align="right" valign="top">Image: </td>
                <td align="left"><label for="image"></label><input type="file" name="image" id="image" value="<?php echo $row['image']; ?>" />
                    <span style="font-size: x-small;">(Upload New Image only is there is a change in the existing image)</span>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <span style="color: #FFFFFF; font-weight: bold; font-size: 10px;">
                        >>> HTML codes are allowed <<<
                            </span>
                </td>
            </tr>
            <tr>
                <td width="200" align="right" valign="top">Contents: </td>
                <td align="left"><label for="cont"></label>
                    <textarea name="contents" id="contents" cols="70" rows="12"><?php echo $row['contents']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2" align="left"><input type="submit" name="submit" id="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>

    <p align="center"> Back to Article Category: </p>
    <?php
    $qry2 = mysqli_query(DBLINK, "SELECT * FROM subcategory");
    if (!$qry2) {
        die("Query Failed: " . mysqli_error(DBLINK));
    }
    while ($row2 = mysqli_fetch_array($qry2)) {
    ?>
        <p align="center" style="color: #FFFFFF;"><?php echo "&nbsp;<a href=index.php?subcategory=" . $row2['cat_name'] . ">" . $row2['cat_name'] . "</a>"; ?> </p>
    <?php
    }
    ?>
</div>




<?php
do_html_footer();
?>