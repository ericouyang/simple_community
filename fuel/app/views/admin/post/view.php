<h2>Viewing #<?php echo $post->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $post->user_id; ?></p>
<p>
	<strong>Thread id:</strong>
	<?php echo $post->thread_id; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>

<?php echo Html::anchor('admin/post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/post', 'Back'); ?>