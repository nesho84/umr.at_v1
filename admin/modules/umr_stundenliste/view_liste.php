<?php
include '../../output.php';

do_html_header('StundenListe');
?>


<style type="text/css">
input {
width: 100%;
height: 100px;
font-size: 20px;
}
select {
width: 100%;
height: 100px;
font-size:20px;
}

table {
width: 100%;
}

td {
width: 20%;
font-weight: bold;
font-size:20px;
}
</style>


<!-----------------------------------------------------------------------------------------
--------------------------------- DELETING Stunden ---------------------------------------
------------------------------------------------------------------------------------------>
<?php
if ($_GET['listeID'] == 'false')
{
echo '&nbsp;';
}
else
{
			$listeID = ($_GET['listeID']);
			$query = "DELETE FROM stundenliste WHERE listeID = '$listeID'";
			mysql_query($query) or die('Error : ' . mysql_error());
			echo '<br />';
			echo '<b>Stunden Deleted...</b>';
			//header("Location: view_liste.php?name=".$name." &monat=".$monat."&jahr=".$jahr."&listeID=false");
			echo '<br />';
}
?>




<!------------------------------- START Stundenliste Content ----------------------------->
<?php
$name = $_GET['name'];
$monat = $_GET['monat'];
$jahr = $_GET['jahr'];

$query = "SELECT * FROM stundenliste WHERE name='$name' AND monat='$monat' order by date,firma ASC";
$result = mysql_query($query) or die('Error : ' . mysql_error());
?>
<br />
<table border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
<tr align="" bgcolor="#D22020"> 
<td colspan="11" align="center"><strong><?php echo $name;?>&nbsp;/ <?php echo $monat;?>&nbsp;/ <?php echo $jahr;?></strong></td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Stunden&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='add.php?name=<?php echo $name;?>'">  
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Name</strong></td>
<td><strong>Firma</strong></td>
<td><strong>Date</strong></td>
<td><strong>Jahr</strong></td>
<td><strong>Monat</strong></td>
<td><strong>Von</strong></td>
<td><strong>Bis</strong></td>
<td><strong>Pause</strong></td>
<td><strong>Reg. Std.</strong></td>
<td><strong>Über Std.</strong></td>
<td><strong>Username</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
//listing rows
while(list($listeID, $name, $firma, $date, $jahr, $monat, $von, $bis, $pause, $regulare_stunden, $uber_stunden, $username) = mysql_fetch_array($result, MYSQL_NUM))
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
<p style="font-size: x-small;"><?php echo $pause ?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $regulare_stunden;?></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><?php echo $uber_stunden;?></p>
</td>
<td width="100" height="30"> 
<p style="font-size: x-small;"><?php echo $username ?></p>
</td>
<td width="200" align="center">
<a href="<?php echo ADM_URL ?>modules/umr_stundenliste/edit.php?name=<?php echo $name;?>&monat=<?php echo $monat;?>&jahr=<?php echo $jahr;?>&listeID=<?php echo $listeID;?>">edit</a>
| <a href="view_liste.php?name=<?php echo $name;?>&monat=<?php echo $monat;?>&jahr=<?php echo $jahr;?>&listeID=<?php echo $listeID;?>">delete</a>
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
<td align="center" class="box">
<?php //calculating 'stunden'
$name = $_GET['name'];
$monat = $_GET['monat'];
$jahr = $_GET['jahr'];
$qry = "SELECT name, monat, SUM(regulare_stunden) FROM stundenliste WHERE name='$name' AND monat='$monat' ";
$result = mysql_query($qry) or die(mysql_error());
while($row = mysql_fetch_array($result)){
	echo "Reg.Std. <br /><b>(" . $row['SUM(regulare_stunden)'] . ")</b>";
}
?>
</td>
<td align="center" class="box">
<?php
$qry = "SELECT name, monat, SUM(uber_stunden) FROM stundenliste WHERE name='$name' AND monat='$monat' ";
$result = mysql_query($qry) or die(mysql_error());
while($row = mysql_fetch_array($result)){
echo "Uber Std. <br /><b>(" . $row['SUM(uber_stunden)'] . ")</b>";
}
?>
</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Stunden&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='add.php?name=<?php echo $name;?>'">  
</td>
</tr>
</table><!------------------------ END Links Content -------------------------------------->





<br /><p align="center"><a href="index.php">[Zur&#252;ck]</a></a>


<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>