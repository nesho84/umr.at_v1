<?php 
include '../../output.php';

do_html_header('Update Category');
?>





<?php
if(isset($_POST['edit']))
{
$cat_id=$_POST['cat_id'];
$cat_name=$_POST['cat_name'];
$description=$_POST['description'];

//$qry=mysql_query("UPDATE login SET user='$username',password='$password' WHERE id='$id'", $con);
$qry=mysql_query("UPDATE maincategory SET cat_name='$cat_name', description='$description' WHERE cat_id='$cat_id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Category: <b><?php echo $id;?></b> Updated Successfully</p>
<?php
}
}
?>





<?php
if(isset($_GET['cat_id']))
{
$cat_id=$_GET['cat_id'];
$qry=mysql_query("SELECT * FROM maincategory WHERE cat_id=$cat_id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
$row=mysql_fetch_array($qry);
?>
<br />
<form method="POST">
<input type="hidden" name="cat_id" id="cat_idd" value="<?php echo $row['cat_id']; ?>" />

<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Change Category</strong></td>
</tr>
<!--<tr> 
<td>Username</td>
<td colspan="2" align="left"><input name="username" type="text" class="box" id="username" value="<?php echo $row['user'];?>" /></td>
</tr>-->
<tr> 
<td align="right" width="430">Category Name: </td>
<td  align="left"><strong><input name="cat_name" class="box" id="cat_name" value="<?php echo $row['cat_name'];?>" /></strong></td>
</tr>
<tr>
<td align="right">Description: </td>
<td align="left"><input name="description" class="box" id="description" value="<?php echo $row['description'];?>" /></td>
</tr>
<?php
}
?>
<tr>
<td>&nbsp;</td>
<td align="left"><input name="edit" type="submit" class="box" id="update" value="Update"></td>
</tr>
</table>
</form>





<p align="center"><a href="<?php echo ADM_URL ?>modules/categories/">Back to Categories</a></p>






<?php
do_html_footer();
?>