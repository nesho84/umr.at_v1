<style type="text/css">
table { font: 11px/24px Verdana, Arial, Helvetica, sans-serif; }
tr { backgound: #cccccc; }
th { padding:2px; }
td { text-align: center; padding-left: 0px; backgound-color: #ccccff; }
td a { font-weight: bold; }
span { font-size: 14px; color: #fff; }
span a { color: #fff; text-decoration: none;}
</style>
<table width="100%" border="0" align="" cellpadding="1" cellspacing="1" class="boxed">
<tr>
<th height="40" align="left"><h2><strong>Mitarbeiter - UMR Gmbh<div id="hrblue"></div></strong></h2></th>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#ccccff" class="boxed">
<tr align="" bgcolor="#00a59c">
<td colspan="7" height="25" style="text-align:right; padding: 4px;" valign="center">
	<?php
	if ($members_level == 'vorarbeiter' || $members_level == 'firma')
	{
	?>
<span><a href="<?php echo SITE_URL ?>privat/Mitarbeiter/Hinzufugen"><img src="<?php echo IMAGE_DIR;?>/add_person.png" style="text-align:right; border=0; margin-top: 1px;" width="30" height="30">&nbsp;Mitarbeiter hinzufügen&nbsp;</a></span>
	<?php
	}
	?>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<th>Name</th>
<th>Tel.</th>
<th>Adresse</th>
<th>Username</th>
	<?php
	if ($members_level == 'vorarbeiter' || $members_level == 'firma')
	{
	echo '<th>Action</th>';
	}
	?>
</tr>
	<?php
	$query = "SELECT * FROM members WHERE members_level='mitarbeiter'";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
	?>
<tr bgcolor="#FFFFFF"><td width="12%">	<?php echo $row['name']?></td>
<td width="12%">	<?php echo $row['tel']?></td>
<td width="13%"><?php echo $row['address'] ?></td>
<td width="1%"><?php echo $row['username'] ?></td>
	<?php
	if ($members_level == 'vorarbeiter' || $members_level == 'firma')
	{
	?>
<td align="center" width="15%">
<a href="<?php echo SITE_URL ?>privat/Mitarbeiter/Bearbeiten/<?php echo $row['userID'];?>">Bearbeiten</a> | 
<a href="javascript:delMitarbeiter('<?php echo $row['userID']?>', '<?php echo $row['username']?>');">Löschen</a>
</td>
	<?php
	}
	?>
</tr>
	<?php
	}
	?>
</table>
<!-- Mitarbeiter Tabele END -->
	<?php
	if(isset($_GET['del_members']))
	{
   $userID = $_GET['del_members'];
   $query = "DELETE FROM members WHERE userID = '$userID'";
   mysql_query($query) or die('Error : ' . mysql_error());
   echo "<br /><br />";
   echo "<p align=center style=color:green; font-size:small; class=box>Mitarbeiter erfolgreich gelöscht...</p>";
   ?>
<meta http-equiv="Refresh" content="2;url=<?php echo SITE_URL; ?>privat/Mitarbeiter" />
	<?php
	}
	?>
	<?php go_back(); ?>
	<?php
	require_once '../admin/includes/functions_js.js';
	?>