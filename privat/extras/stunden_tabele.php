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
		font-weight: normal;
		color: #ffffff;
		border: 2px solid #c9e749;
	}

	input {
		font-size: 14px;
		width: 300px;
		height: 30px;
	}

	select {
		width: 304px;
		height: 36px;
	}
</style>
<?php
if (isset($_POST['name']) && ($_POST['monat'])) {
	$name = mysql_real_escape_string($_POST['name']);
	$monat = mysql_real_escape_string($_POST['monat']);
	$qry = mysqli_query("SELECT * FROM stundenliste where name='$name' AND monat='$monat' ORDER BY date,firma LIMIT 0, 61 ", $con);
	if (!$qry) {
		die("Query Failed: " . mysqli_error($con));
	}
?>
	<h4><img src="<?php echo IMAGE_URL; ?>/logo/logosmall-nn-gif.gif" border="0"></h4>
	<h6 style="text-align: right;"><a href="javascript:window.print()"><img src="<?php echo IMAGE_URL; ?>/print.jpg" border="1"></a></h6>
	<h1 style="margin-top: -24px">Stundenliste - UMR GmbH</h1>
	<div id="hrblue"></div><br />
	<table width="100%" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#ccccff" class="boxed">
		<tr align="" bgcolor="#00a59c">
			<td colspan="10" height="25"><b style="font-size:14px;"><?php echo $name; ?> / <?php echo $monat; ?> / <?php echo date("Y"); ?></b></td>
		</tr>
		<tr align="center" bgcolor="#CCCCCC">
			<th>Datum</th>
			<th>Firma / Frei</th>
			<?php
			if ($members_level == 'vorarbeiter' || $members_level == 'firma') {
			?>
				<th>Name</th>
			<?php
			}
			?>
			<th>von</th>
			<th>bis</th>
			<th>Pause</th>
			<th>Reg.Std.</th>
			<th>�berstd.</th>
			<th>/</th>
			<th>Action</th>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($qry)) {
		?>
			<tr bgcolor="#FFFFFF">
				<td width="14%"><?php $old_date = $row['date'];
								echo $old_date; ?></td>
				<td width="17%"><?php echo $row['firma']; ?></td>
				<?php
				if ($members_level == 'vorarbeiter' || $members_level == 'firma') {
				?>
					<td width="17%"><?php echo $row['name']; ?></td>
				<?php
				}
				?>
				<td width="10%"><?php echo $row['von']; ?></td>
				<td width="10%"><?php echo $row['bis']; ?></td>
				<td width="10%"><?php echo $row['pause']; ?></td>
				<td width="17%"><?php echo $row['regulare_stunden']; ?></td>
				<td width="17%"><?php echo $row['uber_stunden']; ?></td>
				<td width="17%"><?php echo $row['username']; ?></td>
				<td align="center" width="12%">
					<?php //Disable editing |Stundenlite| after 24 Hours
					$now_date = date("Y-m-d");
					if ($old_date == $now_date) {
					?>
						<a href="<?php echo SITE_URL ?>privat/StundenBearbeiten/<?php echo $row['listeID']; ?>">bearbeiten</a>
					<?php
					} else {
					?>
						<span style="color: #cccccc; font-size: 11px;">bearbeiten</span>
					<?php
					}
					?>
				</td>
			</tr>
		<?php
		}
		?>
		<tr bgcolor="#00a59c"><!--Calculating Hours per monat(Regulare stunden)-->
			<?php
			if ($members_level == 'vorarbeiter' || $members_level == 'firma') {
			?>
				<td colspan="6" bgcolor="#00a59c" style="color:#ffffff;"></td>
			<?php
			} else {
			?>
				<td colspan="5" bgcolor="#00a59c" style="color:#ffffff;"></td>
			<?php
			}
			?>
			<td bgcolor="#ABAFB7" style="color:#ffffff;">
				<?php
				$query = "SELECT monat, SUM(regulare_stunden) FROM stundenliste where monat='$monat' AND name='$name' LIMIT 0,31";
				$result = mysqli_query($query) or die(mysqli_error($con));
				while ($row = mysqli_fetch_array($result)) {
					echo "R.Std. <b>(" . $row['SUM(regulare_stunden)'] . ")</b>";
					echo "<br />";
				}
				?>
			</td>
			<!--Calculating Hours per monat(Uberstunden)-->
			<td bgcolor="#ABAFB7" style="color:#ffffff;">
				<?php
				$query = "SELECT monat, SUM(uber_stunden) FROM stundenliste where monat='$monat' AND name='$name' GROUP BY monat";
				$result = mysqli_query($query) or die(mysqli_error($con));
				while ($row = mysqli_fetch_array($result)) {
					echo "�.Std. <b>(" . $row['SUM(uber_stunden)'] . ")</b>";
					echo "<br />";
				}
				?>
			</td>
			<td colspan="2" bgcolor="#00a59c"></td>
		</tr>
	</table>
	<br />
	<hr color="#ABAFB7" />
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="text-align:left;"><?php echo 'Name:<b> ' . $name . '</b>'; ?></td>
			<td>&nbsp;</td>
			<td style="text-align:right;"><?php echo 'Monat: <b>' . $monat . '</b>'; ?></td>
		</tr>
	</table>
<?php
}
?>
<?php go_back(); ?>