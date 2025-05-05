<?php
require_once dirname(__DIR__, 2) . '/includes/session.php';
include '../../output.php';

do_html_header('Articles');
?>





<!-----------------------------------------------------------------------------------------
--------------------------------- LEFT MENU -----------------------------------------------
------------------------------------------------------------------------------------------>
<div id="left">

	<!-- Main MENU -->
	<table width="300" border="0" cellpadding="6" cellspacing="1" class="boxed">

		<?php
		$query = "SELECT * FROM subcategory, maincategory where subcategory.maincategory_name=maincategory.cat_name";
		$result = mysqli_query(DBLINK, $query) or die('Error : ' . mysqli_error(DBLINK));
		$row = mysqli_fetch_array($result)
		?>

		<tr align="" bgcolor="#D22020">
			<td colspan="4" align="cente"><strong style="color: #FFFFFF">Manage::</strong></td>
		</tr>

		<tr bgcolor="#FFFFFF">
			<td colspan="4"><a href=new_category.php>Add Category</a></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td colspan="4"><a href=index.php?maincategory_name=<?php echo $row['maincategory_name']; ?>>List Categories</a></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td colspan="4"><a href=new_article.php>Add Article</a></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td colspan="4"><a href=index.php?cat_name=<?php echo $row['cat_name']; ?>>List Articles</a></td>
		</tr>
	</table>
	<!-- Main MENU END -->
	<br />
	<!-- Categories MENU -->
	<table width="300" border="0" cellpadding="6" cellspacing="1" class="boxed">

		<?php
		$query = "SELECT * FROM subcategory where maincategory_name='Immobilien'";
		$result = mysqli_query(DBLINK, $query) or die('Error : ' . mysqli_error(DBLINK));
		$num_rows = MYSQLI_NUM_rows($result);
		?>

		<tr align="" bgcolor="#D22020">
			<td colspan="4" align="center"><strong style="color: #FFFFFF">Immobilien Categories::</strong> (<b><?php echo $num_rows; ?></b>)</td>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($result)) {
		?>
			<tr bgcolor="#FFFFFF">
				<td colspan="4" style="text-align:left;"><?php echo "&nbsp;<a href=index.php?subcategory=" . $row['cat_name'] . ">- " . $row['cat_name'] . "</a>"; ?></td>
			</tr>
		<?php
		}
		?>
	</table>
	<!-- Categories MENU END -->
</div>





<div id="divide"></div>





<!-----------------------------------------------------------------------------------------
--------------------------------- List Categories ---------------------------------
------------------------------------------------------------------------------------------>
<?php
if (isset($_GET['maincategory_name'])) {
	$cat_name = $_GET['maincategory_name'];

	$qry = mysqli_query(DBLINK, "SELECT * FROM subcategory where maincategory_name='$cat_name'");
	if (!$qry) {
		die("Query Failed: " . mysqli_error(DBLINK));
	}
	$num_rows = MYSQLI_NUM_rows($qry);
?>
	<div id="right">
		<table width="580" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" class="boxed">
			<tr align="" bgcolor="#D22020">
				<td colspan="4" align="center" height="40"><strong>All Article Categories</strong> (<?php echo $num_rows; ?>)</td>
			</tr>
			<tr align="center" bgcolor="#CCCCCC">
				<td><strong>ID</strong></td>
				<td><strong>Article Category Name</strong></td>
				<td colspan="2"><strong>Action</strong></td>
			</tr>
			<?php
			/* Fetching data from the field "title" */
			while ($row = mysqli_fetch_array($qry)) {
				echo "<tr bgcolor=#FFFFFF>";
				echo "<td align=left>" . $row['cat_id'] . "</td>";
				echo "<td align=left>";
				echo "&nbsp;<a href=index.php?subcategory=" . $row['cat_name'] . ">" . $row['cat_name'] . "</a>";
				echo "</td>";
				echo "<td><a href=edit_category.php?cat_id=" . $row['cat_id'] . ">[edit]</a>";
			?>
				| <a href="javascript:delArticleCategory('<?php echo $row['cat_id']; ?>', '<?php echo $row['cat_name']; ?>');"> [delete]</a></td>
			<?php
				echo "</tr>";
			}
			?>
			</tr>
		</table>
	</div>
	<br clear="both" /><br clear="both" />
	<p align="center" style="color: #FFFFFF;"><?php echo '<a href="javascript:history.go(-1)"><< Back</a>'; ?> </p>
<?php
}
?>





<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING Category ---------------------------------------
------------------------------------------------------------------------------------------>
<?php
if (isset($_GET['del_c'])) {
	$cat_id = $_GET['del_c'];

	$qry = mysqli_query(DBLINK, "DELETE FROM subcategory WHERE cat_id='$cat_id'");
	if (!$qry) {
		die("Query Failed: " . mysqli_error(DBLINK));
	}
?>
	<p><img src="<?= ADM_URL ?>/images/sucess.png" width="40" height="25" />ArticleCategoryID: <b><?php echo $cat_id; ?></b> deleted Successfully</p>
	<br />
	<p align="center"><a href="<?= ADM_URL ?>/modules/articles/index.php?cat_name=Immobilien">Back to Articles</a></p>
<?php
}
?>





<!-----------------------------------------------------------------------------------------
--------------------------------- List Articles Where ex. Category=$Category -------------------------------
------------------------------------------------------------------------------------------>
<?php
if (isset($_GET['subcategory'])) {
	$subcategory = $_GET['subcategory'];

	$qry = mysqli_query(DBLINK, "SELECT * FROM articles WHERE subcategory='$subcategory' order by articles.id ASC");
	if (!$qry) {
		die("Query Failed: " . mysqli_error(DBLINK));
	}
	$num_rows = MYSQLI_NUM_rows($qry);
?>
	<div id="right">
		<table width="580" border="0" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
			<tr align="" bgcolor="#D22020">
				<td colspan="4" align="center" height="40">Category: <strong><?php echo $subcategory; ?></strong> | Aticles: <strong><?php echo $num_rows; ?></strong></td>
			</tr>
			<tr align="center" bgcolor="#CCCCCC">
				<td><strong>Image</strong></td>
				<td><strong>Category</strong></td>
				<td colspan="2"><strong>Action</strong></td>
			</tr>
			<?php
			if (MYSQLI_NUM_rows($qry) == 0) {
				echo "<tr bgcolor=#FFFFFF>";
				echo "<td colspan=4>0 Articles</td>";
				echo "</tr>";
			}
			/* Fetching data from the field "title" */
			while ($row = mysqli_fetch_array($qry)) {
				echo "<tr bgcolor=#FFFFFF>";

				$img = $row['image'];
				if ($img) {
			?>
					<td><a href="detail.php?id=<?php echo " " . $row['id'] . " " ?>"><img src="<?php echo SITE_URL ?>/uploads/<?php echo $row['image']; ?>" width="200px" align="left" /></a></td>
				<?php
				} else {
				?>
					<td><a href="detail.php?id=<?php echo " " . $row['id'] . " " ?>"><img src="<?= ADM_URL ?>/images/no-image-small.png" width="100" align="left" /></a></td>
				<?php
				}
				echo "<td><a href=detail.php?id=" . $row['id'] . ">" . $row['subcategory'] . "</a></td>";
				echo "<td><a href=edit_article.php?id=" . $row['id'] . ">[edit]</a>";
				?>
				| <a href="javascript:delArticle('<?php echo $row['id']; ?>', '<?php echo $row['title']; ?>');"> [delete]</a></td>
		<?php
				echo "</tr>";
			}
			echo "</table>";
		}
		?>





		<!-----------------------------------------------------------------------------------------
--------------------------------- VIEW ALL ARTICLES ---------------------------------------
------------------------------------------------------------------------------------------>
		<?php
		if (isset($_GET['cat_name'])) {
			$cat_name = $_GET['cat_name'];

			$qry2 = mysqli_query(DBLINK, "SELECT * FROM subcategory, maincategory where subcategory.maincategory_name='$cat_name'");
			if (!$qry2) {
				die("Query Failed: " . mysqli_error(DBLINK));
			}
			$row2 = mysqli_fetch_array($qry2);

			$qry = mysqli_query(DBLINK, "SELECT * FROM articles order by id ASC ");
			if (!$qry) {
				die("Query Failed: " . mysqli_error(DBLINK));
			}
			$num_rows = MYSQLI_NUM_rows($qry);
		?>
			<div id="right">
				<table width="580" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" class="boxed">
					<tr align="" bgcolor="#D22020">
						<td colspan="4" align="center" height="40"><strong>All Articles</strong> (<?php echo $num_rows; ?>)</td>
					</tr>
					<tr align="center" bgcolor="#CCCCCC">
						<td><strong>Image</strong></td>
						<td><strong>Main Category</strong></td>
						<td><strong>Article Category</strong></td>
						<td><strong>Action</strong></td>
					</tr>
					<?php
					/* Fetching data from the field "title" */

					while ($row = mysqli_fetch_array($qry)) {
					?>
						<tr bgcolor="#FFFFFF">
							<?php
							$img = $row['image'];
							if ($img) {
							?>
								<td><a href="detail.php?id=<?php echo " " . $row['id'] . " " ?>"><img src="<?php echo SITE_URL ?>/uploads/<?php echo $row['image']; ?>" width="100px" align="left" /></a></td>
							<?php
							} else {
							?>
								<td><a href="detail.php?id=<?php echo " " . $row['id'] . " " ?>"><img src="<?= ADM_URL ?>/images/no-image-small.png" width="100" align="left" /></a></td>
							<?php
							}
							echo "<td>" . $row2['cat_name'] . "</td>";
							echo "<td><a href=detail.php?id=" . $row['id'] . ">" . $row['subcategory'] . "</a></td>";
							echo "<td><a href=edit_article.php?id=" . $row['id'] . ">[edit]</a>";
							?>
							| <a href="javascript:delArticle('<?php echo $row['id']; ?>', '<?php echo $row['title']; ?>');"> [delete]</a></td>
						<?php
					}
						?>
						</tr>
				</table>
			</div>
		<?php
		}
		?>





		<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING ARTICLES ---------------------------------------
------------------------------------------------------------------------------------------>
		<?php
		if (isset($_GET['del_a'])) {
			$id = $_GET['del_a'];

			$qry = mysqli_query(DBLINK, "SELECT image FROM articles WHERE id='$id'");
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
			$qry = mysqli_query(DBLINK, "DELETE FROM articles WHERE id='$id'");
			if (!$qry) {
				die("Query Failed: " . mysqli_error(DBLINK));
			}
		?>
			<p><img src="<?= ADM_URL ?>/images/sucess.png" width="40" height="25" />ArticleId: <b><?php echo $id; ?> </b>& Image: <b><?php echo $image; ?></b> deleted Successfully</p>
			<br />
			<p align="center"><a href="<?= ADM_URL ?>/modules/articles/index.php">Back to Articles</a></p>
		<?php
		}
		?>





		<!-----------------------------------------------------------------------------------------
----------------- If there are no posted variables, dipslay this text below ---------------
------------------------------------------------------------------------------------------>
		<?php
		if (!isset($_GET['cat_name']) && !isset($_GET['cat']) && !isset($_GET['del_a']) && !isset($_GET['del_c']) && !isset($_GET['maincategory_name']) && !isset($_GET['subcategory'])) {
			echo '<p style=color: #C69C6D; font-size: 30px; text-align: center;>Welcome to Articles and Pages</p>
<p align=center>Choose a menu from the left navigation to get started</p>
<hr color=#534C42 />';
		}
		?>
	</div>





	<?php
	require_once '../../includes/functions_js.js';

	do_html_footer();
	?>