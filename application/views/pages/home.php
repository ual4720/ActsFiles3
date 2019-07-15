<script>
	var people = [<?php $last_element = end($people); ?><?php foreach($people as $person): ?>['<?php echo $person["id"] ?>', '<?php echo $person["first_name"] ?> <?php if($person["nickname"] != "") echo "\"".$person["nickname"]."\"" ?> <?php echo $person["last_name"] ?> (<?php echo $person["age"]; ?>)']<?php if($person != $last_element) echo ", "; ?><?php endforeach; ?>];
</script>

<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <form autocomplete="false">
	  <h3>Event Check-In</h3><br>
	  <i class="fa fa-calendar-check-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
	  <div class="w3-container w3-padding">
		<select id="DropdownCheckInEvent" data-placeholder="Choose an Event..." class="select2">
			<option value=""></option>
		</select>
	  </div>
	  <div class="w3-container w3-padding">
		<select id="DropdownCheckInPerson" data-placeholder="Choose one or more people..." class="select2" multiple="">
			<option value=""></option>
		</select>
	  </div>
	  <div class="w3-container w3-padding">
		<button class="w3-btn w3-theme w3-right" type="submit">Check-In</button>
		</div>
  </form>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>New Person</h3><br>
  <i class="fa fa-plus-square w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <form target="#">
	<div class="w3-container w3-padding">
		<input id="new-person-first" class="w3-input w3-left" type="text" name="new-person-first" placeholder="First Name">
	</div>
	<div class="w3-container w3-padding">
		<input id="new-person-last" class="w3-input w3-left" type="text" name="new-person-last" placeholder="Last Name">
	</div>
	<div class="w3-container w3-padding">
		<input id="new-person-bdate" class="w3-input w3-left" type="date" name="new-person-bdate">
	</div>
	<div class="w3-container w3-padding">
		<select id="DropdownNewPersonAddress" name="new-person-address" data-placeholder="Choose/Create an Address..." class="select2 w3-gray" multiple="">
			<option value=""></option>
		</select>
	</div>
	<div class="w3-container w3-padding w3-right-align">
		<button class="w3-btn w3-theme" type="reset" onclick="$('#DropdownNewPersonAddress').val(null).trigger('change');">Reset</button>
		<button class="w3-btn w3-theme" type="submit">Create</button>
	</div>
  </form>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
	  <h3>Receive Money</h3><br>
	  <i class="fa fa-money w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
	  <div class="w3-container w3-padding">
		  <select id="DropdownReceiveMoneyPerson" data-placeholder="Choose a Person..." class="select2" >
				<option value=""></option>
		  </select>
	  </div>
	  <div class="w3-container w3-padding">
		Need to Put Something Here<i class="fa fa-question-circle" style="font-size: 28px;"></i></p>
	  </div>
  </div>
</div>
</div>
<div class="w3-row-padding">&nbsp;</div>
<script>
	$(document).ready(function(){
		PopulateSelect2("DropdownCheckInPerson", people);
		PopulateSelect2("DropdownReceiveMoneyPerson", people);
	});

	//$('#DropdownSelectPerson').on("change", function(e) {
	//	document.getElementById("btnViewPerson").href = "/person/" + $("#DropdownSelectPerson").val();
	//});
</script>