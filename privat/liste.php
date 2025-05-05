<style type="text/css">
	table {
		font: 11px/24px Verdana, Arial, Helvetica, sans-serif;
	}

	tr {
		backgound: #cccccc;
	}

	th {
		padding: 2px;
		text-align: right;
		width: 46%;
	}

	td {
		padding-left: 0px;
		backgound-color: #ccccff;
	}

	.button {
		width: 140px;
		height: 51px;
		background: #3C74E6 url(../_images/img06.gif) repeat-x;
		font-size: 28px;
		font-weight: normal;
		color: #ffffff;
		border: 2px solid #c9e749;
		border-radius: 7px;
	}

	.large-font {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
		padding: 1px;
		border: 1px solid #00a59c;
	}

	input {
		font-size: 14px;
		width: 300px;
		height: 30px;
	}

	select {
		width: 225px;
		height: 47px;
	}
</style>
<table width="100%" border="0" align="" cellpadding="10" cellspacing="10" class="boxed"">
<tr>
<td height=" 40" style="text-align: left;">
	<h2><strong>Stundenliste - UMR GmbH <div id="hrblue"></div></strong></h2>
	</td>
	</tr>
</table>
<!--/////////////////////////////////// Select Name or Monat ////////////////////////////////// -->
<form method="post" action="StundenTabele">
	<table align="center" width="100%" border="0" cellpadding="10" cellspacing="10" style="border: 2px dotted #ccc; border-radius: 7px; height: 100px;">
		<tr>
			<td style="text-align: left;">Name:<br />
				<h2>
					<select name="name" id="name" class="large-font">
						<?php
						//Select Loggedin Username
						$qry2 = mysqli_query("SELECT * FROM members where username='$username'");
						$row2 = mysqli_fetch_array($qry2);
						$name2 = $row2['name'];
						//If members_level = mitarbeiter
						if ($members_level == 'mitarbeiter') {
							echo "<option value='" . $name2 . "'>" . $name2 . "</option>";
						}
						//If members_level = vorabeiter
						if ($members_level == 'vorarbeiter') {
							$qry = mysqli_query("SELECT * FROM members where members_level='mitarbeiter'", $con);
							if (!$qry) {
								die("Query Failed: " . mysqli_error($con));
							}
							echo "<option value='" . $name2 . "'>" . $name2 . "</option>";
							while ($row = mysqli_fetch_array($qry)) {
								echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
							}
						}
						//If members_level = firma
						if ($members_level == 'firma') {
							$qry3 = mysqli_query("SELECT * FROM members where members_level='vorarbeiter'", $con);
							$qry4 = mysqli_query("SELECT * FROM members where members_level='mitarbeiter'", $con);
							if (!$qry3 || !$qry4) {
								die("Query Failed: " . mysqli_error($con));
							}
							while ($row3 = mysqli_fetch_array($qry3)) {
								echo "<option value='" . $row3['name'] . "'>" . $row3['name'] . "</option>";
							}
							while ($row4 = mysqli_fetch_array($qry4)) {
								echo "<option value='" . $row4['name'] . "'>" . $row4['name'] . "</option>";
							}
						}
						?>
					</select>
				</h2><br />
			</td>
			<td style="text-align: left;">Monat:
				<h2>
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
				</h2><br />
			</td>
			<td><br />
				<h2 align="center"><input type="submit" class="button" value="Suchen" /></h2><br />
			</td>
		</tr>
	</table>
</form>
<br />
<!--/////////////////////////////////// Select Name or Monat END ////////////////////////////////// -->
<?php go_back(); ?>