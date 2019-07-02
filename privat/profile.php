<style type="text/css">
img { width: 80px; height: 80px; }
table { font: 11px/24px Verdana, Arial, Helvetica, sans-serif; }
tr { backgound: #cccccc; } 
th { padding:2px; text-align: right; width: 46%; border: 2px solid #fff; height: 30px; }
td { padding-left: 0px; backgound-color: #ccccff; border: 2px solid #fff; height: 30px; }
span { color: red; font-size: 12px; margin-bottom: 5px; }
</style>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="boxed">
<tr><td height="40" align="" style="border: 0px;"><h2><strong>Profile<div id="hrblue"></div></strong></h2></td></tr>
</table>
<table width="100%" border="0" cellpadding="10" cellspacing="10" class="boxed" style="border: 2px dotted #cccff;">
	<?php
	$qry = mysql_query("SELECT * FROM members where username='$username' LIMIT 0, 30 ", $con);
	if(!$qry) { die("Query Failed: ". mysql_error()); }
	while($row=mysql_fetch_array($qry))
	{
	?>
<tr>
<td align="center" style="padding: 15px;"><img src="<?php echo IMAGE_DIR;?>/kein-bild.gif" /><br />Personal Bild kommt bald...</td>
<td align="center" style="padding: 15px;"><a href="<?php echo SITE_URL ?>privat/Profile/Bearbeiten/<?php echo $row['userID'];?>"><img src="<?php echo IMAGE_DIR;?>/edit.gif" /><br />Profile Bearbeiten</a></td>
</tr>
<tr><th>Username:</th><td><?php echo $row['username'];?></td></tr>
<tr><th>Name:</th><td><?php echo $row['name'];?></td></tr>
<tr><th>E-mail:</th><td><?php echo $row['email'];?></td></tr>
<tr><th>Telefon:</th><td><?php echo $row['tel'];?></td></tr>
<tr><th>Addresse:</th><td><?php echo $row['address'];?></td></tr>
	<?php
	}
	?>
</table>
	<?php go_back(); ?>