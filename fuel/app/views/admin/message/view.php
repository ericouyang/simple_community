<h2>Viewing #<?php echo $message->id; ?></h2>

<p>
	<strong>Thread id:</strong>
	<?php echo $message->thread_id; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $message->user_id; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $message->body; ?></p>

<?php echo Html::anchor('admin/message/edit/'.$message->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/message', 'Back'); ?>