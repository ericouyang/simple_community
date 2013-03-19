<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('First name', 'first_name'); ?>

			<div class="input">
				<?php echo Form::input('first_name', Input::post('first_name', isset($user) ? $user->first_name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Last name', 'last_name'); ?>

			<div class="input">
				<?php echo Form::input('last_name', Input::post('last_name', isset($user) ? $user->last_name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Permissions', 'permissions'); ?>

			<div class="input">
				<?php echo Form::textarea('permissions', Input::post('permissions', isset($user) ? $user->permissions : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Activated', 'activated'); ?>

			<div class="input">
				<?php echo Form::input('activated', Input::post('activated', isset($user) ? $user->activated : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Activation code', 'activation_code'); ?>

			<div class="input">
				<?php echo Form::input('activation_code', Input::post('activation_code', isset($user) ? $user->activation_code : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Persist code', 'persist_code'); ?>

			<div class="input">
				<?php echo Form::input('persist_code', Input::post('persist_code', isset($user) ? $user->persist_code : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Reset password code', 'reset_password_code'); ?>

			<div class="input">
				<?php echo Form::input('reset_password_code', Input::post('reset_password_code', isset($user) ? $user->reset_password_code : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
      <?php echo Form::label('About', 'about'); ?>

      <div class="input">
        <?php echo Form::textarea('about', Input::post('about', isset($user) ? $user->about : ''), array('class' => 'span8', 'rows' => 8)); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('User Data', 'user_data'); ?>

      <div class="input">
        <?php echo Form::textarea('user_data', Input::post('user_data', isset($user) ? $user->user_data : ''), array('class' => 'span8', 'rows' => 8)); ?>

      </div>
    </div>
    <div class="clearfix">
      <?php echo Form::label('Profile image', 'profile_image'); ?>

      <div class="input">
        <?php echo Form::input('profile_image', Input::post('profile_image', isset($user) ? $user->profile_image : ''), array('class' => 'span4')); ?>

      </div>
    </div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>