<?php //function for all pages that are loaded in main content
$p = (isset($_GET['p']));

if ( $p == 'fassadenreinigung' ) {

include ('../template.php');

topheader('Fassadenreinigung');
do_header();
leftpart('Fassadenreinigung', 'Leistungen');
?>

<div id="main" class="boxed">

			<div class="title"><h2>Fassadenreinigung</h2></div>
			
	<div class="content">
	
	<div id="welcome">
	
	<h1>Fassadenreinigung</h1>
	
	<div id="dotted">&nbsp;</div>

	
<p><img src="<?php echo SITE_URL ?>leistungen/images/aluminiumfassade.jpg" width="440" height="257"></p>
<p><strong>Denkmalreinigung, Reinigung  denkmalgeschützter Gebäude</strong></p>
<p>Ursachen für die Verschmutzungen von Metallfassaden:</p>
<ul type="disc">
  <li><strong>Industrieabgase</strong></li>
  <li><strong>Autoabgase </strong></li>
  <li><strong>Kaminruß</strong></li>
  <li><strong>Regen und Schnee</strong></li>
  <li><strong>Hoch gewirbelter Straßenstaub</strong></li>
  <li><strong>Abbau der Schutzschicht durch UV-Strahlung ( besonders bei lakierten       Fassadeneilen )</strong></li>
</ul>
<p><strong><img src="<?php echo SITE_URL ?>leistungen/images/steinfassade.jpg" width="440" height="388"></strong></p>
	
	</div>
	
<?php 
display_form('Fragen Sie uns unverbindlich an bezüglich Fassadenreinigung über dieses Formular.');
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