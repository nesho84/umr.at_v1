<?php
include('template.php');

topheader('Sitemap');
?>

<div id="sitemap" style="margin-left:200px;">

	<p>&Uuml;berblick &uuml;ber alle Seiten des Websites.</p>

	<ul>
		<li>Hauptmenü:
			<ul>
				<li><a href="<?php echo SITE_URL ?>/" title="">Startseite</a></li>
				<li><a href="<?php echo SITE_URL ?>/uberumr/">Über uns</a></li>
				<li><a href="leistungen/">Leistungen</a></li>
				<li><a href="jobs/">Jobs</a></li>
				<li><a href="<?php echo SITE_URL ?>/kontakt/">Kontakt</a></li>
			</ul>
		</li>
	</ul>

	<ul>
		<li>Linken Navigation (Unsere Leistungen):
			<ul>
				<li><a href="<?php echo SITE_URL ?>/leistungen/">Leistungen</a></li>
				<li><a href="<?php echo SITE_URL ?>/referenzen/">Referenzen</a></li>
				<li><a href="<?php echo SITE_URL ?>/partnerlink/">PartnerLink</a></li>
			</ul>
		</li>
	</ul>

	<ul>
		<li>Fußzeile:
			<ul>
				<li><a href="<?php echo SITE_URL ?>/">Willkommen</a></li>
				<li><a href="<?php echo SITE_URL ?>/uberumr/">Über uns</a></li>
				<li><a href="<?php echo SITE_URL ?>/leistungen/">Leistungen</a></li>
				<li><a href="<?php echo SITE_URL ?>/jobs/">Jobs</a></li>
				<li><a href="<?php echo SITE_URL ?>/kontakt/">Kontakt</a></li>
				<li><a href="<?php echo SITE_URL ?>/sitemap/">Sitemap</a></li>
				<li><a href="<?php echo SITE_URL ?>/impressum/">Impressum</a></li>
			</ul>
		</li>
	</ul>

</div>

<?php
footer();
?>