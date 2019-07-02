<?php
include('template.php');

topheader('Willkommen');
do_header();
leftpart('','');
?>

<div id="main" class="boxed">

<div class="title"><h2>Herzlich willkommen auf unserer Website</h2></div>

		<div class="content">
		
				<!-- <div id="content_header">
		<h1>
				<?php
$random_text = array("Perfektion in Qualität",
                    "Flexibilität",
                    "Fairness",
					"Gerechtfertigte Preise",
					"Schnelligkeit in der Bewegung",
                    "Schnelligkeit",
					"Verfügbarkeit",
                    "Termingerecht");
srand(time());
$sizeof = count($random_text);
$random = (rand()%$sizeof);
print("$random_text[$random]");
?>
		</h1>
				</div> -->
			
			
			<div id="welcome">
		<p align="justify"><img src="<?php echo SITE_URL ?>_images/home.jpg" alt="" width="120" height="120" class="left">
			Die <strong style="color:#00a59c">UMR GmbH - </strong> 
			 ist ein junges, aufstrebendes und dynamisches Unternehmen. Unser Ziel ist Sauberkeit und Qualität zu einem fairen Preis. Die Zufriedenheit unserer Kunden treibt uns an und bestätigt uns täglich in unserer Arbeit.</p>
		<br>
		</div>
	
	<!--<div id="welcome">
	<?php

	// The two lines below are all that is required to add a poll 
	// to your page.  Obviously, these need to be placed within  
	// a PHP code block inside a valid PHP page.  You will also need to 
	// configure the settings in config.php properly, where you will 
	// also define your polls.
	//  
	// Modify these lines as follows: 
	//
	// * Change the include path to reflect where DRBPoll is installed.  
	// * Change the parameter for show_vote_control() to reflect the unique  
	//   ID for the poll on this page.  This feature allows you to store  
	//   data for more than one poll using the same installation of DRBPoll.
	//   New polls must be added to the $VALID_POLLS array in config.php. 
	
	require_once('poll/poll.php');
	show_vote_control('1');
?> 
	</div> -->

<table width="440px" border="0" style="text-align: left; font-size: 12px">
 <tr>
    <th colspan="2"><h2>Unsere Mission</h2><br></th>
  </tr>
  <tr>
    <th scope="row"><img src="<?php echo IMAGE_DIR?>reinigung/mision1.png" width="123" height="105" alt=""></th>
    <td style="padding-left: 8px;" valign="top">
      Wir betrachten Reinigung als eine essentielle Leistung  und Dienst für das Leben.
    </td>
  </tr>
  <tr>
    <th scope="row"><img src="<?php echo IMAGE_DIR?>reinigung/mision2.png" width="123" height="105" alt=""></th>
    <td style="padding-left: 8px;" valign="top">
      Wir leben den Gedanken der Kundenzufriedenheit durch Flexibilität und Qualität zum fairen Preis.
    </td>
  </tr>
  <tr>
    <th scope="row"><img src="<?php echo IMAGE_DIR?>reinigung/mision3.png" width="123" height="105" alt=""></th>
    <td style="padding-left: 8px;" valign="top">
      Nachhaltiges Arbeiten für Gesundheit und Wohlbefinden durch verantwortungsvollen Umgang mit Ressourcen.
    </td>
  </tr>
</table>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br />

</div><!--end .content -->				
			</div><!-- end #main -->

<?php
rightpart();
footer();
?>




