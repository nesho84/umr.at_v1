<?php
include '../../output.php';

do_html_header('Categories');
?>





<br />
<?php
if(isset($_GET['del']))
{
   $id = $_GET['del'];
   $query = "DELETE FROM maincategory WHERE cat_id = '$id'";
   mysql_query($query) or die('Error : ' . mysql_error());
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />CategoryID: <b><?php echo $id;?></b> deleted Successfully</p>
<?php
}
?>





<table width="90%" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
<?php
$query = "SELECT cat_id, cat_name, description FROM maincategory ORDER BY cat_id";
$result = mysqli_query($con, $query) or die('Error : ' . mysqli_error($con));
?>
<tr align="" bgcolor="#D22020"> 
<td colspan="4" align="center" height="40"><strong>Categories</strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC"> 
<td><strong>MainCategory_ID</strong></td>
<td><strong>MainCategory Name</strong></td>
<td><strong>Description</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
while(list($cat_id, $cat_name, $description) = mysqli_fetch_array($result))
{
?>
<tr bgcolor="#FFFFFF">
<td height="30"> 
<?php echo $cat_id ?>
</td>
<td height="30"> 
<?php echo $cat_name ?>
</td>
<td height="30"> 
<?php echo $description ?>
</td>
<td width="250" align="center">
<a href="<?php echo ADM_URL ?>modules/categories/view.php?cat_name=<?php echo $cat_name;?>">view</a> 
| <a href="<?php echo ADM_URL ?>modules/categories/edit.php?cat_id=<?php echo $cat_id;?>">edit</a> 
| <a href="javascript:delCategory('<?php echo $cat_id;?>', '<?php echo $cat_name;?>');">delete</a>
</td>
</tr>
<?php
}
?>
<tr> 
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='<?php echo ADM_URL ?>modules/categories/add.php';">  
</td>
</tr>
</table>





<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>