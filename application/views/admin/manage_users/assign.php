<div class="w3-row-padding w3-single-half w3-center w3-margin-top">
	<div class="w3-card w3-container" style="min-height:460px">
	  <h3>Account Snapshot</h3><br>
	  <i class="fa fa-id-card w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
	  <div class="w3-container w3-padding">
		  <select id="DropdownSelectPerson" data-placeholder="Choose a Person..." class="select2" ></select>
	  </div>
	  <div class="w3-container w3-padding w3-right-align">
		<!--<button class="w3-btn w3-theme" type="button" onclick="">View Person</button>-->
		<a class="w3-btn w3-theme" href="<?php echo $base_url; ?>manage_users" target="_self">Cancel</a>
		<a id="btnViewPerson" class="w3-btn w3-theme" href="#" target="_self">Set As User</a>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		PopulateSelect2("DropdownSelectPerson", "<?php echo $base_url; ?>search/people");
	});

	$('#DropdownSelectPerson').on("change", function(e) {
		document.getElementById("btnViewPerson").href = "<?php echo $base_url; ?>manage_users/set_assign/" + $("#DropdownSelectPerson").val();
	});
</script>