<?php
include '../../output.php';

do_html_header('View Categories');
?>





<div id="main"><div id="main2">

<?php
$cat_name = $_GET['cat_name'];

$qry=mysql_query("SELECT * FROM subcategory where maincategory_name='$cat_name' ", $con);
if (!$qry)
{
die("Query Failed: ". mysql_error());
}
?>
<br />
<table id="main2" align="center" width="960px" border="1" cellpadding="5" cellspacing="0">
<tr bgcolor="#D22020">
<td colspan="2">SubCategories: <b><?php echo $cat_name ?></b></td>
</tr>
<tr bgcolor="#CCCCFF">
<td><strong>Category Name: </strong></td>
<td><strong>Description: </strong></td>
</tr>
<?php
while($row=mysql_fetch_array($qry))
{
?>
<tr>
<td><?php echo $row['cat_name'];?></td>
<td><?php echo $row['description'];?></td>
</tr>
<?php
}
?>
</table>





<p align="center"><a href="<?php echo ADM_URL ?>modules/categories/">Back to Categories</a></p>
</div></div>





<?php
do_html_footer();
?>