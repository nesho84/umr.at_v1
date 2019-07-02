<?php
include '../../output.php';

do_html_header('Members');
?>





<?php
if(isset($_POST['add']))
{
   $username = $_POST['username'];
   $members_level = $_POST['members_level'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $tel = $_POST['tel'];
   $address = $_POST['address'];
   
   // add the user in the database
	$query = "INSERT INTO members (username, members_level, password, name, email, tel, address) 
    VALUES ('$username', '$members_level', '$password', '$name', '$email', '$tel', '$address')";
	if (mysql_query($query))
	{
	?> 
	<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Member <?php echo "<b>".$username."</b>"; ?> added Successfully</p>
	<br />
	<?php
	}
	else
	{
	die('Error : ' . mysql_error() . '<br /><a href=/umr/admin/modules/umr_members/add.php><< go back</a>');
	}
}
?>





<br />
<form method="POST" id="add">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Insert UMR Members</strong></td>
</tr>
<tr>
<td align="right" width="430">Members_level: </td>
<td colspan="2" align="left">
<select name="members_level" id="members_level">
<?php
$qry=mysql_query("SELECT * FROM members_level", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
echo "<option value='".$row['members_level']."'>".$row['members_level']."</option>";
}
?>
</select>
</td>
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
<td align="right" width="430">Name: </td>
<td  align="left"><input name="name" class="box" id="name" /></td>
</tr>
<tr> 
<td align="right" width="430">E-mail: </td>
<td  align="left"><input name="email" class="box" id="email" /></td>
</tr>
<tr> 
<td align="right" width="430">Tel.: </td>
<td  align="left"><input name="tel" class="box" id="tel" /></td>
</tr>
<tr> 
<td align="right" width="430">Address: </td>
<td  align="left"><input name="address" class="box" id="address" /></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td colspan="2" align="left"><input name="add" type="submit" class="box" id="add" value="Insert"></td>
</tr>
</table>
<p align="center"><a href="<?php echo ADM_URL ?>modules/umr_members/">Back to Members</a></p>
</form>





<?php
do_html_footer();
?>