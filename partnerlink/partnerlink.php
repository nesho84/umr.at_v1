<?php //function for all pages that are loaded in main content

if (isset($_GET['p'])) {
	$p = $_GET['p'];

	/* 			main 			*/
	include('' . $p . '.php');
} else {

	include('../template.php');

	topheader('PartnerLink');
	do_header();
	leftpart('PartnerLink', '');
?>
	<div id="main" class="boxed">

		<div class="title">
			<h2>PartnerLink</h2>
		</div>

		<div class="content">

			<div id="welcome">
				<h2>Unsere Partner:</h2>
				<div id="dotted">&nbsp;</div>
				<p><img src="<?php echo IMAGE_URL ?>/albimco-nn2.png" width="183" height="100" /><br />
					<a href="http://www.albimco.com" target=_blank>www.albimco.com</a>
				</p>
			</div>

			<div id="welcome">
				<p><img src="<?php echo IMAGE_URL ?>/finetime.png" width="183" height="100" /><br />
					<a href="http://www.finetime.at" target=_blank>www.finetime.at</a>
				</p>
			</div>

			<div id="welcome">
				<p><img src="<?php echo IMAGE_URL ?>/necom_logo.png" width="183" height="50" style="margin-left:-15px;" /><br />
					<a href="http://www.necom.at" target=_blank>www.necom.at</a>
				</p>
			</div>

		</div><!-- end .content -->

	</div><!-- end #main -->


<?php
	rightpart();
	footer();
} //END! function for all pages that are loaded in main content
?>