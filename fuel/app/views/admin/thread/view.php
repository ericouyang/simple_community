<h2>Viewing #<?php echo $thread->id; ?></h2>

<p>
	<strong>Forum id:</strong>
	<?php echo $thread->forum_id; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $thread->user_id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $thread->title; ?></p>

<?php echo Html::anchor('admin/thread/edit/'.$thread->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/thread', 'Back'); ?>