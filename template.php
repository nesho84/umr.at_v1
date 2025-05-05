<?php
include('_library/config.php');
require_once __DIR__ . '/_library/config.php';


function topheader($title)
{
?>
	<!DOCTYPE html>
	<html lang="de">

	<head>
		<meta charset="UTF-8">
		<!--Mobile devices-->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo $title; ?></title>

		<meta name="description" content="UMR Personal Management und Reinigungstechnik">
		<meta name="keywords" content="Personal Management, Reinigung, Objektreinigeung, Unterhaltsreinigung, Hauswartungen, Umzugsreinigung, Baureinigung, Fensterreinigung, Fassadenreinigung, Büroreinigung, Teppichreinigung, Sonderreinigung">
		<meta name="robots" content="index, follow" />
		<link rel="shortcut icon" href="http://umr.at/_images/logo/umr-icon-nn.ico">
		<link href="<?php echo SITE_URL ?>/_css/default.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/_css/print.css" media="print">
		<link href="<?php echo SITE_URL ?>/poll/template/styles.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div id="header">
			<span><a href="<?php echo SITE_URL ?>/home/" style="text-decoration: none;">
					<div id="logo">
						<!--<p style="padding-left: 135px; padding-top: 22px; font-size: 20px; font-weight: bold;">GmbH</p>-->
					</div>
				</a>
			</span>

			<div id="menu">
				<ul>
					<li><a <?php if ($title == 'Willkommen') { ?>class="current" <?php } ?> href="<?php echo SITE_URL ?>/home/" title="">Willkommen</a></li>
					<li><a <?php if ($title == 'Starteseite') { ?>class="current" <?php } ?> href="<?php echo SITE_URL ?>/" title="">Startseite</a></li>
					<li><a <?php if ($title == 'Umr') { ?>class="current" <?php } ?> href="<?php echo SITE_URL ?>/uberumr/">&Uuml;ber uns</a></li>
					<!--<li><a <?php if ($title == 'Buchen') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>/buchen/">Online Buchen</a></li>-->
					<li><a <?php if ($title == 'Leistungen') { ?>class="current" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/">Leistungen</a></li>
					<li><a <?php if ($title == 'Jobs') { ?>class="current" <?php } ?> href="<?php echo SITE_URL ?>/jobs/">Jobs</a></li>
					<li><a <?php if ($title == 'Kontakt') { ?>class="current" <?php } ?> href="<?php echo SITE_URL ?>/kontakt/">Kontakt</a></li>
				</ul>
			</div>
		</div>

	<?php
} // end topheader function


function do_header()
{
	?>
		<div id="header2">
			<!--Javascript Image Gallery Slider-->
			<ul class="ppt">
				<li>
					<img src="<?php echo IMAGE_URL ?>/header/top-pic-2.jpg" width="944px" height="150px" alt="">
					<!--<img src="<?php echo IMAGE_URL ?>/header/umrfoto-banner1.png" width="944px" height="150px" alt="">-->
				<li>
					<a href="#">
						<img src="<?php echo IMAGE_URL ?>/header/foto10.jpg" width="944px" height="150px" alt="">
					</a>
				</li>
				<li>
					<img src="<?php echo IMAGE_URL ?>/header/Office_Cleaning.png" width="313px" height="150px" alt="">
					<img src="<?php echo IMAGE_URL ?>/header/stockphoto.jpg" width="310px" height="150px" alt="">
					<img src="<?php echo IMAGE_URL ?>/header/officecleaning-services.jpg" width="313px" height="150px" alt="">
				</li>
				<li>
					<img src="<?php echo IMAGE_URL ?>/header/top-pic-2.jpg" width="944px" height="150px" alt="">
				</li>
				<li>
					<img src="<?php echo IMAGE_URL ?>/header/header77.jpg" width="944px" height="150px" alt="">
				</li>
			</ul>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
			<script type="text/javascript">
				$('.ppt li:gt(0)').hide();
				$('.ppt li:last').addClass('last');
				var cur = $('.ppt li:first');

				function animate() {
					cur.fadeOut(2500);
					if (cur.attr('class') == 'last')
						cur = $('.ppt li:first');
					else
						cur = cur.next();
					cur.fadeIn(2500);
				}

				$(function() {
					setInterval("animate()", 4500);
				});
			</script>
			<!--Javascript Image Gallery Slider END-->
		</div><!--header 2 END -->

	<?php
} // end do_header function


function privat_leftpart($active, $expand)
{
	require_once 'includes/privat_leftpart.php';
}


function leftpart($active, $expand)
{
	?>
		<div id="content"> <!-- START CONTENT -->

			<div id="sidebar">

				<div id="updates" class="boxed">

					<div class="title">
						<h2>Navigation</h2>
					</div>

					<div class="contentleft">
						<ul>
							<li style="background: url(<?= IMAGE_URL ?>/menu_bullet-2.jpg) no-repeat left center;">
								<a href="<?= SITE_URL ?>/leistungen/" <?= $active == 'Leistungen' ? 'class="active2"' : ''; ?>">Leistungen</a>
							</li>


							<?php if ($expand == 'Leistungen') { ?>
								<!-- hide down menu -->
								<div class="content-small">
									<a <?php if ($active == 'Hauswartungen') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=hauswartungen">Hauswartungen</a>

									<a <?php if ($active == 'Unterhaltsreinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=unterhaltsreinigung">Unterhaltsreinigung</a>

									<a <?php if ($active == 'Umzugsreinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=umzugsreinigung">Umzugsreinigung</a>

									<a <?php if ($active == 'Baureinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=baureinigung">Baureinigung</a>

									<a <?php if ($active == 'Fensterreinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=fensterreinigung">Fensterreinigung</a>

									<a <?php if ($active == 'Fassadenreinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=fassadenreinigung">Fassadenreinigung</a>

									<a <?php if ($active == 'Buroreinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=buroreinigung">Büroreinigung</a>

									<a <?php if ($active == 'Teppichreinigung') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=teppichreinigung">Teppichreinigung</a>

									<a <?php if ($active == 'Sonderreinigungen') { ?>class="expands" <?php } ?> href="<?php echo SITE_URL ?>/leistungen/?p=sonderreinigungen">Sonderreinigungen</a>
								</div><!-- end .content-small -->
							<?php } ?>

							<li style="background: url(<?php echo IMAGE_URL ?>/menu_bullet-2.jpg) no-repeat left center;"><a <?php if ($active == 'Referenzen') { ?>class="active2" <?php } ?> href="<?php echo SITE_URL ?>/referenzen/">Referenzen</a></li>
							<!--<li style="background: url(<?php echo IMAGE_URL ?>/menu_bullet-2.jpg) no-repeat left center;"><a <?php if ($active == 'News') { ?>class="active2"<?php } ?> href="<?php echo SITE_URL ?>/news/">News</a></li>-->
							<li style="background: url(<?php echo IMAGE_URL ?>/menu_bullet-2.jpg) no-repeat left center;"><a <?php if ($active == 'PartnerLink') { ?>class="active2" <?php } ?> href="<?php echo SITE_URL ?>/partnerlink/">PartnerLink</a></li>

						</ul> <br>

						<div id="dotted">&nbsp;</div>

						<?php if ($expand !== 'Leistungen') { ?>
							<div id="updates-none">
								<h3 style="font-size: 13px; text-transform: uppercase; padding-left: 5px;">Leistungsübersicht</h3><br>
								<div style="border-top: 2px dotted #CCCCCC; margin-bottom: -5px; margin-top: -10px">&nbsp;</div>
								<ul>
									<li>
										<h3>Industrie und Bau</h3>
										<p style="text-align:justify;">
											<a href="#">Wir reinigen Ihre Büroräumlichkeiten, Verkaufsräume, Filialen, Lagerflächen, Stiegenhäuser und Freiflächen zuverlässig und gründlich. Für Bauherren oder Architekten führen wir bei Bedarf eine professionelle Bauendreinigung durch&#8230;</a>
										</p>
									</li>
									<li>
										<h3>Umzugsreinigung</h3>
										<p style="text-align:justify;">
											<a href="#">Wir bieten Ihnen die komplette Umzugsreinigung – termingerecht und inklusive Abgabegarantie zu Top Konditionen&#8230;</a>
										</p>
									</li>
									<li>
										<h3>Sonderreinigung</h3>
										<p style="text-align:justify;">
											<a href="#">Auf Anfrage führen wir auch Sonderreinigungen durch. Hier können wir im Bedarfsfall auch auf starke und kompetente Partner zurückgreifen&#8230;</a>
										</p>
									</li>
									<li>
										<h3>Gartenpflege</h3>
										<p style="text-align:justify;"><a href="#">auf Anfrage&#8230;</a></p>
									</li>
								</ul>
								<br>
							</div><!-- end #updates-none-->
						<?php } ?>


					</div><!-- end .content -->

				</div><!-- end #updates -->

			</div><!-- end #sidebar -->

		<?php
	} // end leftpart function


	function rightpart()
	{
		?>
			<div id="sidebar2">
				<div id="post" class="boxed">
					<div class="title">
						<h2>Info</h2>
					</div>
					<div class="content2">

						<h3 style="font-size: 10px; font-weight: bold;">UMR GmbH</h3><br>

						<b>Tel:</b>
						<a href="tel: +43(1)8920697" style="text-decoration: none;">&nbsp;+43(1)8920697</a><br><br>

						<b>Fax:</b>
						<a href="tel: +43(1)8920697-99" style="text-decoration: none;">+43(1)8920697-99</a><br><br>

						<b>Email:</b>
						<a href="#" style="text-decoration: none;">office@umr.at</a><br><br><br>

						<center><a href="mailto:office@umr.at?subject=Kontakt UMR GmbH" class="kontakt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kontakt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></center>
						<br>

						<div id="dotted">&nbsp;</div>

						<a href="<?php echo SITE_URL; ?>/ISO-9001">
							<div id="ad120x600">
								<img src="<?php echo IMAGE_URL ?>/ISO-9001.png" width="155px" height="150px" style="border:1px solid #ccc;" />
							</div>
						</a>

						<br />
						<div id="dotted">&nbsp;</div>

						<a href="<?php echo SITE_URL ?>/kontakt/#kontaktform">
							<div id="ad120x600">
								<p style="text-align:center; padding-top:30px; font-size:13px; font-weight:bold;">
									Kostenlose Angebotsanfrage
								</p>
							</div>
						</a>
					</div><!-- end .content2 -->
				</div><!-- end #post -->
			</div><!-- end #sidebar2 -->

		<?php
	} // end rightpart function


	function rightpart2()
	{
		?>

			<div id="sidebar2" class="boxed">
				<div class="title">
					<h2>Info</h2>
				</div>
				<div class="content2">

					<h3 style="font-size: 10px; font-weight: bold;">UMR die Reinigungstechnik</h3><br />


				</div><!-- end .content2 -->
			</div><!-- end #sidebar2 -->

		<?php
	} // end rightpart2 function


	function display_form($form_title)
	{
		?>
			<table width="270" border="0">
				<tr>
					<td width="53"><span style="vertical-align: text-top; font-size: 11px; text-align: inherit;"><img src="<?php echo IMAGE_URL ?>/telefon1.png" width="50" height="47" /></span></td>
					<td width="197">
						<p align="justify" style="vertical-align: middle; font-size: 12px; text-align: left;">Rufen Sie uns an unter:<br> <b><a href="tel:+43(1)8920697">+43(1)8920697</a></b></p>
					</td>
			</table>
			<script type="text/JavaScript">
				<!--
					function MM_findObj(n, d) { //v4.01
					var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
						d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
					if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
					for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
					if(!x && d.getElementById) x=d.getElementById(n); return x;
					}

					function MM_validateForm() { //v4.0
					var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
					for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
						if (val) { nm=val.name; if ((val=val.value)!="") {
						if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
							if (p<1 || p==(val.length-1)) errors+='- '+nm+' muss eine E-Mail-Adresse.\n';
						} else if (test!='R') { num = parseFloat(val);
							if (isNaN(val)) errors+='- '+nm+' muss eine Zahl.\n';
							if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
							min=test.substring(8,p); max=test.substring(p+1);
							if (num<min || max<num) errors+='- '+nm+' muss eine Zahl zwischen '+min+' and '+max+'.\n';
						} } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is notwendig.\n'; }
					} if (errors) alert('Der folgende Fehler aufgetreten:\n'+errors);
					document.MM_returnValue = (errors == '');
					}
					//-->
			</script>

			<form action="<?php echo SITE_URL ?>/kontakt/mailer.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('email','','RisEmail','subject','','R','verif_box','','R','message','','R');return document.MM_returnValue">

				<table class="formbgsmall" border="0" cellpadding="0" cellspacing="7" width="435px" height="500px" bgcolor="#FFFFFF">
					<tr>

						<td colspan="3" style="border-bottom: 2px dotted #CCCCCC;">
							<p style="text-align: center; font-weight: bold; font-size: 11px;"><br><?php echo $form_title ?></p>
						</td>
					</tr>
					<tr>
						<td width="20%">Name <span>*</span></td>
						<td width="4%">:</td>
						<td width="76%"><input name="name" value="" type="text" style="width:290px;" class="box" value="<?php echo (isset($_GET['name'])); ?>" /></td>
					</tr>
					<tr>
						<td>Firma</td>
						<td>:</td>
						<td><input name="comp_name" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['comp_name'])); ?>" /></td>
					</tr>
					<tr>
						<td>Telefon</td>
						<td>:</td>
						<td><input name="phone" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['phone'])); ?>" /></td>
					</tr>
					<tr>
						<td>Fax</td>
						<td>:</td>
						<td><input name="fax" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['fax'])); ?>" /></td>
					</tr>
					<tr>
						<td>Betreff <span>*</span></td>
						<td>:</td>
						<td><input name="subject" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['subject'])); ?>" /></td>
					</tr>
					<tr>
						<td>Email <span>*</span></td>
						<td>:</td>
						<td><input name="email" value="" type="text" style="width:290px;" class="box" value="<?php echo (isset($_GET['email'])); ?>" /></td>
					</tr>
					<tr>
						<td>Nachricht<span>*</span></td>
						<td>:</td>
						<td><textarea name="message" rows="5" cols="32" style="width:290px;" class="box" value="<?php echo (isset($_GET['message'])); ?>"></textarea></td>
					</tr>
					<tr>
						<td>Code<span> *</span></td>
						<td>:</td>
						<td><input name="verif_box" type="text" id="verif_box" class="box" />
							<img src="<?php echo SITE_URL ?>/kontakt/verificationimage.php?<?php echo rand(0, 9999); ?>" alt="verification image, type it in the box" width="50" height="24" align="absbottom" /><br>
							<!-- if the variable "wrong_code" is sent email previous page then display the error field -->
							<?php if (isset($_GET['wrong_code'])) { ?>
								<div style="border:1px solid #990000; background-color:#D70000; color:#FFFFFF; padding:4px; padding-left:6px;width:295px;">Code Falch. Bitte, versuchen Sie noch einmal.</div><br>
							<?php } ?>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><br>
							<p style="text-align:right">( <span>* </span>) Pflichtfelder</p>
						</td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: center; border-top: 2px dotted #CCCCCC; padding-top: 5px;">

							<input name="Submit" type="submit" class="box_button"" id=" button" value="Senden" style="margin-left: 20px;" />&nbsp;<input name="btn_reset" type="reset" class="box_button" value="Reset" />
						</td>
					</tr>

				</table>
			</form>

		<?php
	} // end display_form function


	function footer()
	{
		?>
			<div style="clear: both;">&nbsp;</div>

		</div><!-- END #content -->

		<div id="footer">

			<p id="links"><br /><br />
				<a href="<?php echo SITE_URL ?>/">Startseite</a> | <a href="<?php echo SITE_URL ?>/uberumr/">&Uuml;ber uns</a> | <a href="<?php echo SITE_URL ?>/leistungen/">Leistungen</a>
				| <a href="<?php echo SITE_URL ?>/jobs/">Jobs</a> | <a href="<?php echo SITE_URL ?>/kontakt/">Kontakt</a> | <a href="<?php echo SITE_URL ?>/sitemap/">Sitemap</a>
				| <a href="<?php echo SITE_URL ?>/impressum/">Impressum</a><br />
			</p>
			<p id="legal">Copyright &copy; 2014 UMR GmbH. All Rights Reserved.<br /><br />
			</p>

		</div>
	</body>

	</html>

<?php
	} // end footer function