<div class="w3-half w3-div-center">
	<div class="w3-container w3-failed w3-center w3-padding-16"><?php if(!isset($message)) $message = "Are you sure you wish to continue?"; echo $message; ?></div>
	<div class="w3-container w3-margin w3-red">
		<?php echo validation_errors(); ?>
	</div>
	<?php if(isset($target)) echo form_open($target); ?>
		<?php if(isset($inputs)): ?>
		<?php foreach($inputs as $input): ?>
			<div class="w3-container w3-row-padding">
				<label><?php echo ucfirst($input["label"]); ?>
					<input id="<?php echo $input["name"]; ?>" name="<?php echo $input["name"]; ?>" class="w3-input" type="<?php echo $input["type"]; ?>" <?php echo $input["required"] ?> />
				</label>
			</div>
			<div class="w3-row-padding">&nbsp;</div>
		<?php endforeach; ?>
		<?php endif; ?>
		<div class="w3-container w3-center">
			<a href="<?php if(!isset($return_path)) $return_path = "/"; echo $return_path; ?>" class="w3-btn w3-theme" title="Cancel">Cancel</a>
			<input type="submit" class="w3-btn w3-theme" name="confirm" <?php if(!isset($target)) echo "disabled"; ?> value="Yes" />
		</div>
	</form>
</div>