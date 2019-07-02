<style type="text/css">
table { font: 11px/24px Verdana, Arial, Helvetica, sans-serif; }
tr { backgound: #cccccc; } 
th { padding:2px; text-align: right; width: 0%; border: 2px solid #fff; }
td { padding-left: 0px; backgound-color: #ccccff; border: 2px solid #fff; }
.button { width: 150px; height: 50px; background: #3C74E6 url(../_images/img06.gif) repeat-x; font-size: 28px; font-weight: normal;
color: #ffffff; border: 2px solid #c9e749; border-radius: 7px; }
.large-font { font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding: 1px; border: 1px solid #00a59c; }
input { font-size: 14px; width: 98%; height: 30px; }
</style>
<table width="100%" border="0" align="" cellpadding="10" cellspacing="10">
<tr>
<td height="40" style="border: 0px;"><h2><strong>Kennwort ändern<div id="hrblue"></div></strong></h2></td>
</tr>
</table>
	<?php
	$qry = mysql_query("SELECT * FROM members where username='$username' LIMIT 0, 30 ", $con);
	if(!$qry)
	{
	die("Query Failed: ". mysql_error());
	}
	?>
<table width="100%" border="0" align="center" cellpadding="10" cellspacing="10" class="boxed">
	<?php
	//listing rows
	while($row=mysql_fetch_array($qry))	
	{
	?>
<form method="POST">
<input type="hidden" name="userID" id="userID" value="<?php echo $row['userID']; ?>" />
<tr> 
<td align="right"  width="46%">Aktuelles Passwort: </td>
<td  align="left"><input type="text" class="large-font" value="<?php echo $row['password'];?>" disabled /></td>
</tr>
<tr>
<td align="right"  width="46%">Neues Password: </td>
<td align="left"><input name="new_password" class="large-font" id="new_password" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left"><input name="edit" type="submit" class="button" id="update" value="Speichern"></td>
</tr>
</form>
	<?php
	}
	?>
</table>
<br />
	<?php
	if(isset($_POST['edit']))
	{
	$userID=$_POST['userID'];
	$new_password=$_POST['new_password'];
	$qry=mysql_query("UPDATE members SET password='$new_password' WHERE userID='$userID'", $con);
	if(!$qry)
	{
	die("Query Failed: ". mysql_error());
	}
	else
	{
	echo "<br /><br /><br />";
	echo "<p align=center style=color:green; font-size:small; class=box>Passwort erfolgreich geändert.</p>";
	?>
<meta http-equiv="Refresh" content="2;url=<?php echo SITE_URL; ?>privat/Kennwort" />
	<?php
	echo "<br />";
	}
	}
	?>
	<?php go_back(); ?>