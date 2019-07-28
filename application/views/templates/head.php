<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title><?php echo $organization->name ." - " . $organization->chapter; ?></title>
	<link rel="stylesheet" href="<?php echo $css . "w3.css"; ?>">
	<link rel="stylesheet" href="<?php echo $css . "controls.css"; ?>">
	<link rel="stylesheet" href="<?php echo $css . $theme->css_path; ?>">
	<link rel="stylesheet" href="<?php echo $css . "font-awesome.min.css"; ?>">
	<link rel="stylesheet" href="<?php echo $css . "select2.css"; ?>">
	<script src="<?php echo $js . "jquery-3.4.0.min.js"; ?>"></script>
	<!--<script src="<?php //echo $js . "data.dummy.js"; ?>"></script>-->
	<script src="<?php echo $js . "template-controls.js"; ?>"></script>
	<script src="<?php echo $js . "autocomplete.js"; ?>"></script>
	<script src="<?php echo $js . "select2.full.js"; ?>"></script>
	<script src="<?php echo $js . "selects.js"; ?>"></script>
	<script src="<?php echo $js . "table-data.control.js"; ?>"></script>
</head>
<body>