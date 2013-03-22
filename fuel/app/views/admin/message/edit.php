<h2>Editing Message</h2>
<br>

<?php echo render('admin\message/_form'); ?>
<p>
	<?php echo Html::anchor('admin/message/view/'.$message->id, 'View'); ?> |
	<?php echo Html::anchor('admin/message', 'Back'); ?></p>
