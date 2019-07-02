<style type="text/css">
table { font: 11px/24px Verdana, Arial, Helvetica, sans-serif; }
tr { backgound: #cccccc; }
th { padding:2px; }
td { padding-left: 0px; backgound-color: #ccccff; }
</style>
<table width="100%" border="0" align="" cellpadding="1" cellspacing="1" class="boxed">
<tr>
<td height="40" align=""><h2><strong>News<div id="hrblue"></div></strong></h2></td>
</tr>
</table>
	<?php
	$query = "SELECT id, title, image, content, link, date FROM news ORDER BY date DESC";
	$result = mysql_query($query) or die('Error : ' . mysql_error());
	while(list($id, $title, $img, $content, $link, $date) = mysql_fetch_array($result, MYSQL_NUM))
	{
	?>
<table border="0" cellspacing="0" cellpadding="3" width="100%">
<tr>
	<?php
	if ($img)
	{
	?>
<td width="128" valign="top"><img src="<?php echo SITE_URL ?>uploads/<?php echo $img;?>" width="120px" height="100px" style="padding-top:3px;" /></td>
	<?php
	}
	?>
<td valign="top"><h2><?php echo $title; ?></h2><p><?php echo $content; ?><br /><a href="<?php echo $link;?>"><?php echo $link; ?></a></p></td>
</tr>
<tr>
<td colspan="2" align="right" style="border-bottom: 1px solid #ccccff;" valign="top"><br /><p style="font-size: x-small; margin-top:-25px;"><b>Veröffentlicht am</b> <?php echo $date; ?></p></td>
</tr>
<br />
</table>
	<?php
	}
	?>
	<?php go_back(); ?>