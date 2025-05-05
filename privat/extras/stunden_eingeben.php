<style type="text/css">
	table {
		font: 12px/24px Verdana, Arial, Helvetica, sans-serif;
	}

	tr {
		backgound: #cccccc;
	}

	th {
		text-align: right;
		padding: 2px;
		border: 2px solid #fff;
	}

	td {
		text-align: left;
		padding-left: 0px;
		backgound-color: #ccccff;
		border: 2px solid #fff;
	}

	.button {
		width: 150px;
		height: 50px;
		background: #3C74E6 url(../_images/img06.gif) repeat-x;
		font-size: 28px;
		font-weight: normal;
		color: #ffffff;
		border: 2px solid #c9e749;
		border-radius: 7px;
	}

	input {
		font-size: 14px;
		width: 96%;
		height: 30px;
	}

	.large-font {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 25px;
		padding: 1px;
		border: 1px solid #00a59c;
	}

	select {
		width: 97%;
		height: 36px;
	}
</style>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="boxed">
	<tr>
		<td height="40" style="text-align:left; border: 0px;">
			<h2><strong>Stunden eingeben<div id="hrblue"></div></strong></h2>
		</td>
	</tr>
	<tr>
		<td colspan="8" style="text-align:left; border: 0px;">
			<span><img src="<?php echo IMAGE_URL; ?>/hinweis.gif" width="20" height="20" style="margin-bottom:-3xpx;" /><strong>Hinweis: </strong>Bitte beachten Sie, dass Sie Ihre Daten genau eingeben...</span>
		</td>
	</tr>
</table>
<form method="POST">
	<table width="100%" border="0" align="left" cellpadding="10" cellspacing="10" style="border: 2px dotted #cccccc;">
		<tr>
			<td>&nbsp;</td>
			<td><span style="font-size:11px;">Eingabefelder mit einem ( * ) sind Pflichtfelder.</span></td>
		</tr>
		<?php
		$query = "SELECT * FROM members WHERE username='$username'";
		$result = mysqli_query($query) or die(mysqli_error($con));
		while ($row = mysqli_fetch_array($result)) {
			$name = $row['name'];
		}
		if ($members_level == 'mitarbeiter') {
		?>
			<input type="hidden" name="name" class="large-font" id="name" value="<?php echo $name; ?>" />
			<tr>
				<th>Name:</th>
				<td><strong><input type="text" class="large-font" value="<?php echo $name; ?>" disabled /></strong></td>
			</tr>
		<?php
		}
		?>
		<?php
		if ($members_level == 'vorarbeiter' || $members_level == 'firma') {
		?>
			<tr>
				<th>Name:</th>
				<td>
					<?php
					$qry = mysqli_query("SELECT * FROM members where members_level='mitarbeiter' ORDER BY name", $con);
					if (!$qry) {
						die("Query Failed: " . mysqli_error($con));
					}
					?>
					<select name="name" id="name" class="large-font">
						<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
						<?php
						while ($row = mysqli_fetch_array($qry)) {
							echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
						}
						?>
					</select>
					*
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<th>Monat:</th>
			<td>
				<?php
				$qry = mysqli_query("SELECT * FROM monat", $con);
				if (!$qry) {
					die("Query Failed: " . mysqli_error($con));
				}
				?>
				<select name="monat" id="monat" class="large-font">
					<?php
					echo "<option value='" . $listmonat . "'>" . $listmonat . "</option>";
					while ($row = mysqli_fetch_array($qry)) {
						echo "<option value='" . $row['monat'] . "'>" . $row['monat'] . "</option>";
					}
					?>
				</select>
				*
			</td>
		</tr>
		<tr>
			<th>Firma/Adresse:</th>
			<?php
			if ($members_level == 'mitarbeiter') {
			?>
				<td>
					<?php
					$qry = mysqli_query("SELECT * FROM firmen", $con);
					if (!$qry) {
						die("Query Failed: " . mysqli_error($con));
					}
					?>
					<select name="firma" id="firma" class="large-font">
						<?php
						while ($row = mysqli_fetch_array($qry)) {
							echo "<option value='" . $row['firma_name'] . "'>" . $row['firma_name'] . "</option>";
						}
						?>
					</select>
					*
				</td>
			<?php
			}
			if ($members_level == 'vorarbeiter' || $members_level == 'firma') {
			?>
				<td><input name="firma" type="text" class="large-font" id="firma" value="" size="12"></td>
			<?php
			}
			?>
		</tr>
		<tr>
			<th>Datum:</th>
			<td><input name="datum" type="text" class="large-font" id="datum" value="<?php echo date("Y-m-d"); ?>"> * </td>
		</tr>
		<tr>
			<th>von:</th>
			<td><input name="von" type="text" class="large-font" id="von" value="06:00" size="4"> * </td>
		</tr>
		<tr>
			<th>bis:</th>
			<td><input name="bis" type="text" class="large-font" id="bis" value="00:00" size="4"> * </td>
		</tr>
		<tr>
			<th>Pause:</th>
			<td><input name="pause" type="text" class="large-font" id="pause" value="" size="4"> * </td>
		</tr>
		<tr>
			<th>Regul�re Stunden:</th>
			<td><input name="regularstd" type="text" class="large-font" id="regularstd" value="" size="5"> * </td>
		</tr>
		<tr>
			<th>�berstunden:</th>
			<td><input name="uberstd" type="text" class="large-font" id="uberstd" value="" size="10"></td>
		</tr>
		<tr>
			<td style="text-align: right;">&nbsp;</td>
			<td><input name="add" id="add" type="submit" class="button" value="&nbsp; Einf�gen &nbsp;"></td>
		</tr>
	</table>
</form>
<!-- Stunden eingeben END -->
<div style="clear: both;"></div>
<?php //add stunden into database begin
if (isset($_POST['add'])) {
	$monat = $_POST['monat'];
	$datum = $_POST['datum'];
	$name = $_POST['name'];
	$firma = $_POST['firma'];
	$von = $_POST['von'];
	$bis = $_POST['bis'];
	$pause = $_POST['pause'];
	$regularstd = $_POST['regularstd'];
	$uberstd = $_POST['uberstd'];
	$jahr = date('Y');
	//Don't allow duplicate date and 'monat' just for Mitarbeiter
	//if ($members_level == 'mitarbeiter')
	//{
	//$qry_check = mysqli_query("SELECT date FROM stundenliste where date='$datum' AND name='$name' ", $con);
	//if(!$qry_check) { die("Query Failed: ". mysqli_error($con)); }
	//$row=mysqli_fetch_array($qry_check);
	//if (MYSQLI_NUM_rows($qry_check))
	//{
	//echo "<br /><p align=center style=color:red; font-size:small; class=box><b>Doppelte Eingabe.</b><br />Bitte Versuchen sie es Erneut...</p>";
	//exit;
	//}
	//}
	//Dont allow more than 31 days to insert
	$qry_check2 = mysqli_query("SELECT * FROM stundenliste where monat='$monat' AND name='$name' ", $con);
	if (!$qry_check2) {
		die("Query Failed: " . mysqli_error($con));
	}
	if (MYSQLI_NUM_rows($qry_check2) >= 61) {
		echo "<br /><br />";
		echo "<p align=center style=color:red; font-size:small; class=box>Ende Monat!<br />Stunden eingeben f�r diesen Monat abgeschlossen...</p>";
		exit;
	} else {
		// add the Stunden in the database
		$query = "INSERT INTO stundenliste (date, name, firma, jahr, monat, von, bis, pause, regulare_stunden, uber_stunden, username)
	VALUES ('$datum', '$name', '$firma', '$jahr', '$monat', '$von', '$bis', '$pause', '$regularstd', '$uberstd', '$username')";
		if (mysqli_query($query)) {
			echo "<br /><p align=center style=color:green; font-size:small; class=box>Stunden f�r <b>" . $name . "</b> erfolgreich eingegeben...</p>";
		} else {
			die('Error : ' . mysqli_error($con));
		}
	} //cheking number of rows end
} //add stunden END
?>
<?php go_back(); ?>