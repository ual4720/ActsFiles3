<!-- Header -->
<header class="w3-container w3-theme w3-center w3-padding" id="siteHeader">
	<div id="w3-site-navigation" class="w3-container w3-left"><i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i></div>
	<div id="w3-site-logo" class="w3-container"><img src="<?php echo $images . "brand/ACTS-Int-Logo-large-.png"; ?>" title="<?php echo $organization->name; ?> Logo" height="45px" /></div>
	<div id="w3-site-name" class="w3-container"><h3><?php echo $organization->name; ?> - <?php echo $organization->chapter; ?></h3></div>
	<div id="w3-site-slogan" class="w3-container"><h1 class="w3-xxxlarge w3-animate-bottom"><?php echo $organization->slogan; ?></h1></div>
</header>
<div class="w3-container w3-padding-0">