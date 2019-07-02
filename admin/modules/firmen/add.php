<?php
include '../../output.php';

do_html_header('Firmen');
?>





<?php
if(isset($_POST['add']))
{
   $firma_name = $_POST['firma_name'];
   $platz = $_POST['platz'];
   
   // add the user in the database
	$query = "INSERT INTO firmen (firma_name, firma_platz) 
    VALUES ('$firma_name', '$platz')";
	if (mysql_query($query))
	{
	?> 
	<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />Firma <?php echo "<b>".$firma_name."</b>"; ?> added Successfully</p>
	<br />
	<?php
	}
	else
	{
	die('Error : ' . mysql_error() . '<br /><a href=/umr/admin/modules/umr_members/add.php><< go back</a>');
	}
}
?>





<br />
<form method="POST" id="add">
<table id="main2" align="center" width="960px" border="0" cellpadding="5" cellspacing="1" class="box">
<tr bgcolor="#D22020"> 
<td colspan="3"><strong>Insert Firmen</strong></td>
</tr>
<tr> 
<td align="right" width="430">Firma Name: </td>
<td colspan="2" align="left"><input name="firma_name" type="text" class="box" id="firma_name" /></td>
</tr>
<tr> 
<td align="right" width="430">Platz: </td>
<td  align="left"><input name="platz" class="box" id="platz" /></td>
</tr>
<tr>
<td>&nbsp;</td> 
<td colspan="2" align="left"><input name="add" type="submit" class="box" id="add" value="Insert"></td>
</tr>
</table>
<p align="center"><a href="<?php echo ADM_URL ?>modules/firmen/">Back to Firmen</a></p>
</form>





<?php
do_html_footer();
?>