<h2>Listing Messages</h2>
<br>
<?php if ($messages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Thread id</th>
			<th>User id</th>
			<th>Body</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($messages as $message): ?>		<tr>

			<td><?php echo $message->thread_id; ?></td>
			<td><?php echo $message->user_id; ?></td>
			<td><?php echo $message->body; ?></td>
			<td>
				<?php echo Html::anchor('admin/message/view/'.$message->id, 'View'); ?> |
				<?php echo Html::anchor('admin/message/edit/'.$message->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/message/delete/'.$message->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Messages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/message/create', 'Add new Message', array('class' => 'btn btn-success')); ?>

</p>
