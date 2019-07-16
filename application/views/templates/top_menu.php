<div class="w3-bar w3-theme w3-top-menu">
	<div class="w3-container w3-left">
		<div class="w3-pagetitle"><?php echo $title; ?><?php if(isset($top_menu) && count($top_menu) > 0) { echo ": "; }?></div>
	</div>
	<div class="w3-container w3-left">
		<?php if(isset($top_menu) && count($top_menu) > 0) { ?>
		<?php foreach($top_menu as $menu_item): ?>
			<a class="w3-bar-item w3-button w3-padding-16" href="<?php echo $base_url.$menu_item->page."/".$menu_item->uri; ?>" target="<?php echo $menu_item->target; ?>" title="<?php echo $menu_item->display_name; ?>"><?php echo $menu_item->display_name; ?></a>
		<?php endforeach; } ?>
	</div>
</div>
<div class="w3-row-padding">&nbsp;</div>

