	<?php
	include ('../_library/config.php');
	require_once '../_library/dbconnect.php';
	//Session Username
	if(isset($_SESSION['username']))
	{
	$username = $_SESSION['username'];
	//Defining user Levels
	$qry111 = mysql_query("SELECT * FROM members where username='$username'");
	$row222=mysql_fetch_array($qry111);
	$members_level = $row222['members_level'];
	$real_user = $row222['username'];
	}
	//Geting the current Monat
	date_default_timezone_set('Europe/Berlin'); 
	//Set the gloabal LC_TIME constant to german
	setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
	$listmonat = strftime('%B');

	function topheader($title) {
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="UMR die Reinigungstechnik - die beste Wahl für professionelle Reinigung, Service, Schnelligkeit, Sauberkeit, Reinigung ihrer Objekte">
<meta name="keywords" content="Reinigung, Objektreinigeung, Unterhaltsreinigung, Hauswartungen, Umzugsreinigung, Baureinigung, Fensterreinigung, Fassadenreinigung, Büroreinigung, Teppichreinigung, Sonderreinigung">
<meta name="robots" content="index, follow" />  
<link rel="shortcut icon" href="<?php echo IMAGE_DIR;?>logo/umr-icon-nn.ico">
<title><?php echo $title; ?></title>
<link href="<?php echo SITE_URL ?>_css/default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>_css/print.css" media="print">
<link href="poll/template/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header">
<span><a href="<?php echo SITE_URL ?>" style="text-decoration: none;">
<div id="logo">
<!--<p style="padding-left: 135px; padding-top: 22px; font-size: 20px; font-weight: bold;">GmbH</p>-->
</div>
</a>
</span>
<div id="menu">
<ul>
<li ><a <?php if ($title == 'Willkommen') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>" title="">Startseite</a></li>
<li><a <?php if ($title == 'Umr') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>uberumr/">Über uns</a></li>
<!--<li><a <?php if ($title == 'Buchen') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>buchen/">Online Buchen</a></li>-->
<li><a <?php if ($title == 'Leistungen') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>leistungen/">Leistungen</a></li>
<li><a <?php if ($title == 'Jobs') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>jobs/">Jobs</a></li>
<li><a <?php if ($title == 'Kontakt') { ?>class="current"<?php } ?> href="<?php echo SITE_URL ?>kontakt/">Kontakt</a></li>
</ul></div>
</div>
	<?php
	}
	function privat_leftpart($active, $expand) {
	require_once 'includes/privat_leftpart.php';
	?>
<!--//////////////////// Main CONTENT BEGIN ////////////////////-->
<div id="mainlong">
<div id="post" class="boxed">
<div class="title">
<h2 style="font-size: 11px; text-transform: none;">
Hallo <span style="color: #00FF00; font-size: 13.5px;"><?php if (isset($_SESSION['username'])) { echo  $_SESSION['username']; }?></span>,  Sie sind eingeloggt. <a href="<?php echo SITE_URL ?>privat/Logout" style="color: #6600CC; text-decoration: none;"> Ausloggen</a>
</h2>
</div>
<div class="content" style="height:auto;">
<br />
	<?php
	}
	function go_back() {
	?>
<br /><p style="text-align: center;"><a href="javascript:history.go(-1)"><img src="<?php echo IMAGE_DIR;?>go-back.png" width="50" height="50" style="text-align: center; padding-top: 10px; margin-bottom: -35px;" /></a></p>
	<?php
	}
	function footer() {
	?>
</div><!-- end .content -->
</div><!-- end #post -->
</div><!-- end #mainlong -->
<!--//////////////////// Main CONTENT END ////////////////////-->
</div>
<div id="footer">
<p id="links"><br />
<a href="<?php echo SITE_URL ?>">Startseite</a> | <a href="<?php echo SITE_URL ?>uberumr/">Über uns</a> | <a href="<?php echo SITE_URL ?>leistungen/">Leistungen</a>
| <a href="<?php echo SITE_URL ?>jobs/">Jobs</a> | <a href="<?php echo SITE_URL ?>kontakt/">Kontakt</a> | <a href="<?php echo SITE_URL?>sitemap.php">Sitemap</a>
</p>
<br />
<p id="legal">Copyright &copy; 2012 UMR GmbH. All Rights Reserved.<br /><br /> Designed by
<a class="popup" href="#">NNWEBS<span>TEL: +43 6766 11 55 61<br>TEL: +43 6769 40 15 61<br>
E-mail: nnwebs2@gmail.com</span></a>
</p>
</div>
</body>
</html>
	<?php
	}
	?>