<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) {
	header('Location: profile.php');
}

include('../template.php');

topheader('Login');
do_header();
privat_leftpart('', '');
?>

<style type="text/css">
	input {
		width: 99%;
		height: 50px;
	}

	.large-font {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 25px;
		padding: 1px;
		border: 1px solid #00a59c;
	}

	select {
		width: 304px;
		height: 36px;
	}

	.button {
		width: 150px;
		height: 50px;
		background: #3C74E6 url(../_images/img06.gif) repeat-x;
		font-size: 28px;
		font-weight: normal;
		color: #ffffff;
		border: 2px solid #c9e749;
		border-radius: 9px;
		margin-top: 10px;
	}
</style>

<div id="mainlong" class="boxed">
	<div id="post" class="boxed">

		<div class="title">
			<h2>Anmeldung</h2>
		</div>

		<div class="content">
			<h2 align="center">&nbsp;</h2>
			<h2 align="center" style="color: #A5AAAB; font-size: 12px;">
				<em>Wenn Sie noch kein Konto haben. Kontaktieren Sie bitte den Administrator <a href="mailto:ademi.neshat@gmail.com?Subject=Hilfe!" style="text-decoration:none; color: #0041A3;">hier. </a></em>
			</h2>
			<br />
			<form id="form1" name="form1" method="post" action="privat/extras/check_login.php"><!-- Check Login FORM -->
				<table width="630" border="0" align="center" style="border: 2px dotted #ccccff;" cellpadding="5" cellspacing="5">
					<tr>
						<td>
							<h1 style="color: #A5AAAB; font-weight: normal; font-size: 30px;">Personal Anmeldung</h1><br />Bitte füllen Sie die Felder unten aus.
						</td>
					</tr>
					<tr>
						<td><br />Username:</td>
					</tr>
					<tr>
						<td><input type="text" name="u_name" id="u_name" class="large-font" /></td>
					</tr>
					<tr>
						<td>Password:</td>
					</tr>
					<tr>
						<td><input type="password" name="pass" id="pass" class="large-font" /></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" id="submit" value="Einloggen" class="button" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
			</form>

			<br />

			<?php
			if (isset($_GET['msg'])) {
				$msg = $_GET['msg'];
				echo '<div class=box><br /><h2 align=center>' . $msg . '</h2><br /></div>';
				die;
			}
			?>

		</div><!--end class content-->

	</div><!-- end #post -->
</div><!-- end #mainlong -->

<?php
footer();
?>