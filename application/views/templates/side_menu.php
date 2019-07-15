<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="nav-side-top">
  <h1 class="w3-xxxlarge w3-text-theme">Menu</h1>
  <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <?php foreach($side_menu as $menu_item): ?>
	<a href="<?php echo $this->config->item('base_url').$menu_item->uri; ?>" class="w3-bar-item w3-button" target="<?php echo $menu_item->target; ?>" title="<?php echo $menu_item->display_name; ?>"><?php echo $menu_item->display_name; ?></a>
  <?php endforeach ?>
  <!--
  <a href="#login" class="w3-bar-item w3-button" onclick="w3_close()">Login</a>
  <a href="#afterLogin" class="w3-bar-item w3-button" onclick="w3_close()">After Login</a>
  <a href="#personProfile" class="w3-bar-item w3-button" onclick="w3_close()">Person's Profile</a>
  <a href="#" class="w3-bar-item w3-button" onclick="w3_close()">Link 4</a>
  -->
</nav>