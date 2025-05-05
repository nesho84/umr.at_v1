<style type="text/css">
	table {
		font: 11px/24px Verdana, Arial, Helvetica, sans-serif;
	}

	tr {
		backgound: #cccccc;
	}

	th {
		padding: 2px;
	}

	td {
		text-align: center;
		padding: 2px;
		backgound-color: #ccccff;
	}

	.button {
		width: 80px;
		background: #3C74E6 url(../_images/img06.gif) repeat-x;
		font-size: 12px;
		font-weight: bold;
		color: #ffffff;
		border: 2px solid #c9e749;
	}

	input {
		text-align: center;
	}
</style>
<!-- Stunden bearbeiten START -->
<?php
$query = "SELECT * FROM members WHERE username='$username' LIMIT 0, 30";
$result = mysqli_query($query) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
}
//Geting listeID from url via GET method
if (isset($_GET['listeID'])) {
	$listeID = (int) $_GET['listeID'];
	if ($members_level == 'mitarbeiter') {
		$qry = mysqli_query("SELECT * FROM stundenliste WHERE listeID='$listeID' AND name='$name'", $con);
	} else {
		$qry = mysqli_query("SELECT * FROM stundenliste WHERE listeID='$listeID'", $con);
	}
	if (!$qry) {
		die("Query Failed: " . mysqli_error($con));
	}
	//listing rows
	while (list($listeID, $name, $firma, $date, $jahr, $monat, $von, $bis, $pause, $regulare_stunden, $uber_stunden, $username) = mysqli_fetch_array($qry, MYSQLI_NUM)) {
?>
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="boxed">
			<tr>
				<td height="40" style="border: 0px; text-align: left;">
					<h2><strong>Stunden Bearbeiten<div id="hrblue"></div></strong></h2>
				</td>
			</tr>
		</table>
		<span style="font: 11px/24px Verdana, Arial, Helvetica, sans-serif;">
			<img src="<?php echo IMAGE_URL; ?>/hinweis.gif" width="20" height="20" style="margin-bottom:-3px;" />
			<strong>Hinweis: </strong>Bitte beachten Sie, dass Sie Ihre Daten genau eingeben...
		</span>
		<div id="hrblue"></div>
		<table border="0" align="center" cellpadding="1" cellspacing="1" class="boxed">
			<tr align="center" bgcolor="#CCCCCC">
				<th>Datum</th>
				<th>Firma</th>
				<th>von</th>
				<th>bis</th>
				<th>Pause</th>
				<th>Reg.Std.</th>
				<th>�ber.Std.</th>
				<th>Action</th>
			</tr>
			<form method="post">
				<input type="hidden" name="listeID" id="listeID" value="<?php echo $listeID; ?>" />
				<input type="hidden" name="monat" id="monat" value="<?php echo $monat; ?>" />
				<input type="hidden" name="username" id="username" value="<?php echo $username; ?>" />
				<tr bgcolor="#FFFFFF">
					<td width="12%">
						<input name="date" type="text" class="box" id="date" value="<?php echo $date; ?>" size="10">
					</td>
					<td width="10%">
						<?php
						//If members_level = mitarbeiter
						if ($members_level == 'mitarbeiter') {
						?>
							<select name="firma" id="firma">
								<?php
								echo "<option value='" . $firma . "'>" . $firma . "</option>";
								?>
							</select>
						<?php
						}
						//If members_level = vorabeiter
						if ($members_level == 'vorarbeiter') {
						?>
							<input name="firma" type="text" class="box" id="firma" value="<?php echo $firma; ?>">
						<?php
						}
						?>
					</td>
					<input name="name" type="hidden" class="box" id="name" value="<?php echo $name; ?>" size="8">
					<td width="10%">
						<input name="von" type="text" class="box" id="von" value="<?php echo $von; ?>" size="8">
					</td>
					<td width="10%">
						<input name="bis" type="text" class="box" id="bis" value="<?php echo $bis; ?>" size="8">
					</td>
					<td width="10%">
						<input name="pause" type="text" class="box" id="pause" value="<?php echo $pause; ?>" size="8">
					</td>
					<td width="10%">
						<input name="regulare_stunden" type="text" class="box" id="regulare_stunden" value="<?php echo $regulare_stunden; ?>" size="7">
					</td>
					<td>
						<input name="uber_stunden" type="text" class="box" id="uber_stunden" value="<?php echo $uber_stunden; ?>" size="7">
					</td>
					<td align="center">
						<input name="edit" id="edit" type="submit" class="button" value="&nbsp;Bearbeiten&nbsp;">
					</td>
				</tr>
			</form>
		</table><!-- Stunden bearbeiten END -->
		<br />
		<table width="100%" border="0" align="center" cellpadding="10" cellspacing="1" class="boxed">
			<tr>
				<td colspan="2">
					<hr color="#6699ff" size="1" style="margin-bottom:-1px;" />
				</td>
			</tr>
			<tr>
				<td style="text-align:left;" valign="top"><span><b>Monat:&nbsp;</b><?php echo $monat; ?></span></td>
				<td style="text-align:right;" valign="top"><span><b>Name:&nbsp;</b><?php echo $name; ?></span></td>
			</tr>
		</table>
<?php
	}
}
?>
<?php //edit Stunden
if (isset($_POST['edit'])) {
	$listeID = $_POST['listeID'];
	$date = $_POST['date'];
	$firma = $_POST['firma'];
	$name = $_POST['name'];
	$von = $_POST['von'];
	$bis = $_POST['bis'];
	$pause = $_POST['pause'];
	$regulare_stunden = $_POST['regulare_stunden'];
	$uber_stunden = $_POST['uber_stunden'];
	$jahr = date('Y');
	$monat = $_POST['monat'];
	$username = $_POST['username'];
	// add the article in the database
	$query = "UPDATE stundenliste SET date='$date', firma='$firma', name='$name', jahr='$jahr', monat='$monat', von='$von', bis='$bis', pause='$pause', regulare_stunden='$regulare_stunden', uber_stunden='$uber_stunden', username='$username' WHERE listeID='$listeID'";
	if (mysqli_query($query)) {
		echo "<br /><br /><br />";
		echo "<p align=center style=color:green; font-size:small; class=box>Stunden erfolgreich ge�ndert...</p>";
?>
		<meta http-equiv="Refresh" content="2;url=<?php echo SITE_URL; ?>privat/StundenBearbeiten/<?php echo $listeID; ?>" />
<?php
	} else {
		die('Error : ' . mysqli_error($con));
	}
} //edit stunden END
?>
<?php go_back(); ?>