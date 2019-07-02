<style type="text/css">
table { font: 11px/24px Verdana, Arial, Helvetica, sans-serif; }
tr { backgound: #cccccc; } 
th { padding:2px; text-align: right; width: 0%; border: 2px solid #fff; }
td { padding-left: 0px; backgound-color: #ccccff; border: 2px solid #fff; }
.button { width: 150px; height: 50px; background: #3C74E6 url(../_images/img06.gif) repeat-x; font-size: 28px; font-weight: normal;
color: #ffffff; border: 2px solid #c9e749; border-radius: 7px; }
input { font-size: 14px; width: 300px; height: 30px; }
.large-font { font-family: Arial, Helvetica, sans-serif; font-size: 20px; padding: 1px; border: 1px solid #00a59c; }
select { width: 304px; height: 36px; }
</style>
	<?php
	if(isset($_GET['userID']))
	{
	$userID=$_GET['userID'];
	$qry=mysql_query("SELECT * FROM members WHERE userID=$userID AND members_level='mitarbeiter'", $con);
	if(!$qry)
	{ die("Query Failed: ". mysql_error()); }
	?>
<form method="post">
<table width="100%" border="0" align="" cellpadding="1" cellspacing="1" class="boxed">
<tr>
<th height="40" align="left" style="text-align: left; border: 0px;"><h2><strong>Mitarbeiter - Bearbeiten<div id="hrblue"></div></strong></h2></th>
</tr>
</table>
<table width="100%" border="0" align="" cellpadding="10" cellspacing="10">
	<?php
	while($row = mysql_fetch_array($qry))
	{
	?>
<input type="hidden" name="userID" id="idd" value="<?php echo $row['userID']; ?>" />
<input name="members_level" type="hidden" class="box" id="members_level" value="mitarbeiter" />
<tr><td></td><td align="left"><span style="font-size:11px;">Eingabefelder mit einem ( * ) sind Pflichtfelder.</span></td></tr>
<tr>
<th align="right">Username:</th>
<td align="left"><input type="text" class="large-font" value="<?php echo $row['username'];?>" disabled /></td>
</tr>
<tr>
<th align="right">Password: </th>
<td align="left"><input type="password" class="large-font" value="<?php echo $row['password'];?>" disabled /></td>
</tr>
<tr>
<th align="right">Name: </th>
<td align="left"><input type="text" class="large-font" value="<?php echo $row['name'];?>" disabled /></td>
</tr>
<tr>
<th align="right">E-mail: </th>
<td align="left"><input name="email" class="large-font" id="email" value="<?php echo $row['email'];?>" /></td>
</tr>
<tr>
<th align="right">Tel.: </th>
<td align="left"><input name="tel" class="large-font" id="tel" value="<?php echo $row['tel'];?>" /></td>
</tr>
<tr>
<th align="right">Address: </th>
<td align="left"><input name="address" class="large-font" id="address" value="<?php echo $row['address'];?>" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left"><input name="edit" type="submit" class="button" id="update" value="&nbsp;Speichern&nbsp;"></td>
</tr>
	<?php
	}
	?>
</table>
</form>
	<?php
	}
	?>
<!-- Mitarbeiter Bearbeiten END -->

	<?php
	if(isset($_POST['edit']))
	{
	$userID=$_POST['userID'];
	$members_level=$_POST['members_level'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$address=$_POST['address'];

	$qry=mysql_query("UPDATE members SET members_level='$members_level', email='$email', tel='$tel', address='$address' WHERE userID='$userID'", $con);
	if(!$qry)
	{
	die("Query Failed: ". mysql_error());
	}
	else
	{
	echo "<br /><br />";
	echo "<p align=center style=color:green; font-size:small; class=box>Mitarbeiter daten erfolgreich geändert...</p>";
	?>
<meta http-equiv="Refresh" content="2;url=<?php echo SITE_URL; ?>privat/Mitarbeiter" />
	<?php
	}
	}
	?>
	<?php go_back(); ?>