<?php
include '../../output.php';

do_html_header('Edit Stunden');
?>



<style type="text/css">
input {
width: auto;
height: auto;
font-size: 12px;
}
select {
width: auto;
height: auto;
font-size: 12px;
}
</style>



<?php
if(isset($_POST['edit']))
{
	$listeID = $_POST['listeID'];	
	$name = $_POST['name'];
	$firma = $_POST['firma'];
	$date = $_POST['date'];
	$jahr = $_POST['jahr'];
	$monat = $_POST['monat'];
	$von = $_POST['von'];
	$bis = $_POST['bis'];
	$pause = $_POST['pause'];
	$regulare_stunden = $_POST['regulare_stunden'];
	$uber_stunden = $_POST['uber_stunden'];
	$username = $_POST['username'];

$qry=mysql_query("UPDATE stundenliste SET listeID='$listeID', name='$name',firma='$firma',date='$date',jahr='$jahr',monat='$monat',von='$von',bis='$bis',pause='$pause',regulare_stunden='$regulare_stunden',uber_stunden='$uber_stunden',username='$username' WHERE listeID='$listeID'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
echo "<br />";
echo "Details changed...";
?>
<meta http-equiv="refresh" content="2;URL='view_liste.php?name=<?php echo $name;?>&monat=<?php echo $monat;?>&jahr=<?php echo $jahr;?>&listeID=false'">
<?php
echo "<br />";
}
}
?>

<?php
if(isset($_GET['listeID']))
{
$listeID=$_GET['listeID'];
$qry=mysql_query("SELECT * FROM stundenliste WHERE listeID=$listeID", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
//listing rows
while(list($listeID, $name, $firma, $date, $jahr, $monat, $von, $bis, $pause, $regulare_stunden, $uber_stunden, $username) = mysql_fetch_array($qry, MYSQL_NUM))
{
?>





<br />
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="listeID" id="listeIDD" value="<?php echo $listeID; ?>" />
<table width="100%" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#999999" class="boxed">
<tr align="" bgcolor="#D22020"> 
<td colspan="11" align="center" height="40"><strong><?php echo $name;?>&nbsp;/ <?php echo $monat;?>&nbsp;/<?php echo $jahr;?></strong></td>
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
<td><strong>Uber Std.</strong></td>
<td><strong>Username</strong></td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="name" id="name" value="<?php echo $name;?>"></p>
</td>
<td width="200" height="30"> 
<select name="firma" id="firma">
<option value="<?php echo $firma; ?>"><?php echo $firma; ?></option>
<?php
$qry2=mysql_query("SELECT * FROM firmen", $con);
if(!$qry2)
{
die("Query Failed: ". mysql_error());
}
while($row2=mysql_fetch_array($qry2))
{
echo "<option value=".$row2['firma_name'].">".$row2['firma_name']."</option>";
}
?>
</select>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="date" id="date" value="<?php echo $date;?>"></p>
</td>
<td width="100" height="30"> 
<input size="8" name="jahr" id="jahr" value="<?php echo $jahr;?>">
</td>
<td width="100" height="30"> 
<input size="8" name="monat" id="monat" value="<?php echo $monat;?>">
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="von" id="von" value="<?php echo $von;?>"></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="bis" id="bis" value="<?php echo $bis;?>"></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="pause" id="pause" value="<?php echo $pause;?>"></a></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="regulare_stunden" id="regulare_stunden" value="<?php echo $regulare_stunden;?>"></a></p>
</td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="uber_stunden" id="uber_stunden" value="<?php echo $uber_stunden;?>"></p>
</td>
<td width="100" height="30"> 
<p style="font-size: x-small;"><input size="10" name="username" id="username" value="<?php echo $username;?>"></p>
</td>
</tr>
<tr> 
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2" align="left"><input name="edit" type="submit" id="edit" value="Update Stunden"></td>
</tr>
</table>
</form>
<?php
}
}
?>




<p align="center"><a href="<?php echo ADM_URL ?>modules/umr_stundenliste/">Back to Liste</a></p>






<?php
do_html_footer();
?>