<?php
include ('../template.php');

topheader('Kontakt');
do_header();
leftpart('','');
?>

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

<div id="mainlong">
		<div id="post" class="boxed">
			<div class="title"><h2>Kontakt</h2></div>
			
	<div class="content" >

<table width="650px" border="0">
  <tr>
    <th width="360px" align="left" valign="top" scope="row">
	  <p><strong>UMR GmbH</strong></p>
	  <p> <strong>Adresse</strong>: Penzingerstrasse 53/8</p>
	  <p>1140 Wien, Österreich</p>
	  <p><b>UID</b>: ATU 64017129</p>
	  <p><b>FN.</b>: 307439t</p>
      <p> <strong>Tel.</strong>: +43(1)8920697</p>
      <p> <strong>Fax.</strong>: +43(1)8920697-99</p>
      <p> <strong>E-mail</strong>: <span style="font-size: 11px;"><a href="mailto:office@umr.at">office@umr.at</a></span></p>
      <p> <strong>Geschäftsführer</strong><br/> <span style="font-size: 11px;">Uron Memeti</span></p></th>
    
	<td width="425" align="right">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:390px;width:390px;"><div id="gmap_canvas" style="height:300px;width:390px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(48.1896309,16.306144399999994),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(48.1896309, 16.306144399999994)});infowindow = new google.maps.InfoWindow({content:"<b>UMR GmbH</b><br/>Penzinger Stra&szlig;e 53<br/>1140 Wien" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>	</td>
    </tr>
</table>
<div id="dotted">&nbsp;</div>
			<form action="mailer.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('email','','RisEmail','subject','','R','verif_box','','R','message','','R');return document.MM_returnValue">

			<table class="formbg" align="center" border="0" cellpadding="0" cellspacing="7" width="590px" height="600px" bgcolor="#FFFFFF">
			<tr>
				<td colspan="3" style="border-bottom: 2px dotted #CCCCCC;"><p style="text-align: center; font-weight: bold; font-size: 16px; color: #618eeb"><br />Bitte geben sie korrekte informationen für folgende felder ein.</p>
				</td>
			</tr>
			<tr>
				<td width="20%" id="kontaktform">Name *</td>
				<td width="4%">:</td>
				<td width="76%"><input name="name" value="" type="text" style="width:290px;" class="box" value="<?php echo (isset($_GET['name']));?>"/></td>
			</tr>
			<tr>
				<td>Firma</td>
				<td>:</td>
				<td><input name="comp_name" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['comp_name']));?>"/></td>
			</tr>
			<tr>
				<td>Telefon</td>
				<td>:</td>
				<td><input name="phone" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['phone']));?>"/></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td>:</td>
				<td><input name="fax" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['fax']));?>"/></td>
			</tr>
			<tr>
				<td>Subjekt *</td>
				<td>:</td>
				<td><input name="subject" type="text" value="" style="width:290px;" class="box" value="<?php echo (isset($_GET['subject']));?>"/></td>
			</tr>
			<tr>
				<td>Email *</td>
				<td>:</td>
				<td><input name="email" value="" type="text" style="width:290px;" class="box" value="<?php echo (isset($_GET['email']));?>"/></td>
			</tr>
			<tr>
				<td>Nachricht *</td>
				<td>:</td>
				<td><textarea name="message" rows="5" cols="32" style="width:290px;" class="box" value="<?php echo (isset($_GET['message']));?>"></textarea></td>
			</tr>
			<tr>
				<td>Code *</td>
				<td>:</td>
				<td><input name="verif_box" type="text" id="verif_box" class="box"/>
					<img src="<?php echo SITE_URL ?>kontakt/verificationimage.php?<?php echo rand(0,9999);?>" alt="verification image, type it in the box" width="50" height="24" align="absbottom" /><br />
			<!-- if the variable "wrong_code" is sent email previous page then display the error field -->
<?php if(isset($_GET['wrong_code'])){?>
<div style="border:1px solid #990000; background-color:#D70000; color:#FFFFFF; padding:4px; padding-left:6px;width:292px;">Code Falch. Bitte, versuchen Sie noch einmal.</div><br /> 
<?php ;}?>
			</tr>
			<tr>
				<td colspan="3"><p style="text-align:right">( * ) Pflichtfelder</p>
				</td>
			</tr>
			
			<tr>		
					<td colspan="3" style="text-align: center; border-top: 2px dotted #CCCCCC; padding-top: 7px;">
			
	<input name="Submit" type="submit" class="box_button"" id="button" value="Senden"/>&nbsp;<input name="btn_reset" type="reset" class="box_button" value="Reset" />
					</td></tr>
				
			</table>
			</form>
	
</div><!--end class content-->
</div><!-- end #post -->
</div><!-- end #mainlong -->

<?php
footer();
?>
