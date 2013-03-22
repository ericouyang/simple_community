<h2>Editing Thread</h2>
<br>

<?php echo render('admin\thread/_form'); ?>
<p>
	<?php echo Html::anchor('admin/thread/view/'.$thread->id, 'View'); ?> |
	<?php echo Html::anchor('admin/thread', 'Back'); ?></p>
