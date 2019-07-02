<?php 
include '../../output.php';

do_html_header('Insert news');
?>





<?php //add news
if(isset($_POST['add']))
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
   $title = $_POST['title'];
   $img=$_FILES["image"]["name"];
   $content = $_POST['content'];
   $link = $_POST['link'];
   $category = $_POST['category'];

   // add the article in the database
	$query = "INSERT INTO news (title, image, content, link, date, subcategory) 
	VALUES ('$title', '$img', '$content', '$link', NOW(), '$category')";
	if (mysql_query($query))
	{
	echo "<br />";
	echo "Article <b>'$title'</b> added";
	echo "<br />";
	}
	else
	{
	die('Error : ' . mysql_error());
	}
}
?>



<br />
<form method="post" enctype="multipart/form-data">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Insert News</strong></td>
</tr>
<tr> 
<td width="150" align="right">Title: </td>
<td colspan="2" align="left"><input name="title" type="text" class="box" id="title"></td>
</tr>
<tr>
<td width="200" align="right">Upload Image: </td>
<td colspan="2" align="left"><input type="file" name="image" id="image" />
<span style="font-size: x-small;">(Uploading Image isn't necessary.)</span>
</td>
</tr>
<td width="150" align="right">Category: </td>
<td colspan="2" align="left">
<select name="category" id="category">
<?php
$qry=mysql_query("SELECT * FROM maincategory", $con);
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
<td colspan="2" align="left"><textarea name="content" cols="50" rows="10" class="box" id="content"></textarea></td>
</tr>
<tr> 
<td width="150" align="right">Link: </td>
<td colspan="2" align="left"><input name="link" type="text" class="box" id="link" value="http://"> (Please Use "http://", otherwise it will be not a link!!)
</td>
</tr>
<td width="150" align="right">Date: </td>
<td colspan="2" align="left"> <b>Today / Now</b></td>
</tr>
<tr> 
<td>&nbsp;</td>
<td colspan="2" align="left"><input name="add" type="submit" class="box" id="add" value="Insert"></td>
</tr>
</table>
<p align="center"><a href="<?php echo ADM_URL ?>modules/news/">Back to News</a></p>
</form>





<?php
do_html_footer();
?>