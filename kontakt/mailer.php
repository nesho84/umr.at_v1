<?php
ob_start();
include ('../template.php');

topheader('Kontakt');
do_header();
leftpart('','');
?>
<style type="text/css">
	table,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #fff;
	border: 2px solid #cccccc;
}
h2 {
color: #000;
}
p {
color: #000;
}
</style>

<div id="mainlong">
		<div id="post" class="boxed">
			<div class="title"><h2>Mailer</h2></div>
			
	<div class="content" >

<?php
// ----------------------------------------- 
//  The Web Help .com
// ----------------------------------------- 
// remember to replace you@email.com with your own email address lower in this code.

// load the variables form address bar
$name = $_POST["name"];
$comp_name = $_POST["comp_name"];
$phone = $_POST["phone"];
$fax = $_POST["fax"];
$subject = $_POST["subject"];
$email = $_POST["email"];
$message = $_POST["message"];
$verif_box = $_POST["verif_box"];

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// remove the backslashes that normally appears when entering " or '
$name = stripslashes($name);
$comp_name = stripslashes($comp_name);
$phone = stripslashes($phone);
$fax = stripslashes($fax);     
$subject = stripslashes($subject); 
$email = stripslashes($email); 
$message = stripslashes($message); 
$totalmessage = "
<html>
<head>
<title>Nachricht von UMR.AT</title>
</head>
<body>
<table border=0 cellspacing=10 cellpadding=10 width=600px>
<tr bgcolor=#C6F2E5><td colspan=2 align=center><h2>Nachricht von <a href=http://umr.at>umr.at</a></h2></td></tr>
<tr bgcolor=#cccccc><td><p><b>E-mail :</b></p></td>		<td>$email</td></tr>

<tr bgcolor=#cccccc><td><p><b>Name   :</b></p></td>	    <td>$name</td></tr>

<tr bgcolor=#cccccc><td><p><b>Firma  :</b></p></td>		<td>$comp_name</td></tr>

<tr bgcolor=#cccccc><td><p><b>Fax	   :</b></p></td>		<td>$fax</td></tr>

<tr bgcolor=#cccccc><td><p><b>Telefon:</b></p></td>		<td>$phone</td></tr>

<tr bgcolor=#cccccc><td valign=top><p><b>Message:</b></p></td>	    <td>$message<br><br><br><br></td></tr></table></body></html>";

// check to see if verificaton code was correct
if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']){
	// if verification code was correct send the message and show this page
	mail("office@umr.at", $subject, '&nbsp;&nbsp;IP Adresse:	' . $_SERVER['REMOTE_ADDR'] . "\n\n" . $totalmessage, $headers, "Von: $email");
	// delete the cookie so it cannot sent again by refreshing this page
	setcookie('tntcon','');
} else if(isset($message) and $message!=""){
	// if verification code was incorrect then return to contact page and show error
	header("Location: index.php?subject=$subject&email=$email&message=".urlencode($message)."&wrong_code=true");
	exit;
} else {
	echo "Fehler! Diese site kann nicht direkt abgerufen.";
	exit;
	}
?>

<body>
<br /><br />
<p align="center">
E-Mail geschickt. Vielen Dank. <br />
<br />
Zurück zu <a href="/"> Startseite </a> ?
</p>
</body>
</html>

	
</div><!--end class content-->
</div><!-- end #post -->
</div><!-- end #mainlong -->

<?php
footer();
?>
