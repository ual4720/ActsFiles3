<?php echo validation_errors(); ?>
<?php echo form_open("admin/manage_organization"); ?>

	<div class="w3-half">
		<div class="w3-container">
			<h3>Name and Contact Information:</h3>
			<label for="name">Organization Name: </label>
			<input type="input" name="name" class="w3-input" value="<?php echo $organization->name ?>" /><br />
			
			<label for="chapter">Sub-Organization: </label>
			<input type="input" name="chapter" class="w3-input" value="<?php echo $organization->chapter ?>" /><br />
			
			<label for="slogan">Organization Slogan: </label>
			<input type="input" name="slogan" class="w3-input" value="<?php echo $organization->slogan ?>" /><br />
			
			<label for="slogan">Organization Phone: </label>
			<input type="input" name="phone" class="w3-input" value="<?php echo $organization->phone ?>" /><br />
			
			<label for="slogan">Organization Fax: </label>
			<input type="input" name="fax" class="w3-input" value="<?php echo $organization->fax ?>" /><br />
			
			<label for="slogan">Organization Email: </label>
			<input type="input" name="email" class="w3-input" value="<?php echo $organization->email ?>" />
		</div>
	</div>
	<div class="w3-half">
		<div class="w3-container">
			<h3>Address Information:</h3>
			<label for="name">Address Line 1: </label>
			<input type="input" name="address_line_1" class="w3-input" value="<?php echo $organization->address_line_1 ?>" /><br />
			
			<label for="name">Address Line 2: </label>
			<input type="input" name="address_line_2" class="w3-input" value="<?php echo $organization->address_line_2 ?>" /><br />
			
			<label for="name">City: </label>
			<input type="input" name="city" class="w3-input" value="<?php echo $organization->city ?>" /><br />
			
			<label for="name">State: </label>
			<input type="input" name="state" class="w3-input" value="<?php echo $organization->state ?>" /><br />
			
			<label for="name">Zip: </label>
			<input type="input" name="zip" class="w3-input" value="<?php echo $organization->zip ?>" /><br />
		</div>
	</div>
	<div class="w3-row-padding">&nbsp;</div>
	<div class="w3-container w3-padding w3-center">
		<button class="w3-btn w3-theme" type="reset">Reset</button>
		<button class="w3-btn w3-theme" type="submit">Save</button>
	</div>
</form>