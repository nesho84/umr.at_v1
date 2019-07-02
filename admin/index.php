<?php 
require_once 'includes/session.php';
require_once '../_library/config.php';
require_once '../_library/dbconnect.php';

$title='NNWEBS - Administration Panel';
require_once 'includes/header.php';
?>

<p style="color: #C69C6D; font-size: 30px; text-align: center;">Welcome Administrator</p>
<p align="center">Choose a menu from the top navigation to get started</p>
<hr width="80%" color="#534C42" />


<?php
$qry=mysqli_query($con, "SELECT * FROM news order by news.id DESC ");
if(!$qry)
{
die("Query Failed: ". mysqli_error());
}
echo '<table border=0 align=center width=400 style=padding-left:0px>';
echo '<tr><td width=200 align=left>';
echo '<p>::News:: </p>';
echo '</td></tr></table>';
while($row=mysqli_fetch_array($qry))
{
echo '<table border=0 align=center cellspacing=5 width=600 style=padding-left:40px>';

echo '<tr><td width=200 align=left>';
?>
<?php echo $row['title'];?><a href="<?php echo ADM_URL ?>modules/news/view.php?id=<?php echo $row['id'];?>">
 read more... </a>
<?php
echo '</td></tr></table>';
}
?> 

<div style="clear: both;">&nbsp;</div>
<?php
require_once 'includes/footer.php';
?>