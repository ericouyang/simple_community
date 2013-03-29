<h2>Editing Post</h2>
<br>

<?php echo render('admin/post/_form'); ?>
<p>
	<?php echo Html::anchor('admin/post/view/'.$post->id, 'View'); ?> |
	<?php echo Html::anchor('admin/post', 'Back'); ?></p>
