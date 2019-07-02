<?php
include '../../output.php';

do_html_header('StundenListe');
?>



<style type="text/css">
input {
width: 500px;
height: 50px;
font-size: 40px;
}
select {
width: 500px;
height: 50px;
font-size: 45px;
vertical-align: middle;
}
td {
font-size: 30px;
text-align: right;
}
</style>




<!-- Selecting user, month to display 'Stundenliste' -->
<br /><br /><br />
<hr width="80%" color="#534C42" style="margin-top: -15px;" />
<?php
$qry=mysqli_query($con, "SELECT * FROM members");
if(!$qry)
{
die("Query Failed: ". mysqli_error($con));
}
?>
<form method="get" enctype="multipart/form-data" action="view_liste.php">
<table align="center" border="0" cellpadding="10" cellspacing="10">
<tr> 
<td align="left">Name: </td>  
<td align="left">
<select name="name" id="name">
<?php
while($row=mysql_fetch_array($qry))
{
echo "<option value='".$row['name']."'>".$row['name']."</option>";
}
?>
</select>
</td>
</tr> 
<tr> 
<td align="left">Monat: </td> 
<td align="left">
<?php
//Geting the current Monat
date_default_timezone_set('Europe/Berlin'); 
// Set the gloabal LC_TIME constant to german
setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
$listmonat = strftime('%B');

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
<tr> 
<td align="left">Jahr: </td>  
<td align="left">
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
<!-- //post a false hidden listeID // -->
<input size="8" type="hidden" name="listeID" id="listeID" value="false">
</td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="&nbsp;&nbsp;VIEW&nbsp;&nbsp;" /></td>
</tr>
</table>
</form>
<br /><br />
<hr width="80%" color="#534C42" style="margin-top: -15px;" />
<br /><br />
<span style="font-size: 30px; border: 1px solid #fff;  padding: 10px;" align="center">
<a href="<?php echo ADM_URL ?>modules/umr_stundenliste/view-liste-by-date.php?date=<?php echo date("Y-m-d");?>" style="color: #fff;"><b>View Last Inputs </b>(Today: <?php echo date("Y-m-d");?>)</a>
</span>
<!-- Suchen auf Stunden END -->




<?php
do_html_footer();
?>