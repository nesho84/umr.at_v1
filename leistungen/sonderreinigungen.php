<?php //function for all pages that are loaded in main content
$p = (isset($_GET['p']));

if ( $p == 'Sonderreinigungen' ) {

include ('../template.php');

topheader('Sonderreinigungen');
do_header();
leftpart('Sonderreinigungen', 'Leistungen');
?>

<div id="main" class="boxed">

			<div class="title"><h2>Sonderreinigungen</h2></div>
			
	<div class="content">
	
		<div id="welcome">
<h1>Sonderreinigungen</h1>
<div id="dotted">&nbsp;</div>

<p align="justify">
Spezialreinigung nötig? Haben sie verschmutzungen besonderer art. wollen sie einen bodenbelag ölen, versiegeln, etc. Ist spezieller einsatz nötig? Wir sind die richtigen dafür.
</p>
  
 <p align="center"><img src="<?php echo SITE_URL ?>leistungen/images/sonderreinigung.jpg" width="440" height="179" alt=""></p>				
				</div>
	
			<?php 
				display_form('Fragen Sie uns unverbindlich an bezüglich Sonderreinigungen über dieses Formular.');
				?>
				
	</div><!-- end .content -->
	
	</div><!-- end #main -->
<?php
rightpart();
footer();

}
else {
header("Location: http://localhost/UMR/_library/error404.php");
exit;
} //END! function for all pages that are loaded in main content
?>