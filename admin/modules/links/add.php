<?php
include '../../output.php';

do_html_header('Insert Links');
?>





<?php
if(isset($_POST['insert']))
{
   $id = $_POST['id'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $link = $_POST['link'];
   $subcategory = $_POST['subcategory'];
   
   // add the article in the database	
   $query = "INSERT INTO links (id, title, content, link, subcategory) 
   VALUES ('$id', '$title', '$content', '$link', '$subcategory')";
   mysql_query($query) or die('Error : ' . mysql_error());

	echo "<br />";
	echo "Link <b>'$title'</b> added Successfully";
	echo "<br />";
}
?>





<br />
<form method="POST">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Insert Links: </strong></td>
</tr>
<tr>
<td width="150" align="right">ID: </td> 
<td align="left"><input class="box" name="id" type="text" id="id" /></td>
</tr>
<tr>
<td width="150" align="right">Title: </td>
<td colspan="1" align="left"><input name="title" type="text" class="box" id="title" /></td>
</tr>
<td width="150" align="right">Link: </td>
<td colspan="2" align="left"><input name="link" type="text" class="box" id="link" value="http://" /> <b>(Please Use "http://", otherwise it will be not a link!!)</b></td>
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
<td colspan="2" align="left"><textarea name="content" cols="50" rows="10" class="box" id="content"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td colspan="2" align="left"><input name="insert" type="submit" class="box" id="insert" value="Insert" /></td>
</tr>
</table>
</form>





<p align="center"><a href="<?php echo ADM_URL ?>modules/links/">Back to Links</a></p>