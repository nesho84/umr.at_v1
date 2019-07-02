<?php //function for all pages that are loaded in main content

if ( isset($_GET['p']) ) {
   $p = $_GET['p'];
   
   /* 			main 			*/
include(''.$p.'.php');

}
 
else {

include ('../template.php');

topheader('Referenzen');
do_header();
leftpart('Referenzen', '');
?>
<div id="main" class="boxed">

			<div class="title"><h2>Referenzen</h2></div>
			
	<div class="content">
	
	<div id="welcome">
	<h2>Referenzen</h2>
	<div id="dotted">&nbsp;</div>
<ul>
<p style="margin-left: -20px">
<em>
Unsere Kunden und Mitarbeiter sind unser Kapital. Auf Anfrage lassen wir Ihnen gerne eine auf Ihren Anwendungsfall zugeschnittene Referenzliste zukommen.
</em></p>
</u>
	</div>
	
	

	</div><!-- end .content -->
	
	</div><!-- end #main -->


<?php
rightpart();
footer();

} //END! function for all pages that are loaded in main content
?>