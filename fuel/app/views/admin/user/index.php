<h2>Listing Users</h2>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Permissions</th>
			<th>Activated</th>
			<th>Activation hash</th>
			<th>Persist hash</th>
			<th>Reset password hash</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->first_name; ?></td>
			<td><?php echo $user->last_name; ?></td>
			<td><?php echo $user->permissions; ?></td>
			<td><?php echo $user->activated; ?></td>
			<td><?php echo $user->activation_hash; ?></td>
			<td><?php echo $user->persist_hash; ?></td>
			<td><?php echo $user->reset_password_hash; ?></td>
			<td>
				<?php echo Html::anchor('admin/user/view/'.$user->id, 'View'); ?> |
				<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/user/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/user/create', 'Add new User', array('class' => 'btn btn-success')); ?>

</p>
