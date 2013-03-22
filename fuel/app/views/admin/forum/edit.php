<h2>Editing Forum</h2>
<br>

<?php echo render('admin\forum/_form'); ?>
<p>
	<?php echo Html::anchor('admin/forum/view/'.$forum->id, 'View'); ?> |
	<?php echo Html::anchor('admin/forum', 'Back'); ?></p>
