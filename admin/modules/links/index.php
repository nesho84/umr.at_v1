<?php
include '../../output.php';

do_html_header('Links');
?>





<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING Links ---------------------------------------
------------------------------------------------------------------------------------------>
<?php
if (isset($_GET['del_l']))
{
            $id = $_GET['del_l'];
			$query = "DELETE FROM links WHERE id = '$id'";
			mysql_query($query) or die('Error : ' . mysql_error());
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />LinkID: <b><?php echo $id;?></b> deleted Successfully</p>
<?php
}
?>





<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING Links Category ---------------------------------------
------------------------------------------------------------------------------------------>
<?php
if(isset($_GET['del_c']))
{
$cat_id=$_GET['del_c'];

$qry=mysql_query("DELETE FROM subcategory WHERE cat_id='$cat_id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />LinksCategoryID: <b><?php echo $cat_id;?></b> deleted Successfully</p>
<?php
}
?>
<br />





<!------------------------------- START Links Content ----------------------------->
<?php
$query = "SELECT id, title, content, link, subcategory FROM links ORDER BY id";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$qry2 = mysql_query("SELECT * FROM subcategory where maincategory_name='Links'", $con);
if (!$qry2) { 
die("Query Failed: ". mysql_error());
}
$row2 = mysql_fetch_array($qry2);
?>
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
<tr align="" bgcolor="#D22020"> 
<td colspan="6" align="center" height="40"><strong>LINKS</strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Main Category</strong></td>
<td><strong>Links Category</strong></td>
<td><strong>Title</strong></td>
<td><strong>Content</strong></td>
<td><strong>Link</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
//listing rows
while(list($id, $title, $content, $link, $cat_name) = mysql_fetch_array($result, MYSQL_NUM))
{
?>
<tr bgcolor="#FFFFFF">
<td width="200" height="30"> 
<?php echo $row2['maincategory_name'] ?>
</td>
<td width="200" height="30"> 
<?php echo $cat_name ?>
</td>
<td width="100" height="30"> 
<?php echo $title ?>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $content ?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><a href="<?php echo $link;?>"><?php echo $link;?></a></p>
</td>
<td width="200" align="center">
<!--<a href="<?php echo ADM_URL ?>modules/links/edit.php?id=<?php echo $id;?>">edit</a>-->
<a href="<?php echo ADM_URL ?>modules/links/edit.php?id=<?php echo $id;?>">edit</a>
| <a href="javascript:delLinks('<?php echo $id;?>', '<?php echo $title;?>');">delete</a>
</td>
</tr>
<?php
}
?>
<?php
$query = "SELECT * FROM subcategory, maincategory where subcategory.maincategory_name='Links' AND maincategory.cat_name='Links'";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$row = mysql_fetch_array($result)
?>
<tr> 
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<?php
if(!isset($_GET['maincategory_name']))
{
?>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='index.php?maincategory_name=<?php echo $row['maincategory_name'];?>'">  
</td>
<?php
}
else
{
?>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hide Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='index.php'">  
</td>
<?php
}
?>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Links&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='add.php'">  
</td>
</tr>
</table><!------------------------ END Links Content -------------------------------------->





<!-----------------------------------------------------------------------------------------
--------------------------------- List Links Categories -----------------------------------------
------------------------------------------------------------------------------------------>
<?php
if(isset($_GET['maincategory_name']))
{
$cat_name = $_GET['maincategory_name'];

$qry=mysql_query("SELECT * FROM subcategory where maincategory_name='$cat_name'  ", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
$num_rows = mysql_num_rows($qry);
?>
<br />
<table width="90%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#999999" class="boxed">
<tr align="" bgcolor="#D22020"> 
<td colspan="4" align="center" height="40"><strong>All Links Categories</strong> (<?php echo $num_rows; ?>)</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Article Category Name</strong></td>
<td colspan="2"><strong>Action</strong></td>
</tr>
<?php
/* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
echo "<tr bgcolor=#FFFFFF>";
echo "<td align=center>";
echo "&nbsp;<a href=index.php?subcategory=".$row['cat_name'].">".$row['cat_name']."</a>";
echo "</td>";
echo "<td><a href=edit_category.php?cat_id=".$row['cat_id'].">edit</a>";
?>
 | <a href="javascript:delLinksCategory('<?php echo $row['cat_id'];?>', '<?php echo $row['cat_name'];?>');"> delete</a></td>
<?php
echo "</tr>";
}
?>
</tr>
<tr> 
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='new_category.php'">  
</td>
</table>
<?php
}
?>





<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>