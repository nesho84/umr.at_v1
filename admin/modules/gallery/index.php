<?php 
include '../../output.php';

do_html_header('Photo Gallery');
?>




<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING Images ---------------------------------------
------------------------------------------------------------------------------------------>
<?php
if(isset($_GET['del_i']))
{
$id=$_GET['del_i'];

$qry=mysql_query("SELECT image FROM images WHERE id='$id'", $con);
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
$qry=mysql_query("DELETE FROM images WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Image deleted Successfully</p>
<?php
}
}
?>





<?php

$qry2 = mysql_query("SELECT * FROM maincategory where cat_name='images'", $con);
if (!$qry2) { 
die("Query Failed: ". mysql_error());
}
$row2 = mysql_fetch_array($qry2);

$qry=mysql_query("SELECT * FROM images order by id ASC ", $con);
if (!$qry)
{
die("Query Failed: ". mysql_error());
}
$num_rows = mysql_num_rows($qry);
?>
<br />
<table width="90%" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" class="boxed" align="center">
</tr>
<tr align="" bgcolor="#D22020"> 
<td colspan="4" align="center" height="40"><strong>Photo Gallery</strong> (<?php echo $num_rows; ?>)</td>
<td bgcolor="#CCCCCC">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='new_image.php'">  
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Image</strong></td>
<td><strong>Main Category</strong></td>
<td><strong>SubCategory</strong></td>
<td><strong>Description & Title</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
if ($num_rows < 1) 
{
echo '<tr>';
echo '<td colspan=4>No Images yet!</td>';
echo '</tr>';
}
else
{
/* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
?>
<tr bgcolor="#FFFFFF">
<?php
$img=$row['image'];
if ($img)
{
?>
<td><img src="<?php echo SITE_URL ?>uploads/<?php echo $row['image'];?>" width="50" height="50" /></td>
<?php
}
else
{
?>
<td><a href="detail.php?id=<?php echo " ".$row['cat_id']." "?>"><img src="<?php echo ADM_URL ?>images/no-image-small.png" width="50" height="50" align="left" /></a></td>
<?php
}
echo "<td>".$row2['cat_name']."</td>";
echo "<td>".$row['subcategory']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td><a href=edit_image.php?id=".$row['id'].">edit</a>";
?>
 | <a href="javascript:delImage('<?php echo $row['id'];?>', '<?php echo $row['image'];?>');"> delete</a></td>
</tr>

<?php
}
}
?>
<tr> 
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Image&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='new_image.php'">  
</td>
</tr>
</table>




<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>