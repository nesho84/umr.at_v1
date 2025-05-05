<style type="text/css">
	img {
		width: 80px;
		height: 80px;
	}

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
		border: 2px solid #fff;
	}

	td {
		padding-left: 0px;
		backgound-color: #ccccff;
		border: 2px solid #fff;
	}

	span {
		color: red;
		font-size: 12px;
		margin-bottom: 5px;
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
		width: 315px;
		height: 30px;
	}

	.large-font {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
		padding: 1px;
		border: 1px solid #00a59c;
	}

	select {
		width: 304px;
		height: 36px;
	}
</style>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="boxed">
	<tr>
		<td height="40" align="" style="border: 0px;">
			<h2><strong>Profile<div id="hrblue"></div></strong></h2>
		</td>
	</tr>
</table>
<form method="post">
	<table width="100%" border="0" cellpadding="10" cellspacing="10" class="boxed" style="border: 2px dotted #cccff;">
		<?php
		$qry = mysqli_query("SELECT * FROM members where username='$username' LIMIT 0, 30 ", $con);
		if (!$qry) {
			die("Query Failed: " . mysqli_error($con));
		}
		while ($row = mysqli_fetch_array($qry)) {
		?>
			<tr>
				<td align="center" style="padding: 15px;"><img src="<?php echo IMAGE_URL; ?>/kein-bild.gif" /><br />Personal Bild kommt bald...</td>
				<td align="center" style="padding: 15px;"><a href="<?php echo SITE_URL ?>privat/Profile/Bearbeiten/<?php echo $row['userID']; ?>"><img src="<?php echo IMAGE_URL; ?>/edit.gif" /><br />Profile Bearbeiten</a></td>
			</tr>
			<input type="hidden" name="userID" id="idd" value="<?php echo $row['userID']; ?>" />
			<tr>
				<th>Username:</th>
				<td><input type="text" class="large-font" value="<?php echo $row['username']; ?>" disabled /></td>
			</tr>
			<tr>
				<th>Name:</th>
				<td><input type="text" class="large-font" value="<?php echo $row['name']; ?>" disabled /></td>
			</tr>
			<tr>
				<th>E-mail:</th>
				<td><input name="email" class="large-font" id="email" value="<?php echo $row['email']; ?>" /></td>
			</tr>
			<tr>
				<th>Telefon:</th>
				<td><input name="tel" class="large-font" id="tel" value="<?php echo $row['tel']; ?>" /></td>
			</tr>
			<tr>
				<th>Addresse:</th>
				<td><input name="address" class="large-font" id="address" value="<?php echo $row['address']; ?>" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left"><input name="edit" type="submit" class="button" id="update" value="&nbsp;Speichern&nbsp;"></td>
			</tr>
		<?php
		}
		?>
	</table>
</form>
<?php
if (isset($_POST['edit'])) {
	$userID = $_POST['userID'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	$qry = mysqli_query("UPDATE members SET email='$email', tel='$tel', address='$address' WHERE userID='$userID'", $con);
	if (!$qry) {
		die("Query Failed: " . mysqli_error($con));
	} else {
		echo "<br /><br />";
		echo "<p align=center style=color:green; font-size:small; class=box>Profile daten erfolgreich ge�ndert...</p>";
?>
		<meta http-equiv="Refresh" content="2;url=<?php echo SITE_URL; ?>privat/Profile" />
<?php
	}
}
?>
<?php go_back(); ?>