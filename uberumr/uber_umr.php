<?php
include ('../template.php');

topheader('Umr');
do_header();
leftpart('','');
?>

<div id="main" class="boxed">
<div class="title"><h2>Über uns</h2></div>
<div class="content">

<?php
//function for all pages that are loaded in main content
if ( isset($_GET['page']) ) {
   $page = $_GET['page'];
   
   /* 			main 			*/
require(''.$page.'.php');
/* 	in css name=sidebar 	*/
} 
else {
?>	
			<p align="center" style="margin-bottom:-10px;"><img src="<?php echo IMAGE_DIR ?>logo/logo-leer.png" width="170px" height="131px" /></p>
			<div id="welcome">
				<p style="font-size: 11px; text-align: justify;">
				Die Firma UMR wurde 2010 als Einzelunternehmen gegründet. Trotz des wirtschaftlich schwierigen Umfeldes wurden durch die gelebte Kundenpartnerschaft und die angelegten Qualitätsstandards stetig neue Aufträge lukriert. Dies hat dazu geführt, dass das Einzelunternehmen im Jahr 2012 in die UMR GmbH umgewandelt wurde, um dem stetigen Wachstum gerecht zu werden.<br /><br />
Seit diesem Zeitpunkt betreut die UMR GmbH ihre Kunden mit einem schlagkräftigen und motivierten Team rund um die Uhr. Um unsere Mission – höchste Kundenzufriedenheit – zu erfüllen bleiben wir unseren Prinzipien Service, Schnelligkeit, Sauberkeit, aber vor allem Handschlagqualität stets treu und sind stolz darauf dass namhafte österreichische Unternehmen bei der Reinigung ihrer Objekte auf unsere Erfahrung vertrauen.<br /><br />
				</p>
				<h2>Unsere Mission:</h2><br />
				<p style="font-size: 11px; text-align: justify;">
<strong>Kundenpartnerschaft:</strong><br /> Zuhören, Lernen, Umsetzen. Finden maßgeschneiderter Lösungen mit und für den Kunden. Durch Individuelle Reinigungslösungen schaffen wir einen spürbaren Mehrwert. Innerhalb von 48 Stunden können wir flexibel – je nach Kundenbedarf – pro Auftrag rund 50 Mitarbeiter – speziell ausgewählt – Zeit und Ort gerecht ohne laufende Fixkosten für den Kunden in Einsatz bringen. <br />Gerne stehen wir Ihnen für ein kostenloses und unverbindliches Angebot zu Verfügung – kontaktieren Sie uns. 
<br /><br /><strong>Mitarbeiterpartnerschaft:</strong>  <br />Der Mensch steht im Mittelpunkt – unsere Mitarbeiter sind unser Kapital. Der ganzheitliche Managementansatz <a href="http://de.wikipedia.org/wiki/Corporate_Social_Responsibility">CSR</a>, der die Verantwortung von Unternehmen gegenüber der Umwelt und der Gesellschaft – weit über den rechtlich vorgeschriebenen Rahmen hinaus – beschreibt, ist unsere Leitlinie. Wir haben uns zum Ziel gesetzt beliebtester Arbeitgeber im Reinigungsbereich zu sein.<br /><br /><br />
				</p>
			</div>
						


<?php
} //END! function for all pages that are loaded in main content
?>
</div><!-- end .content -->
</div><!-- end #main -->
<?php
rightpart();
footer();
?>