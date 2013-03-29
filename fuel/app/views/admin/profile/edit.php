<h2>Editing Profile</h2>
<br>

<?php echo render('admin/profile/_form'); ?>
<p>
	<?php echo Html::anchor('admin/profile/view/'.$profile->id, 'View'); ?> |
	<?php echo Html::anchor('admin/profile', 'Back'); ?></p>
