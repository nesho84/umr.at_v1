<style type="text/css">
	ul {
		list-style: none;
	}

	#sidebar li {
		margin-top: 8px;
		border: 1px solid #cccccc;
		border-radius: 10px;
	}

	li a {
		height: 26px;
		padding-top: 8px;
		text-decoration: none;
		display: block;
		font-weight: bold;
	}

	#sidebar li a:hover {
		background: #C6F2E5;
		border-radius: 10px;
	}

	.contentleft li {
		padding: 0px;
	}
</style>
<?php
//Counting numbers of news
$count1 = mysqli_query("SELECT * FROM news order by date");
if (!$count1) {
	die("Query Failed: " . mysqli_error($con));
}
$num_rows = MYSQLI_NUM_rows($count1);
?>
<div id="content"> <!-- START CONTENT -->
	<div id="sidebar">
		<div id="updates" class="boxed">
			<div class="title">
				<h2>Benutzer Navigation</h2>
			</div>
			<div class="contentleft" style="height:700px;">
				<?php if (isset($_SESSION['username'])) //if there is a correct session
				{
				?>
					<ul>
						<li><a <?php if ($active == 'Privat') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/Home">Home</a></li>
						<li><a <?php if ($active == 'Profile') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/Profile">Profile</a></li>
						<li><a <?php if ($active == 'News') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/News">News&nbsp;( <span style="color: red;"><?php echo "$num_rows \n"; ?></span> )</a></li>
						<?php
						//Defining Members Level
						$username = $_SESSION['username'];
						$qry = mysqli_query("SELECT * FROM members where username='$username'");
						$row = mysqli_fetch_array($qry);
						$members_level = $row['members_level'];
						if ($members_level == 'mitarbeiter' || $members_level == 'vorarbeiter') {
						?>
							<li><a <?php if ($active == 'Stunden - Eingeben') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/StundenEingeben">Stunden Eingeben</a></li>
						<?php
						}
						?>
						<li><a <?php if ($active == 'StundenListe') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/StundenListe">Stundenliste</a></li>
						<li><a <?php if ($active == 'Mitarbeiter') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/Mitarbeiter">Mitarbeiter</a></li>
						<li><a <?php if ($active == 'Kennwort') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/Kennwort">Kennwort �ndern</a></li>
						<li><a <?php if ($active == 'Logout') { ?>class="active" <?php } ?> href="<?php echo SITE_URL ?>privat/Logout">Logout</a></li>
					</ul> <br><br><br><br>
					<p align="justify" style="color: green;">
						Wenn Sie Fragen, Feedback f�r den Website haben oder einen Fehler auf unserer Website gefunden?<br /><br />
						Bitte kontaktieren Sie den Administrator<a href="mailto:ademi.neshat@gmail.com?Subject=Hilfe!" style="text-decoration:underline; color: #0041A3;">hier</a>.
					</p>
				<?php
				} else {
				?>
					<h3 align="center">&nbsp;</h3>
					<ul>
						<span style="color: #A5AAAB">
							Anmeldung ist notwendig...<br />
							Sie m�ssen sich zuerst anmelden, um alle Funktionen nutzen zu k�nnen.
						</span>
					</ul> <br><br><br><br><br><br><br><br><br><br><br><br>
					<p align="justify" style="color: green;">
						Wenn Sie Fragen, Feedback f�r den Website haben oder einen Fehler auf unserer Website gefunden?<br /><br />
						Bitte kontaktieren Sie den Administrator<a href="mailto:ademi.neshat@gmail.com?Subject=Hilfe!" style="text-decoration:underline; color: #0041A3;">hier</a>.
					</p>
				<?php
				} //if there is a correct session END
				include 'user_online.php';
				?>
			</div><!-- end .content -->
		</div><!-- end #updates -->
	</div><!-- end #sidebar -->