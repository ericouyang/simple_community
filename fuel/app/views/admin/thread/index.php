<h2>Listing Threads</h2>
<br>
<?php if ($threads): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Forum</th>
			<th>User</th>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($threads as $thread): ?>		<tr>

			<td><?php echo Html::anchor('forum/'.$thread->forum->id, $thread->forum->title); ?></td>
			<td><?php echo Html::anchor($thread->user->get_url(), $thread->user->get_full_name()); ?></td>
			<td><?php echo $thread->title; ?></td>
			<td>
				<?php echo Html::anchor('admin/thread/view/'.$thread->id, 'View'); ?> |
				<?php echo Html::anchor('admin/thread/edit/'.$thread->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/thread/delete/'.$thread->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Threads.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/thread/create', 'Add new Thread', array('class' => 'btn btn-success')); ?>

</p>
