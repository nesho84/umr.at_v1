<?php //function for all pages that are loaded in main content
$p = (isset($_GET['p']));

if ( $p == 'fensterreinigung' ) {

include ('../template.php');

topheader('Fensterreinigung');
do_header();
leftpart('Fensterreinigung', 'Leistungen');
?>

<div id="main" class="boxed">

			<div class="title"><h2>Fensterreinigung</h2></div>
			
	<div class="content">
	
<div id="welcome">

<h1>Fensterreinigung</h1>
<div id="dotted">&nbsp;</div>

<p align="center"><img src="<?php echo SITE_URL ?>leistungen/images/fensterreinigung.jpg" width="440" height="179" alt=""></p>

<p align="justify">
Eine professionelle fensterreinigung erfordert nicht nur handwerkliches können, sondern auch besonderes geschick. unsere fachkräfte bieten ihnen die reinigung von glas- und fensterkonstruktionen, leuchtschriften, beleuchtungsanlagen und industrieverglasungen an.
</p> 
 
</div>
	
			<?php 
				display_form('Fragen Sie uns unverbindlich an bezüglich Fensterreinigung über dieses Formular.');
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