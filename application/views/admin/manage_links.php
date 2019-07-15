<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<div class="w3-container w3-half">
	<?php echo validation_errors(); ?>
	<?php echo form_open("admin/manage_links"); ?>
		<input type="hidden" name="sort_order" id="sort_order" />
		<ul id="sortable-row" class="w3-ul w3-border w3-hoverable">
			<?php foreach($side_menu as $menu_item): ?>
				<li id="<?php echo $menu_item->id; ?>" style="cursor:all-scroll;"><?php echo $menu_item->display_name; ?></li>
			<?php endforeach; ?>
			<script>
				$(function() {
					saveOrder();
				});
			</script>
		</ul>
		<div class="w3-row-padding">&nbsp;</div>
		<input type="submit" class="w3-btn w3-theme w3-right" value="Save Order" onClick="saveOrder();" />
	</form>
</div>
<script>
  $(function() {
    $( "#sortable-row" ).sortable();
  });
  
  function saveOrder() {
	var selectedLanguage = new Array();
	$('ul#sortable-row li').each(function() {
	selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("sort_order").value = selectedLanguage;
  }
</script>