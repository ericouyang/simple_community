<h2>Viewing #<?php echo $forum->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $forum->user_id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $forum->title; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $forum->description; ?></p>

<?php echo Html::anchor('admin/forum/edit/'.$forum->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/forum', 'Back'); ?>