<?php
include '../../output.php';

do_html_header('Insert Category');
?>





<?php
if(isset($_POST['add']))
{
   $cat_name = $_POST['cat_name'];
   $description = $_POST['description'];
   
   // add the article in the database	
	     $query = "INSERT INTO maincategory (cat_name, description) 
   VALUES ('$cat_name', '$description')";
   mysql_query($query) or die('Error : ' . mysql_error());
?> 
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Category <?php echo "<b>".$cat_name."</b>"; ?> added Successfully</p>
<br />
<?php
}
?>





<br />
<form method="POST">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Insert Category</strong></td>
</tr>
<tr> 
<td align="right" width="430">Category Name: </td>
<td colspan="2" align="left"><input name="cat_name" type="text" class="box" id="cat_name" /></td>
</tr>
<tr> 
<td align="right" width="430">Description: </td>
<td  align="left"><input name="description" type="text" class="box" id="description" /></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td colspan="2" align="left"><input name="add" type="submit" class="box" id="add" value="Insert"></td>
</tr>
</table>
<p align="center"><a href="<?php echo ADM_URL ?>modules/categories/">Back to categories</a></p>
</form>





<?php
do_html_footer();
?>