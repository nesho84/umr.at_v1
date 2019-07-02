<?php
include '../../output.php';

do_html_header('Insert Stunden');
?>


<style type="text/css">
input {
width: 100%;
height: 100px;
font-size: 40px;
}
select {
width: 100%;
height: 100px;
font-size:40px;
}

table {
width: 100%;
}

td {
width: 20%;
text-align: left;
font-size:40px;
}
</style>


<?php
if(isset($_POST['insert']))
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

   
   // add the article in the database	
   $query = "INSERT INTO stundenliste (date, name, firma, jahr, monat, von, bis, pause, regulare_stunden, uber_stunden, username) 
	VALUES ('$date', '$name', '$firma', '$jahr', '$monat', '$von', '$bis', '$pause', '$regulare_stunden', '$uber_stunden', '$username')";
	   mysql_query($query) or die('Error : ' . mysql_error());

	echo "<br />";
	echo "Stunden <b>'$date'</b> added Successfully";
	echo "<br />";
}
?>





<br />
<?php
if(isset($_GET['name']))
{
$name = $_GET['name'];
}
?>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<input type="hidden" name="listeID" id="listeIDD" value="<?php echo $listeID; ?>" />
<table widht="100%" border="0" align="center" cellpadding="6" cellspacing="4" bgcolor="#999999" class="boxed">
<tr align="" bgcolor="#D22020"> 
<td colspan="2" style="text-align: center;" height="40"><strong>Insert Stunden</strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Name</strong></td><td width="400" height="30"> 
<p style="font-size: x-small;"><input size="10" name="name" id="name" value="<?php echo $name;?>"></p></td></tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Firma</strong></td>
<td width="200" height="30"> 
<select name="firma" id="firma">
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
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Date</strong></td>
<td width="200" height="30"> 
<p style="font-size: x-small;"><input size="10" name="date" id="date" value="<?php echo date("Y-m-d");?>"></p>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Jahr</strong></td>
<td width="100" height="30"> 
<?php
$cyear = date('Y');
$qry=mysql_query("SELECT * FROM jahr", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
?>
<select name="jahr" id="jahr">
<?php
echo "<option value='".$cyear."'>".$cyear."</option>";
while($row=mysql_fetch_array($qry))
{
echo "<option value='".$row['jahr']."'>".$row['jahr']."</option>";
}
?>
</select>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Monat</strong></td>
<?php
//Geting the current Monat
date_default_timezone_set('Europe/Berlin'); 
// Set the gloabal LC_TIME constant to german
setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
$listmonat = strftime('%B');
?>
<td width="100" height="30"> 
<?php
$qry=mysql_query("SELECT * FROM monat", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
?>
<select name="monat" id="monat">
<?php
echo "<option value='".$listmonat."'>".$listmonat."</option>";
while($row=mysql_fetch_array($qry))
{
echo "<option value='".$row['monat']."'>".$row['monat']."</option>";
}
?>
</select>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Von</strong></td>
<td width="200"> 
<p style="font-size: x-small;"><input size="10" name="von" id="von" value="06:00"></p>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Bis</strong></td>
<td width="200"> 
<p style="font-size: x-small;"><input size="10" name="bis" id="bis" value="00:00"></p>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Pause</strong></td>
<td width="200"> 
<p style="font-size: x-small;"><input size="10" name="pause" id="pause" value=""></a></p>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Reg. Std.</strong></td>
<td width="200"> 
<p style="font-size: x-small;"><input size="10" name="regulare_stunden" id="regulare_stunden" value=""></a></p>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Uber Std.</strong></td>
<td width="200"> 
<p style="font-size: x-small;"><input size="10" name="uber_stunden" id="uber_stunden" value=""></p>
</td>
</tr>
<tr align="center" bgcolor="#CCCCCC"><td><strong>Username</strong></td>
<td width="100"> 
<input size="10" name="username" id="username" value="">
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td colspan="2" height="80" style="text-align: center;"><input style="height: 100px; font-size:20px; font-weight:bold;" name="insert" type="submit" id="insert" value="&nbsp;&nbsp;&nbsp;&nbsp;INSERT&nbsp;&nbsp;&nbsp;&nbsp;" /></td>
</tr>
</table>
</form>




<p align="center"><a href="<?php echo ADM_URL ?>modules/umr_stundenliste/">Back to Liste Auswahl</a></p>