<?php 
include '../../output.php';

do_html_header('Edit Image');
?>





<?php
if(isset($_POST['submit']))
{
$id=$_POST['id'];
$cat=$_POST['category'];
$img=$_FILES["image"]["name"];
$desc=$_POST['description'];

$qry=mysql_query("SELECT * FROM subcategory", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

if($img)
{
$path= UPLOAD_DIR . '/uploads';
$name=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
$err=$_FILES['image']['error'];
if($err==0)
{
move_uploaded_file($tmp, "$path/$name");
}

$qry=mysql_query("UPDATE images SET image='$img' WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
}

$qry=mysql_query("UPDATE images SET description='$desc', subcategory='$cat' WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Image updated Successfully</p>
<br />
<?php
}
}
?>





<h2>Edit Image</h2>
<hr width="80%" height="" color="#0F0F0F">

<div id="work_area">
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT * FROM images WHERE id=$id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
$row=mysql_fetch_array($qry);
}

?>

<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1">
<input type="hidden" name="id" id="idd" value="<?php echo $row['id']; ?>" />
<tr>
<td width="200" align="right">SubCategory: </td>
<td align="left"><label for="cat"></label>
<select name="category" id="category">
<?php
$qry2=mysql_query("SELECT * FROM subcategory", $con);
if(!$qry2)
{
die("Query Failed: ". mysql_error());
}
while($row2=mysql_fetch_array($qry2))
{
echo "<option value='".$row2['cat_name']."'>".$row2['cat_name']."</option>";
}
?>
</select>
<span style="font-size: x-small; color: #FFFFFF;">(<strong>Important:</strong> Without selecting Category the Field "Category" will be Wrong!)</span>
</td>
</tr>
<tr>
<td width="200" align="right">&nbsp;</td>
<td align="left">
<img src="<?php echo SITE_URL ?>uploads/<?php echo $row['image'];?>" width="100px" align="left" />
</td>
</tr>
<tr>
<td width="200" align="right" valign="top">Image: </td>
<td align="left"><label for="image"></label><input type="file" name="image" id="image" value="<?php echo $row['image']; ?>" />
<span style="font-size: x-small;">(Upload New Image only is there is a change in the existing image)</span></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left" colspan="2">
<span style="color: #FFFFFF; font-weight: bold; font-size: 10px;">
>>> HTML codes are allowed <<<
</span>
</td>
</tr>
<tr>
<td width="200" align="right">Insert to Title: </td>
<td align="left">
<select name="description" id="description">
<?php
$qry=mysql_query("SELECT * FROM articles", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
echo "<option value='".$row['title']."'>".$row['title']."</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td>&nbsp;</td> 
<td colspan="2" align="left"><input type="submit" name="submit" id="submit" value="Submit" /></td>
</tr>
</table>
</form>
</div>





<?php
do_html_footer();
?>