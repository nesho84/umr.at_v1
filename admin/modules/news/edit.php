<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('Edit news');
?>





<?php
if (isset($_GET['del_img'])) {
	$id = $_GET['del_img'];

	$qry = mysqli_query(DBLINK, "SELECT image FROM news WHERE id='$id'");
	if (!$qry) {
		die("Query Failed: " . mysqli_error(DBLINK));
	}
	while ($row = mysqli_fetch_array($qry)) {
		$image = $row['image'];
		$path = UPLOAD_DIR;
		if ($row['image']) {
			@unlink("$path/uploads/$image");
		}
	}
}
?>





<?php
if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$tit = $_POST['title'];
	$link = $_POST['link'];
	$img = $_FILES["image"]["name"];
	$cont = $_POST['content'];
	$subcategory = $_POST['subcategory'];

	if ($img) {
		$path = UPLOAD_DIR . '/uploads';
		$name = $_FILES['image']['name'];
		$tmp = $_FILES['image']['tmp_name'];
		$err = $_FILES['image']['error'];
		if ($err == 0) {
			move_uploaded_file($tmp, "$path/$name");
		}

		$qry = mysqli_query(DBLINK, "UPDATE news SET image='$img' WHERE id='$id'");
		if (!$qry) {
			die("Query Failed: " . mysqli_error(DBLINK));
		}
	}

	$qry = mysqli_query(DBLINK, "UPDATE news SET title='$tit',link='$link',content='$cont',date=NOW(),subcategory='$subcategory' WHERE id='$id'");
	if (!$qry) {
		die("Query Failed: " . mysqli_error(DBLINK));
	} else {
?>
		<p><img src="<?= ADM_URL ?>/images/sucess.png" width="40" height="25" />News <?php echo "<b>" . $tit . "</b>"; ?> updated Successfully</p>
		<br />
<?php
	}
}
?>





<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$qry = mysqli_query(DBLINK, "SELECT * FROM news WHERE id=$id");
	if (!$qry) {
		die("Query Failed: " . mysqli_error(DBLINK));
	}
	/* Fetching data from the field "title" */
	$row = mysqli_fetch_array($qry);
}
?>
<br />
<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" id="idd" value="<?php echo $row['id']; ?>" />
	<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
		<tr bgcolor="#D22020">
			<td colspan="3"><strong>Update News</strong></td>
		</tr>
		<tr>
			<td width="150" align="right">Title: </td>
			<td colspan="2" align="left"><input name="title" type="text" class="box" id="title" value="<?php echo $row['title']; ?>" /></td>
		</tr>
		<tr>
			<td width="150" align="right">Link: </td>
			<td colspan="2" align="left"><input name="link" type="text" class="box" id="link" value="<?php echo $row['link']; ?>" /></td>
		</tr>
		<tr>
			<td width="200" align="right">&nbsp;</td>
			<td align="left">
				<?php
				if ($row['image']) {
				?>
					<img src="<?php echo SITE_URL ?>/uploads/<?php echo $row['image']; ?>" width="100px" align="left" />
					&nbsp;&nbsp;&nbsp;<a href="<?= ADM_URL ?>/modules/news/edit.php?id=<?php echo $id; ?>&del_img=<?php echo $id; ?>">delete</a>
				<?php
				}
				?>
			</td>
		</tr>
		<tr>
			<td width="200" align="right" valign="top">Image: </td>
			<td align="left"><label for="image"></label><input type="file" name="image" id="image" value="<?php echo $row['image']; ?>" />
				<span style="font-size: x-small;">(Upload New Image only is there is a change in the existing image)</span>
			</td>
		</tr>
		<tr>
			<td width="150" align="right">Content: </td>
			<td colspan="2" align="left"><textarea name="content" cols="50" rows="10" class="box" id="content" /><?php echo $row['content']; ?></textarea></td>
		</tr>
		<tr>
			<td width="150" align="right">Category: </td>
			<td colspan="2" align="left">
				<select name="subcategory" id="subcategory">
					<?php
					$qry = mysqli_query(DBLINK, "SELECT * FROM subcategory where maincategory_name='News'");
					if (!$qry) {
						die("Query Failed: " . mysqli_error(DBLINK));
					}
					while ($row = mysqli_fetch_array($qry)) {
						echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="left"><input name="edit" type="submit" class="box" id="update" value="Update News"></td>
		</tr>
	</table>
</form>





<p align="center"><a href="<?= ADM_URL ?>/modules/news/">Back to News</a></p>





<?php
do_html_footer();
?>