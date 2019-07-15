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
	<header class="w3-container w3-theme w3-center w3-padding" id="siteHeader">
		<div id="w3-site-navigation" class="w3-left"><i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i></div>
		<div id="w3-site-logo"><img src="<?php echo $images . "brand/ACTS-Int-Logo-large-.png"; ?>" title="<?php echo $organization->name; ?> Logo" height="45px" /></div>
		<div id="w3-site-name"><h3><?php echo $organization->name; ?> - <?php echo $organization->chapter; ?></h3></div>
		<div id="w3-site-slogan"><h1 class="w3-xxxlarge w3-animate-bottom"><?php echo $organization->slogan; ?></div>
	<!--    <div class="w3-padding-32">
		  <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">LEARN W3.CSS</button>
		</div> -->
	</header>
	<div class="w3-container w3-padding-0">