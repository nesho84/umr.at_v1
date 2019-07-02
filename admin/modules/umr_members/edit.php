<?php
include '../../output.php';

do_html_header('Memebers');
?>





<?php
if(isset($_POST['edit']))
{
$userID=$_POST['userID'];
$members_level=$_POST['members_level'];
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$address=$_POST['address'];

$qry=mysql_query("UPDATE members SET members_level='$members_level', username='$username', password='$password', name='$name', email='$email', tel='$tel', address='$address' WHERE userID='$userID'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
echo "<br />";
echo "Details changed";
echo "<br />";
}
}
?>





<?php
if(isset($_GET['userID']))
{
$userID=$_GET['userID'];
$qry=mysql_query("SELECT * FROM members WHERE userID=$userID", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
$row=mysql_fetch_array($qry);
}
?>
<br />
<form method="POST">
<input type="hidden" name="userID" id="idd" value="<?php echo $row['userID']; ?>" />
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Edit Members</strong></td>
</tr>
<tr>
<td align="right" width="430">Members_level: </td>
<td colspan="2" align="left">
<select name="members_level" id="members_level">
<?php
$qry2=mysql_query("SELECT * FROM members_level", $con);
if(!$qry2)
{
die("Query Failed: ". mysql_error());
}
while($row2=mysql_fetch_array($qry2))
{
echo "<option value='".$row2['members_level']."'>".$row2['members_level']."</option>";
}
?>
</select>
</td>
</tr>
<tr> 
<td align="right">Username</td>
<td align="left"><input name="username" type="text" class="box" id="username" value="<?php echo $row['username'];?>" /></td>
</tr>
<tr>
<td align="right">Password: </td>
<td align="left"><input name="password" class="box" id="password" value="<?php echo $row['password'];?>" /></td>
</tr>
<tr>
<td align="right">Name: </td>
<td align="left"><input name="name" class="box" id="name" value="<?php echo $row['name'];?>" /></td>
</tr>
<tr>
<td align="right">E-mail: </td>
<td align="left"><input name="email" class="box" id="email" value="<?php echo $row['email'];?>" /></td>
</tr>
<tr>
<td align="right">Tel.: </td>
<td align="left"><input name="tel" class="box" id="tel" value="<?php echo $row['tel'];?>" /></td>
</tr>
<tr>
<td align="right">Address: </td>
<td align="left"><input name="address" class="box" id="address" value="<?php echo $row['address'];?>" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left"><input name="edit" type="submit" class="box" id="update" value="Update"></td>
</tr>
</table>
</form>





<p align="center"><a href="<?php echo ADM_URL ?>modules/umr_members/">Back to Members</a></p>





<?php
do_html_footer();
?>