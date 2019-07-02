<?php
include '../../output.php';

do_html_header('Members');
?>





<?php
if(isset($_GET['del_members']))
{
   $userID = $_GET['del_members'];
   $query = "DELETE FROM members WHERE userID = '$userID'";
   mysql_query($query) or die('Error : ' . mysqli_error());
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />UserID: <b><?php echo $userID;?></b> deleted Successfully</p>
<?php
}

if(isset($_GET['clearData']))
{
   $username = $_GET['clearData'];
   $query = "DELETE FROM stundenliste WHERE username = '$username'";
   mysql_query($query) or die('Error : ' . mysqli_error());
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Username: <b><?php echo $username;?></b> hase been cleared Successfully</p>
<?php
}
?>





<br />
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#999999" class="boxed">
<?php
$query = "SELECT last_activity, members_level, userID, username, password, name, email, tel, address FROM members ORDER BY userID";
$result = mysqli_query($con, $query) or 
die("Query Failed: ". mysqli_error($con));
?>
<tr align="" bgcolor="#D22020"> 
<td colspan="8" align="center" height="40"><strong>UMR MEMBERS</strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Last Login</strong></td>
<td><strong>Level</strong></td>  
<td><strong>Username</strong></td>
<td><strong>Name</strong></td>
<td><strong>E-mail</strong></td>
<td><strong>Tel.</strong></td>
<td><strong>Address</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
while(list($last_activity, $members_level, $userID, $username, $password, $name, $email, $tel, $address) = mysql_fetch_array($result, MYSQL_NUM))
{
?>
<tr bgcolor="#FFFFFF">
<td height="30"> 
<?php echo $last_activity ?>
</td>
<td height="30"> 
<?php echo $members_level ?>
</td>
<td height="30"> 
<?php echo $username ?>
</td>
<td height="30"> 
<?php echo $name ?>
</td>
<td height="30"> 
<?php echo $email ?>
</td>
<td height="30"> 
<?php echo $tel ?>
</td>
<td height="30"> 
<?php echo $address ?>
</td>
<td width="210" align="center">
<a href="<?php echo ADM_URL ?>modules/umr_members/edit.php?userID=<?php echo $userID;?>">edit </a>|
<a href="javascript:delMembers('<?php echo $userID;?>', '<?php echo $username;?>');">delete</a> |
<a href="javascript:clearData('<?php echo $username;?>');">clear data</a>
</td>
</tr>
<?php
}
?>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add members&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='<?php echo ADM_URL ?>modules/umr_members/add.php';">  
</td>
</tr>
</table>

<br />
<div style="border: 1px solid black;">
<p>Please clear the data first, before deleting user!</p>
</div>





<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>