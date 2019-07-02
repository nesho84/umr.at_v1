<?php
include '../../output.php';

do_html_header('Insert users');
?>





<?php
if(isset($_POST['add']))
{
   $username = $_POST['username'];
   $password = $_POST['password'];
   
   // add the user in the database
	$query = "INSERT INTO login (user, password) 
    VALUES ('$username', '$password')";
	if (mysql_query($query))
	{
	?> 
	<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />User <?php echo "<b>".$username."</b>"; ?> added Successfully</p>
	<br />
	<?php
	}
	else
	{
	die('Error : ' . mysql_error() . '<br /><a href=/albimco/admin/modules/users/add.php><< go back</a>');
	}
}
?>





<br />
<form method="POST" id="add">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Insert users</strong></td>
</tr>
<tr> 
<td align="right" width="430">Username: </td>
<td colspan="2" align="left"><input name="username" type="text" class="box" id="username" /></td>
</tr>
<tr> 
<td align="right" width="430">Password: </td>
<td  align="left"><input name="password" class="box" id="password" /></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td colspan="2" align="left"><input name="add" type="submit" class="box" id="add" value="Insert"></td>
</tr>
</table>
<p align="center"><a href="<?php echo ADM_URL ?>modules/users/">Back to users</a></p>
</form>





<?php
do_html_footer();
?>