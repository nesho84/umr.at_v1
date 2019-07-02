<?php
include '../../output.php';

do_html_header('Firmen');
?>





<?php
if(isset($_POST['edit']))
{
$firma_id=$_POST['firma_id'];
$firma_name = $_POST['firma_name'];
$platz = $_POST['platz'];

$qry=mysql_query("UPDATE firmen SET firma_name='$firma_name', firma_platz='$platz' WHERE firma_id='$firma_id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
echo "<br />";
echo "Details changed";
echo "<br />";
}
}
?>





<?php
if(isset($_GET['firma_id']))
{
$firma_id=$_GET['firma_id'];
$qry=mysql_query("SELECT * FROM firmen WHERE firma_id=$firma_id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
$row=mysql_fetch_array($qry);
}
?>
<br />
<form method="POST">
<input type="hidden" name="firma_id" id="idd" value="<?php echo $row['firma_id']; ?>" />
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Edit Firmen</strong></td>
</tr>
<tr> 
<td align="right">Firma_Name</td>
<td align="left"><input name="firma_name" type="text" class="box" id="firma_name" value="<?php echo $row['firma_name'];?>" /></td>
</tr>
<tr>
<td align="right">Platz: </td>
<td align="left"><input name="platz" class="box" id="platz" value="<?php echo $row['firma_platz'];?>" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left"><input name="edit" type="submit" class="box" id="update" value="Update"></td>
</tr>
</table>
</form>





<p align="center"><a href="<?php echo ADM_URL ?>modules/firmen/">Back to Firmen</a></p>





<?php
do_html_footer();
?>