<div class="w3-container w3-div-center" style="overflow-x:auto;">
	<table class="w3-table w3-striped w3-bordered w3-usertable">
		<thead>
			<tr class="w3-theme">
			  <th class="w3-center"><a href="#" target="_blank" title="Assign User"><i class="fa fa-plus-square-o"></i> Assign User</a></th>
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
				<td class="w3-center"><a href="#" target="_blank" title="User Profile"><!--<img src="" class="user-icon" />--><i class="fa fa-user"></i></a></td>
				<td><a href="#"><?php echo $user["first_name"] . " " . $user["last_name"]; ?></a></td>
				<td class="w3-center">04/10/2019</td>
				<td class="w3-center">
					<a href="#" target="_blank" title="Open Profile"><i class="fa fa-id-card-o"></i></a> | <a href="#" target="_blank" title="Disable User Account"><i class="fa fa-ban"></i></a>
				</td>
			</tr>
		<?php endforeach; }?>
		</tbody>
	</table>
</div>