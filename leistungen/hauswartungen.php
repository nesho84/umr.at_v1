<?php //function for all pages that are loaded in main content
$p = (isset($_GET['p']));

if ( $p == 'hauswartungen' ) {

include ('../template.php');

topheader('Hauswartungen');
do_header();
leftpart('Hauswartungen', 'Leistungen');
?>

<div id="main" class="boxed">

			<div class="title"><h2>Hauswartungen</h2></div>
			
	<div class="content">
	
	<div id="welcome">
<h1>Hauswartungen</h1>
<div id="dotted">&nbsp;</div>
<p align="justify">
Die professionelle hauswartung!
Unsere hausmeister übernehmen alle praktischen arbeiten, kontrollfunktionen und das berichtwesen. Zu den handwerklichen aufgaben eines hausmeisters gehören einfache tätigkeiten wie z.b. reparaturen an türschlössern und wasserhähnen sowie der austausch von leuchtröhren. Von zugeschnittenen hauswartungen bis komplette liegenschftsbetreuung. Unsere hauswartsfirma kümmert sich um ihre liegenschaft.
</p>
 <p align="center"><img src="<?php echo SITE_URL ?>leistungen/images/hauswartung.jpg" width="440" height="179" alt=""></p>				
	</div>
	
	<?php       
		display_form('Fragen Sie uns unverbindlich an bezüglich <b>Hauswartungen</b> über dieses Formular.');
	?>
				
	</div><!-- end .content -->
	
	</div><!-- end #main -->

<?php
rightpart();
footer();

}
else {
header("Location: http://umr-reinigung.com/_library/error404.php");
exit;
} //END! function for all pages that are loaded in main content
?>