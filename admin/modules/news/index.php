<?php
include '../../output.php';

do_html_header('News');
?>





<?php
if(isset($_GET['del_n']))
{
$id = $_GET['del_n'];

$qry=mysql_query("SELECT image FROM news WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
		$image = $row['image'];
		$path = UPLOAD_DIR;
		if ($row['image']) 
		{
		@unlink("$path/uploads/$image");
		}
		
}

$query = "DELETE FROM news WHERE id = '$id'";
mysql_query($query) or die('Error : ' . mysql_error());
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />NewsID: <b><?php echo $id;?></b> deleted Successfully</p>
<?php
}
?>





<br />
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
<?php
$query = "SELECT id, title, image, content, link, date, subcategory FROM news ORDER BY id";
$result = mysqli_query($con, $query) or die('Error : ' . mysqli_error($con));
?>
<tr align="" bgcolor="#D22020"> 
<td colspan="6" align="center" height="40"><strong>NEWS</strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Image</strong></td>
<td><strong>Category</strong></td> 
<td><strong>Title</strong></td>
<td><strong>Link</strong></td>
<td><strong>Date & Time</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
while(list($id, $title, $img, $content, $link, $date, $subcategory) = mysqli_fetch_array($result))
{
?>
<tr bgcolor="#FFFFFF">
<?php //If there is image show row image if not show no-image
if ($img)
{
?>
<td width="60" height="30"><img src="<?php echo SITE_URL ?>uploads/<?php echo $img;?>" width="50" height="50" /></td>
<?php
}
else
{
?>
<td width="60" height="30"><a href="<?php echo ADM_URL ?>modules/news/view.php?id=<?php echo $id;?>"><img src="<?php echo ADM_URL ?>images/no-image-small.png" width="50" height="50" align="left" /></a></td>
<?php
}
?>
<td width="200"> 
<?php echo $subcategory ?>
</td>
<td width="200" height="30"> 
<?php echo $title ?>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $link ?></p>
</td>
<td width="150" height="30"> 
<?php echo $date ?>
</td>
<td width="250" align="center">
<a href="<?php echo ADM_URL ?>modules/news/view.php?id=<?php echo $id;?>">view</a> 
| <a href="<?php echo ADM_URL ?>modules/news/edit.php?id=<?php echo $id;?>">edit</a> 
| <a href="javascript:delNews('<?php echo $id;?>', '<?php echo $title;?>');">delete</a>
</td>
</tr>
<?php
}
?>
<tr> 
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add News&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='<?php echo ADM_URL ?>modules/news/add.php';">  
</td>
</tr>
</table>





<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>