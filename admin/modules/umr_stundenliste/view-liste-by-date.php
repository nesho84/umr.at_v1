<?php
include '../../output.php';

do_html_header('StundenListe');
?>



<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING Stunden ---------------------------------------
------------------------------------------------------------------------------------------>
<?php
if (isset($_GET['del_stunden']))
{
            $listeID = $_GET['del_stunden'];
			$query = "DELETE FROM stundenliste WHERE listeID = '$listeID'";
			mysql_query($query) or die('Error : ' . mysql_error());
			echo '<br/><br/><br/>';
			echo 'Stunden erfolgreich gelöscht!';
?>
<meta http-equiv="Refresh" content="1;url=<?php echo ADM_URL; ?>modules/umr_stundenliste/" />
<?php
}
?>



<!------------------------------- START Stundenliste Content ----------------------------->
<?php
if(isset($_GET['date']))
{
$date = $_GET['date'];

$query = "SELECT * FROM stundenliste WHERE date='$date' order by date ASC";
$result = mysql_query($query) or die('Error : ' . mysql_error());
$num_rows = mysql_num_rows($result);
if (empty($num_rows)) { echo '<br><br><br>No Records added....'; }
else {
?>
<br />
<table width="90%" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
<tr align="" bgcolor="#D22020"> 
<td colspan="11" align="center" height="40"><strong><?php echo $date;?></strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Name</strong></td>
<td><strong>Firma</strong></td>
<td><strong>Date</strong></td>
<td><strong>Jahr</strong></td>
<td><strong>Monat</strong></td>
<td><strong>Von</strong></td>
<td><strong>Bis</strong></td>
<td><strong>Reg. Std.</strong></td>
<td><strong>Über Std.</strong></td>
<td><strong>User/Editor</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
//listing rows
while(list($listeID, $name, $firma, $date, $jahr, $monat, $von, $bis, $regulare_stunden, $uber_stunden, $username) = mysql_fetch_array($result, MYSQL_NUM))
{
?>
<tr bgcolor="#FFFFFF">
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $name;?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $firma;?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $date;?></p>
</td>
<td width="100" height="30"> 
<?php echo $jahr ?>
</td>
<td width="100" height="30"> 
<?php echo $monat ?>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $von ?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $bis ?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $regulare_stunden;?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $uber_stunden;?></p>
</td>
<td width="100" height="30"> 
<?php echo $username ?>
</td>
<td width="200" align="center">
<a href="<?php echo ADM_URL ?>modules/umr_stundenliste/edit.php?date=<?php echo $date;?>&listeID=<?php echo $listeID;?>">edit</a>
| <a href="view_liste.php?view=<?php echo $name;?>&del_stunden=<?php echo $listeID;?>">delete</a>
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
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Stunden&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='add.php?name=<?php echo $name;?>'">  
</td>
</tr>
</table><!------------------------ END Links Content -------------------------------------->
<?php
}
}
?>



<div style="clear: both;">&nbsp;</div>
<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>