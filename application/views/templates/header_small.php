<!DOCTYPE html>
<html>
<title><?php echo $organization->name ." - " . $organization->chapter; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="<?php echo $css . "w3.css"; ?>">
	<link rel="stylesheet" href="<?php echo $css . "controls.css"; ?>">
	<link rel="stylesheet" href="<?php echo $css . $theme->css_path; ?>">
	<link rel="stylesheet" href="<?php echo $css . "font-awesome.min.css"; ?>">
	<link rel="stylesheet" href="<?php echo $css . "select2.css"; ?>">
	<script src="<?php echo $js . "jquery-3.4.0.min.js"; ?>"></script>
	<script src="<?php echo $js . "data.dummy.js"; ?>"></script>
	<script src="<?php echo $js . "template-controls.js"; ?>"></script>
	<script src="<?php echo $js . "autocomplete.js"; ?>"></script>
	<script src="<?php echo $js . "select2.js"; ?>"></script>
	<script src="<?php echo $js . "selects.js"; ?>"></script>
	<script src="<?php echo $js . "contactinfo.control.js"; ?>"></script>
</head>
<body>
	<!-- Header -->
	<header class="w3-container w3-center w3-theme w3-padding w3-site" id="siteHeader">
		<div class="w3-section">
			<div id="w3-site-navigation"><i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme w3-left"></i></div>
			<div id="w3-site-name"><h3><?php echo $organization->name; ?> - <?php echo $organization->chapter; ?></h3></div>
			<div id="w3-site-logo" style="float:right;"><img src="<?php echo $images . "brand/ACTS-Int-Logo-large-.png"; ?>" title="<?php echo $organization->name; ?> Logo" class="w3-right" height="45px" /></div>
		</div>
	</header>
	<div class="w3-container w3-padding-0">
	