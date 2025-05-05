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
		width: 0%;
		border: 2px solid #fff;
	}

	td {
		padding-left: 0px;
		backgound-color: #ccccff;
		border: 2px solid #fff;
	}

	span {
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
		width: 96%;
		height: 30px;
	}

	.large-font {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 20px;
		padding: 1px;
		border: 1px solid #00a59c;
	}

	select {
		width: width: 96%;
		height: 36px;
	}
</style>
<script language="javascript">
	function validateForm() {
		var x = document.forms["myForm"]["username"].value;
		var y = document.forms["myForm"]["password"].value;
		var z = document.forms["myForm"]["name"].value;
		if (x == null || x == "") {
			alert("Username muss ausgef�llt werden");
			return false;
		}
		if (y == null || y == "") {
			alert("Password muss ausgef�llt werden");
			return false;
		}
		if (z == null || z == "") {
			alert("Name muss ausgef�llt werden");
			return false;
		}
	}
</script>
<table width="100%" border="0" align="" cellpadding="1" cellspacing="1" class="boxed">
	<tr>
		<th height="40" style="text-align: left; border: 0px;">
			<h2><strong>Mitarbeiter hinzuf�gen<div id="hrblue"></div></strong></h2>
		</th>
	</tr>
</table>
<form name="myForm" onsubmit="return validateForm()" method="post">
	<table align="" width="100%" border="0" cellpadding="10" cellspacing="10" style="border: 2px dotted #cccccc;">
		<input name="members_level" type="hidden" class="box" id="members_level" value="mitarbeiter" />
		<tr>
			<td></td>
			<td align="left"><span style="font-size:10px;">Eingabefelder mit einem ( * ) sind Pflichtfelder.</span></td>
		</tr>
		<tr>
			<th width="">Username: </th>
			<td colspan="0" align="left"><input name="username" type="text" class="large-font" id="username" /> * </td>
		</tr>
		<tr>
			<th width="">Password: </th>
			<td><input name="password" class="large-font" id="password" value="1234" /> * </td>
		</tr>
		<tr>
			<th width="">Name: </th>
			<td><input name="name" class="large-font" id="name" /> * </td>
		</tr>
		<tr>
			<th width="">E-mail: </th>
			<td><input name="email" class="large-font" id="email" value="" /></td>
		</tr>
		<tr>
			<th width="">Tel.: </th>
			<td><input name="tel" class="large-font" id="tel" /></td>
		</tr>
		<tr>
			<th width="">Address: </th>
			<td><input name="address" class="large-font" id="address" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="left"><input name="add" type="submit" class="button" id="add" value="&nbsp;Einf�gen&nbsp;" /></td>
		</tr>
	</table>
</form>
<?php
if (isset($_POST['add'])) {
	$username = $_POST['username'];
	$members_level = $_POST['members_level'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$address = $_POST['address'];
	//Don't allow duplicate name and username
	$qry_check = mysqli_query("SELECT username FROM members where username='$username' ", $con);
	$qry_check2 = mysqli_query("SELECT name FROM members where name='$name' ", $con);
	if (!$qry_check) {
		die("Query Failed: " . mysqli_error($con));
	}
	if (!$qry_check2) {
		die("Query Failed: " . mysqli_error($con));
	}
	$row = mysqli_fetch_array($qry_check);
	$row2 = mysqli_fetch_array($qry_check2);
	if (MYSQLI_NUM_rows($qry_check)) {
		echo "<br /><br />";
		echo "<p align=center style=color:red; font-size:small; class=box><b>Username</b> existiert.<br />Bitte Versuchen sie es Erneut...</p>";
		exit;
	}
	if (MYSQLI_NUM_rows($qry_check2)) {
		echo "<br /><br />";
		echo "<p align=center style=color:red; font-size:small; class=box><b>Name</b> existiert.<br />Bitte Versuchen sie es Erneut 2...</p>";
		exit;
	}
	// add the user in the database
	$query = "INSERT INTO members (username, members_level, password, name, email, tel, address)
    VALUES ('$username', '$members_level', '$password', '$name', '$email', '$tel', '$address')";
	if (mysqli_query($query)) {
		echo "<br /><br />";
		echo "<p align=center style=color:green; font-size:small; class=box>Mitarbeiter erfolgreich eingegeben...</p>";
?>
		<meta http-equiv="Refresh" content="2;url=<?php echo SITE_URL; ?>privat/Mitarbeiter" />
<?php
	} else {
		die('Error : ' . mysqli_error($con) . '<br /><a href=javascript:history.go(-1)>[Zur�ck]</a>');
	}
}
?>
<?php go_back(); ?>