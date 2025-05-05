<?php
include('../template.php');

topheader('Leistungen');
do_header();
leftpart('Leistungen', 'Leistungen');
?>

<div id="main" class="boxed">

	<div class="title">
		<h2>Leistungen</h2>
	</div>

	<div class="content">

		<div id="welcome">
			<h3>Die UMR GmbH steht Ihnen mit folgenden Leistungen helfend zur Seite:</h3>
		</div>

		<table cellspacing="10" border="0" style="margin-bottom: 150px;">
			<tr>
				<td valign="top"><img src="<?php echo IMAGE_URL ?>/reinigung/leistungen.png" width="150" height="800" /></td>

				<td valign="top" style="line-height:45px; margin-top:-15px;">
					&#8226; Unterhaltsreinigung<br />
					&#8226; Baureinigung<br />
					&#8226; Umzugsreinigung<br />
					&#8226; Fensterreinigung<br />
					&#8226; Broreinigung<br />
					&#8226; Fassadenreinigung<br />
					&#8226; Wohnungsreinigung<br />
					&#8226; Teppichreinigung<br />
					&#8226; Hotelreinigung<br />
					&#8226; Garagenreinigung<br />
					&#8226; Küchenreinigung<br />
					&#8226; Schulreinigung<br />
					&#8226; Hausbetreuung<br />
					&#8226; Grünflächenbetreuung<br />
					&#8226; Winterdienst<br />
					&#8226; Grafittientfernung<br />
					&#8226; Schmutzfangmattenservice<br />
					&#8226; Aufzugbetreibskontrollen<br />
				</td>
			</tr>
		</table>

	</div><!-- end .content -->

</div><!-- end #main -->


<?php
rightpart();
footer();
?>