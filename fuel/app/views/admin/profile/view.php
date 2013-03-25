<h2>Viewing #<?php echo $profile->id; ?></h2>

<p>
	<strong>User id:</strong>
	<?php echo $profile->user_id; ?></p>
<p>
	<strong>About:</strong>
	<?php echo $profile->about; ?></p>
<p>
	<strong>Profile image:</strong>
	<?php echo $profile->profile_image; ?></p>

<?php echo Html::anchor('admin/profile/edit/'.$profile->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/profile', 'Back'); ?>