<?php  
include '../../output.php';

do_html_header('Create Category');
?>





<?php
if(isset($_POST['submit']))
{
$cat_id=$_POST['cat_id'];
$cat_name=$_POST['cat_name'];
$description=$_POST['description'];
$maincategory_name=$_POST['maincategory_name'];
$qry=mysql_query("INSERT INTO subcategory(cat_id, cat_name, description, maincategory_name)VALUES('$cat_id', '$cat_name', '$description', '$maincategory_name')", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Category <?php echo "<b>".$cat_name."</b>"; ?> added Successfully</p>
<br />
<?php
}
}
?>






<h2>Create New Article Category</h2>
<hr width="80%" color="#534C42" style="margin-top: -15px;" />
<form id="form1" name="form1" method="post">
<input type="hidden" name="cat_id" id="cat_id" />
&nbsp;&nbsp;&nbsp;Enter a New Article Category :
<label for="cat"></label>
<input type="text" name="cat_name" id="cat_name" />
<br /><br />
&nbsp;&nbsp;
Select MainCategory :
<select name="maincategory_name" id="maincategory_name">
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
<br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Description :
<label for="desc"></label>
<input type="text" name="description" id="description" /><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" id="submit" value="Submit" class="box"/>
</form>
<br clear="both" /><br clear="both" /><br clear="both" /><br clear="both" />
<p align="center" style="color: #FFFFFF;"><?php echo '<a href="javascript:history.go(-1)"><< Back</a>'; ?> </p>





<?php
do_html_footer();
?>