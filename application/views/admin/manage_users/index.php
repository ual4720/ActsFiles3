<div class="w3-container w3-single-half w3-card" style="overflow-x:auto;">
	<table class="w3-table w3-striped w3-bordered w3-hoverable">
		<thead>
			<tr class="w3-theme">
			  <th class="w3-center"><a href="<?php echo $base_url; ?>manage_users/assign" target="_self" title="Assign User"><i class="fa fa-plus-square-o"></i> New User</a></th>
			  <th>User</th>
			  <th class="w3-center">Last Login</th>
			  <th class="w3-center">Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php if(empty($users)) { ?>
			<tr>
				<td colspan="4" class="w3-center"><h4>No Active Users Found<h4></td>
			</tr>
		<?php } else { ?>
		<?php foreach($users as $user): ?>
			<tr>
				<td class="w3-center"><img src="<?php echo $profiles; echo mt_rand(0, 8); ?>.jpg" class="user-icon" /></td>
				<td><?php echo $user["first_name"] . " " . $user["last_name"]; ?></td>
				<td class="w3-center">04/10/2019</td>
				<td class="w3-center">
					<a href="<?php echo $base_url; ?>person/<?php echo $user["id"]; ?>" target="_blank" title="View <?php echo $user["first_name"]."'s"; ?> Profile"><i class="fa fa-id-card-o"></i></a>
					 | <a href="#" target="_blank" title="View <?php echo $user["first_name"]."'s"; ?> User Activity"><i class="fa fa-list-alt"></i></a>
					 | <a href="<?php echo $base_url; ?>manage_users/disable/<?php echo $user["id"]; ?>" target="_self" title="Disable <?php echo $user["first_name"]."'s"; ?> Account"><i class="fa fa-ban"></i></a>
				</td>
			</tr>
		<?php endforeach; }?>
		</tbody>
	</table>
</div>