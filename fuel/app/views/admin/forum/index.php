<h2>Listing Forums</h2>
<br>
<?php if ($forums): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User</th>
			<th>Title</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($forums as $forum): ?>		<tr>

			<td><?php echo Html::anchor($forum->user->get_url(), $forum->user->get_full_name()); ?></td>
			<td><?php echo $forum->title; ?></td>
			<td><?php echo $forum->description; ?></td>
			<td>
				<?php echo Html::anchor('admin/forum/view/'.$forum->id, 'View'); ?> |
				<?php echo Html::anchor('admin/forum/edit/'.$forum->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/forum/delete/'.$forum->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Forums.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/forum/create', 'Add new Forum', array('class' => 'btn btn-success')); ?>

</p>
