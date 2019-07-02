<?php //function for all pages that are loaded in main content
$p = (isset($_GET['p']));

if ( $p == 'unterhaltsreinigung' ) {

include ('../template.php');

topheader('Unterhaltsreinigung');
do_header();
leftpart('Unterhaltsreinigung', 'Leistungen');
?>

<div id="main" class="boxed">

<div  class="title"><h2>Unterhaltsreinigung</h2></div>

		<div class="content">
		
		<div id="content_header">
		<h1>
				<?php
$random_text = array("Perfektion in Qualität<br />",
                    "Flexibilität",
                    "Fairness",
					"Gerechtfertigte Preise",
                    "Schnelligkeit",
					"Verfügbarkeit",
                    "Termingerecht");
srand(time());
$sizeof = count($random_text);
$random = (rand()%$sizeof);
print("$random_text[$random]");
?>
		</h1>
				</div>
			
				<div id="welcome">
<h1>Unterhaltsreinigung</h1>
<div id="dotted">&nbsp;</div>
<p align="justify">Unterhaltsreinigung oder laufende      Reinigung, ist die periodische Reinigung der Oberflächen eines Objektes      oder Raumes und seiner Einrichtungen. Dazu gehört auch Entleeren und      Reinigen von Abfallbehältern und Aschenbecher.<br>
  Bei elastischen Fußbodenbelägen bzw.      bei Hartböden wird nur der auf dem Pflegemittel aufliegende Staub oder      Schmutz durch geeignete Maßnahmen beseitigt.</p>
 <p align="center"><img src="<?php echo SITE_URL ?>leistungen/images/unterhaltsreinigung.jpg" width="440" height="179" alt=""></p>				
				</div>
	
	<?php       
		display_form('Fragen Sie uns unverbindlich an bezüglich Unterhaltsreinigung über dieses Formular.');
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