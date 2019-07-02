<?php
include '../../output.php';

do_html_header('View News');
?>





<div id="main"><div id="main2">
<?php
$id = $_GET['id'];

$query = "SELECT id, title, content, date FROM news where id= '$id'";
$result = mysql_query($query) or die('Error : ' . mysql_error());
?>





<br />
<?php
while(list($id, $title, $content, $date) = mysql_fetch_array($result, MYSQL_NUM))
{
?>
<table id="main2" align="center" width="900px" border="1" cellpadding="5" cellspacing="0">
<tr bgcolor="#CCCCFF">
<td><b>Title:</b></td><td><b>Content:</b></td><td><b>Date:</b></td>
</tr>
<tr>
<td width="300"><?php echo $title;?></td>
<td width="400"><?php echo $content;?></td>
<td width="200"><?php echo $date;?></td>
</tr>
</table>
<?php
}
?>
</table>





<p align="center"><?php echo '<a href="javascript:window.close();">CLOSE WINDOW</a>'; ?> </p>
</div></div>





<?php
do_html_footer();
?>