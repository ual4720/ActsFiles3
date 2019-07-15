<script>
	var people = [<?php $last_element = end($people); ?><?php foreach($people as $person): ?>['<?php echo $person["id"] ?>', '<?php echo $person["first_name"] ?> <?php if($person["nickname"] != "") echo "\"".$person["nickname"]."\"" ?> <?php echo $person["last_name"] ?> (<?php echo $person["age"]; ?>)']<?php if($person != $last_element) echo ", "; ?><?php endforeach; ?>];
</script>

<div class="w3-row-padding w3-center w3-margin-top">
	<div class="w3-card w3-container" style="min-height:460px">
	  <h3>Account Snapshot</h3><br>
	  <i class="fa fa-id-card w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
	  <div class="w3-container w3-padding">
		  <select id="DropdownSelectPerson" data-placeholder="Choose a Person..." class="select2" >
				<option value=""></option>
		  </select>
	  </div>
	  <div class="w3-container w3-padding w3-right-align">
		<!--<button class="w3-btn w3-theme" type="button" onclick="">View Person</button>-->
		<a class="w3-btn w3-theme" href="/manage_users" target="_self">Cancel</a>
		<a id="btnViewPerson" class="w3-btn w3-theme" href="#" target="_self">Set As User</a>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		PopulateSelect2("DropdownSelectPerson", people);
	});

	$('#DropdownSelectPerson').on("change", function(e) {
		document.getElementById("btnViewPerson").href = "/manage_users/set_assign/" + $("#DropdownSelectPerson").val();
	});
</script>