<?php
include '../../output.php';

do_html_header('Firmen');
?>





<?php
if(isset($_GET['del_f']))
{
   $firma_id = $_GET['del_f'];
   $query = "DELETE FROM firmen WHERE firma_id = '$firma_id'";
   mysql_query($query) or die('Error : ' . mysql_error());
?>
<p><img src="<?php echo ADM_URL ?>images/sucess.png" width="40" height="25" />FirmaID: <b><?php echo $firma_id;?></b> deleted Successfully</p>
<?php
}
?>





<br />
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#999999" class="boxed">
<?php
$query = "SELECT firma_id, firma_name, firma_platz FROM firmen ORDER BY firma_id";
$result = mysqli_query($con, $query) or die('Error : ' . mysqli_error($con));
?>
<tr align="" bgcolor="#D22020"> 
<td colspan="9" align="center" height="40"><strong>UMR Firmen</strong></td>
</tr>
<tr align="center" bgcolor="#CCCCCC">
<td><strong>Firma_ID</strong></td>
<td><strong>Name</strong></td>  
<td><strong>Platz</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php
while(list($firma_id, $firma_name, $firma_platz) = mysql_fetch_array($result, MYSQL_NUM))
{
?>
<tr bgcolor="#FFFFFF">
<td height="30"> 
<?php echo $firma_id ?>
</td>
<td height="30"> 
<?php echo $firma_name ?>
</td>
<td height="30"> 
<?php echo $firma_platz ?>
</td>
<td width="200" align="center">
<a href="<?php echo ADM_URL ?>modules/firmen/edit.php?firma_id=<?php echo $firma_id;?>">edit </a>|
<a href="javascript:delFirmen('<?php echo $firma_id;?>', '<?php echo $firma_name;?>');">delete</a>
</td>
</tr>
<?php
}
?>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">
<input name="btnAdd" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Firmen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.location.href='<?php echo ADM_URL ?>modules/firmen/add.php';">  
</td>
</tr>
</table>





<?php
require_once '../../includes/functions_js.js';

do_html_footer();
?>