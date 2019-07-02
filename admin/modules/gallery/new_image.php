<?php 
include '../../output.php';

do_html_header('New Image');
?>





<?php
if(isset($_POST['submit']))
{
$path= UPLOAD_DIR . 'uploads';
$name=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
$err=$_FILES['image']['error'];
if($err==0)
{
//move_uploaded_file($tmp, $name);
move_uploaded_file($tmp, "$path/$name");
}
$img=$_FILES["image"]["name"];
$desc=$_POST['description'];
$cat=$_POST['category'];

$qry=mysql_query("INSERT INTO images(image,description,subcategory)VALUES('$img','$desc','$cat')", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Image <?php echo "<b>".$img."</b>"; ?> added Successfully</p>
<br />
<?php
}
}
?>





<h2>Insert new Image</h2>
<hr width="80%" color="#534C42" style="margin-top: -15px;" />
<div id="work_area">
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<table id="main2" align="center" width="80%" border="0" cellpadding="5" cellspacing="1">
<tr>
<td width="200" align="right">Upload Image: </td>
<td align="left"><label for="image"></label><input type="file" name="image" id="image" /></td>
</tr>
<tr> 
<td width="200" align="right">Category: </td>
<td align="left">
<select name="category" id="category">
<?php
$qry=mysql_query("SELECT * FROM subcategory", $con);
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
<td colspan="2" align="left"><input type="submit" name="submit" id="button" value="Submit" /><input type="reset" name="button3" id="button3" value="Reset" /></td>
</tr>
</table>
</form>
<p align="center" style="color: #FFFFFF;"><?php echo '<a href="javascript:history.go(-1)"><< Back</a>'; ?> </p>
</div>





<?php
do_html_footer();
?>