<?php if($person["user"]): ?>
    <div class="w3-container w3-half-single">I'm a User!</div>
<?php else: ?>
    <div class="w3-container w3-center w3-single-half w3-failed">
        <h3><?php echo $person["full_name"]; ?> is not a user. Unable to assign permissions.</h3>
    </div>
    <div class="w3-row-padding">&nbsp;</div>
    <div class="w3-container w3-center">
            <a class="w3-button w3-theme" href="<?php echo $base_url; ?>admin/manage_users">Cancel</a>
            <a class="w3-button w3-theme" href="<?php echo $base_url; ?>manage_users/set_assign/<?php echo $person["id"]; ?>">Make User</a>
    </div>
<?php endif; ?>