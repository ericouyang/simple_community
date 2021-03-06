<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Id:</strong>
	<?php echo $user->id; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>First name:</strong>
	<?php echo $user->first_name; ?></p>
<p>
	<strong>Last name:</strong>
	<?php echo $user->last_name; ?></p>
<p>
	<strong>Permissions:</strong>
	<?php echo $user->permissions; ?></p>
<p>
	<strong>Activated:</strong>
	<?php echo $user->activated; ?></p>
<p>
	<strong>Activation hash:</strong>
	<?php echo $user->activation_hash; ?></p>
<p>
	<strong>Persist hash:</strong>
	<?php echo $user->persist_hash; ?></p>
<p>
	<strong>Reset password hash:</strong>
	<?php echo $user->reset_password_hash; ?></p>
<p>
  <strong>About:</strong>
  <?php echo $user->profile->about; ?></p>
<p>
  <strong>Profile Image:</strong>
  <?php echo $user->profile->profile_image; ?></p>

<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/user', 'Back'); ?>