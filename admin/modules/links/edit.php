<?php
include '../../output.php';

do_html_header('Edit Links');
?>





<?php
if(isset($_POST['edit']))
{
$id=$_POST['id'];
$idd=$_POST['idd'];
$tit=$_POST['title'];
$cont=$_POST['content'];
$link=$_POST['link'];
$subcategory=$_POST['subcategory'];

$qry=mysql_query("UPDATE links SET id='$idd',title='$tit',content='$cont',link='$link',subcategory='$subcategory' WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Link <?php echo "<b>".$link."</b>"; ?> updated Successfully</p>
<br />
<?php
}
}
?>

<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT * FROM links WHERE id=$id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
$content=$row['content'];
?>





<br />
<form method="POST">
<input type="hidden" name="id" id="idd" value="<?php echo $row['id']; ?>" />
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Update Links</strong></td>
</tr>
<tr> 
<td width="150" align="right">ID: </td>
<td colspan="2" align="left"><input type="text" name="idd" id="idd" class="box" value="<?php echo $row['id']; ?>" /></td>
</tr>
<tr> 
<td width="150" align="right">Title: </td>
<td colspan="2" align="left"><input name="title" type="text" class="box" id="title" value="<?php echo $row['title'];?>" /></td>
</tr>
<td width="150" align="right">Link: </td>
<td colspan="2" align="left"><input name="link" type="text" class="box" id="link" value="<?php echo $row['link'];?>" /></td>
</tr>
<tr>
<td width="150" align="right">Category: </td>
<td colspan="2" align="left">
<select name="subcategory" id="subcategory">
<?php
$qry=mysql_query("SELECT * FROM subcategory where maincategory_name='Links'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
echo "<option value='".$row['cat_name']."'>".$row['cat_name']."</option>";
}
?>
</select>
</td>
</tr>
<tr> 
<td width="150" align="right">Content: </td>
<td colspan="2" align="left"><textarea name="content" cols="50" rows="10" class="box" id="content" /><?php echo $content;?></textarea></td>
</tr>
<tr> 
<td>&nbsp;</td>
<td colspan="2" align="left"><input name="edit" type="submit" class="box" id="update" value="Update Links"></td>
</tr>
</table>
</form>
<?php
}
}
?>




<p align="center"><a href="<?php echo ADM_URL ?>modules/links/">Back to Links</a></p>






<?php
do_html_footer();
?>