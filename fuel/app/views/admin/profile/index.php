<h2>Listing Profiles</h2>
<br>
<?php if ($profiles): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User</th>
			<th>About</th>
			<th>Website</th>
			<th>Profile image</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($profiles as $profile): ?>		<tr>

			<td><?php echo Html::anchor($profile->user->get_url(), $profile->user->get_full_name()); ?></td>
			<td><?php echo $profile->about; ?></td>
			<td><?php echo $profile->website; ?></td>
			<td><?php echo $profile->profile_image; ?></td>
			<td>
				<?php echo Html::anchor('admin/profile/view/'.$profile->id, 'View'); ?> |
				<?php echo Html::anchor('admin/profile/edit/'.$profile->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/profile/delete/'.$profile->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Profiles.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/profile/create', 'Add new Profile', array('class' => 'btn btn-success')); ?>

</p>
