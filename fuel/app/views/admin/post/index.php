<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User id</th>
			<th>Thread id</th>
			<th>Body</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $post): ?>		<tr>

			<td><?php echo $post->user_id; ?></td>
			<td><?php echo $post->thread_id; ?></td>
			<td><?php echo $post->body; ?></td>
			<td>
				<?php echo Html::anchor('admin/post/view/'.$post->id, 'View'); ?> |
				<?php echo Html::anchor('admin/post/edit/'.$post->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/post/delete/'.$post->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/post/create', 'Add new Post', array('class' => 'btn btn-success')); ?>

</p>
