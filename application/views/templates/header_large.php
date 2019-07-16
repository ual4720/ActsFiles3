<!-- Header -->
<header class="w3-container w3-theme w3-center w3-padding" id="siteHeader">
	<div id="w3-site-navigation" class="w3-left"><i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i></div>
	<div id="w3-site-logo"><img src="<?php echo $images . "brand/ACTS-Int-Logo-large-.png"; ?>" title="<?php echo $organization->name; ?> Logo" height="45px" /></div>
	<div id="w3-site-name"><h3><?php echo $organization->name; ?> - <?php echo $organization->chapter; ?></h3></div>
	<div id="w3-site-slogan"><h1 class="w3-xxxlarge w3-animate-bottom"><?php echo $organization->slogan; ?></h1></div>
<!--    <div class="w3-padding-32">
		<button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">LEARN W3.CSS</button>
	</div> -->
</header>
<div class="w3-container w3-padding-0">